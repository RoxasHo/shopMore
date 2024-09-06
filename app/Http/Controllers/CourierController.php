<?php

//Leow Kah Yan

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Tracking;
use App\Models\TrackingLog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use SimpleXMLElement;
use DOMDocument;
use XSLTProcessor;
use TCPDF;

class CourierController extends Controller
{
    function courierLogin(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'courierId' => 'required',
                'courierPass' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('courier/login')->withErrors($validator)->withInput();
            }

            // Retrieve courier user based on user_id
            $user = Courier::where(['user_id' => $req->courierId])->first();

            // Check if user exists and password matches
            if (!$user || !Hash::check($req->courierPass, $user->password)) {
                Log::channel('kahyan')->info('User not found or password does not match!');
                return redirect('courier/login')->withErrors(['error' => 'Invalid credentials'])->withInput();
            }

            // Authenticate and login the courier user
            Auth::guard('courier')->login($user);

            // Store user information in session
            session(['user_courier_type' => $user->courier_type]);
            session(['user_name' => $user->name]);

            Log::channel('kahyan')->info(Auth::guard('courier')->user()->name . ' has logged in successfully!');

            return redirect()->route('courier.dashboard');
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error during courier login: ' . $e->getMessage());

            // Redirect with an error message
            return redirect('courier/login')->withErrors(['error' => 'An error occurred during login. Please try again.'])->withInput();
        }
    }

    public function dashboard()
    {
        try {
            $dataToPass = $this->transformTrackingData();
            return view('layouts.tracking', ['dataToPass' => $dataToPass]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error occurred: ' . $e->getMessage());
            return view('error.general', ['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    public function courierLogout()
    {
        try {
            Auth::guard('courier')->logout();

            session()->invalidate();
            session()->regenerateToken();

            return redirect('/courier/login');
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error during courier logout: ' . $e->getMessage());
            return redirect('/')->with('error', 'An error occurred during logout. Please try again.');
        }
    }

    public function trackingDetail($trckId)
    {
        try {
            $trackingDetails = DB::table('tracking')->where('tracking_id', '=', $trckId)->first();
            return view('layouts.trackingDetail', ['trackingDetails' => $trackingDetails]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in trackingDetail(): ' . $e->getMessage());
            return redirect('/')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function updateTrckDetail(Request $request)
{
    try {
        $courier_type = session('user_courier_type');
        $trackingId = $request->input('trckId');
        $status = $request->input('status');

        // Update tracking details in the database
        $tracking = Tracking::where('tracking_id', $trackingId)->first();
        if ($tracking) {
            $tracking->courier_type = $courier_type;
            $tracking->status = $status;
            $tracking->last_function = 'Updated Status';
            $tracking->date_time = $this->currentTime();
            $tracking->save();
        } else {
            throw new Exception('Tracking details not found.');
        }

        // Retrieve updated tracking details
        $trackingDetails = Tracking::where('tracking_id', $trackingId)->first();

        // Prepare data for insertion into tracking_log table
        $logData = [
            'order_id' => $trackingDetails->order_id,
            'tracking_id' => $trackingDetails->tracking_id,
            'order_item' => $trackingDetails->order_item,
            'courier_type' => $trackingDetails->courier_type,
            'usr_id' => $trackingDetails->usr_id,
            'status' => $trackingDetails->status,
            'total' => $trackingDetails->total,
            'last_function' => $trackingDetails->last_function,
            'date_time' => $trackingDetails->date_time,
        ];

        // Insert log data into tracking_log table
        TrackingLog::create($logData);

        // Retrieve and transform tracking data after update
        $dataToPass = $this->transformTrackingData();
        return view('layouts.tracking', ['dataToPass' => $dataToPass]);
    } catch (Exception $e) {
        Log::channel('kahyan')->error('Error updating tracking details:' . $e->getMessage());
        return redirect('/courier/tracking')->with('error', 'Failed to update tracking details. Please try again.');
    }
}

    private function transformTrackingData()
    {
        try {
            $courierData = Tracking::all();

            // Map the tracking data
            $dataToPass = $courierData->map(function ($item) {
                return [
                    'trckId' => $item->tracking_id,
                    'trckCourierType' => $item->courier_type,
                    'status' => $item->status,
                ];
            })->all();

            return $dataToPass;
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in transformTrackingData():' . $e->getMessage());
            return [];
        }
    }

    private function currentTime()
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentTime = Carbon::now('Asia/Kuala_Lumpur');

        return $currentTime;
    }
    public function createReport()
    {
        try {
            $xmlTracking = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><report></report>');

            $courierData = DB::table('tracking_log')
                ->where('courier_type', '=', session('user_courier_type'))
                ->orderBy('tracking_id', 'desc')
                ->orderBy('status', 'desc')
                ->get();

            // Loop through each data entry and create XML nodes
            $status = "No Courier Picked";
            foreach ($courierData as $item) {
                $itemArray = (array) $item; // Convert stdClass object to array

                $tracking = $xmlTracking->addChild('tracking');
                $tracking->addAttribute('id', $itemArray['tracking_id']);
                $tracking->addChild('ordID', $itemArray['order_id']);
                $tracking->addChild('ordItm', $itemArray['order_item']);
                $tracking->addChild('usrID', $itemArray['usr_id']);
                if ($itemArray['status'] == '1')
                    $status = "Courier Picked";
                if ($itemArray['status'] == '2')
                    $status = "In Transit";
                if ($itemArray['status'] == '3')
                    $status = "Out for Delivery";
                if ($itemArray['status'] == '4')
                    $status = "Delivered";
                if ($itemArray['status'] == '5')
                    $status = "Deleted";
                $tracking->addChild('status', $status);
                $tracking->addChild('dateTime', $itemArray['date_time']);
            }

            $xmlContent = $xmlTracking->asXML();
            $filename = 'tracking_report.xml';

            // Save the XML to a file (in this case, 'tracking.xml')
            Storage::disk('ky')->put($filename, $xmlContent);
            file_put_contents($filename, $xmlContent);

            // Retrieve XSLT stylesheet
            $xsltContent = Storage::disk('ky')->get('tracking_report.xslt');

            // Transform XML to HTML using XSLT
            $xmlFile = public_path('xml/' . $filename);

            $xml = new DOMDocument();
            $xml->load($xmlFile);

            $xsl = new DOMDocument();
            if (!$xsl->loadXML($xsltContent)) {
                $errors = libxml_get_errors();
                foreach ($errors as $error) {
                    Log::error("Libxml error: " . $error->message);
                }
                libxml_clear_errors();
                throw new Exception("Failed to load XSLT");
            }

            $proc = new XSLTProcessor();
            if (!$proc->importStylesheet($xsl)) {
                throw new Exception("Failed to import stylesheet.");
            }

            $html = $proc->transformToXML($xml);

            // Generate PDF from HTML
            $pdf = new TCPDF();
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
            $pdf->AddPage('L');
            $pdf->writeHTML($html, true, false, true, false, '');

            // Output PDF as a download
            $pdfContent = $pdf->Output('tracking_report.pdf', 'S'); // Get PDF content as string

            return response()->make($pdfContent, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="tracking_report.pdf"'
            ]);

            return response()->make($xmlContent, 200, [
                'Content-Type' => 'application/xml',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]);
        } catch (Exception $e) {
            // Handle and log any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
