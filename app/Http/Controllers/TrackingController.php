<?php

//Leow Kah Yan

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Exception;
use Carbon\Carbon;
use App\Models\Tracking;
use App\Models\TrackingLog;

class TrackingController extends Controller
{
    public function tracking($usrId)
    {
        try {
            session(['userId' => $usrId]);
            $dataToPass = Tracking::where('usr_id', $usrId)->orderBy('tracking_id', 'desc')->get();
            return view('layouts.usrTrack', ['dataToPass' => $dataToPass]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in tracking(): ' . $e->getMessage());
            return redirect('/')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function usrTrackDetail($trackId)
    {
        try {
            $dataToPass = TrackingLog::where('tracking_id', $trackId)->orderBy('status', 'desc')->get();
            Log::channel('kahyan')->info("Check Data: " . $dataToPass);
            return view('layouts.usrTrackDetail', ['dataToPass' => $dataToPass]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in usrTrackDetail(): ' . $e->getMessage());
            return redirect('/')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function trackDelete($trackID)
    {
        try {
            $trackingRecord = Tracking::find($trackID);

            if ($trackingRecord) {
                $this->insertTrackingLog($trackingRecord);
                $trackingRecord->delete();
            } else {
                throw new \Exception("Tracking record not found.");
            }

            $userId = session('userId');
            $dataToPass = Tracking::where('usr_id', $userId)->orderBy('tracking_id', 'desc')->get();
            return view('layouts.usrTrack', ['dataToPass' => $dataToPass]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in trackDelete():' . $e->getMessage());
            return back()->withError('Failed to delete tracking record: ' . $e->getMessage());
        }
    }

    private function insertTrackingLog($trackingRecord)
    {
        try {
            $currTime = $this->currentTime();

            // Create a new TrackingLog record
            TrackingLog::create([
                'order_id' => $trackingRecord->order_id,
                'tracking_id' => $trackingRecord->tracking_id,
                'order_item' => $trackingRecord->order_item,
                'courier_type' => $trackingRecord->courier_type,
                'usr_id' => $trackingRecord->usr_id,
                'status' => '5',
                'total' => $trackingRecord->total,
                'last_function' => 'Deleted',
                'date_time' => $currTime,
            ]);
        } catch (Exception $e) {
            Log::channel('kahyan')->error('Error in insertTrackingLog():' . $e->getMessage());
            throw $e;
        }
    }

    private function currentTime()
    {
        return Carbon::now('Asia/Kuala_Lumpur');
    }

    public function trackOrder($trackId)
    {
        $trackData = Tracking::find($trackId);

        if ($trackData) {
            $courierType = $this->mapCourierType($trackData->courier_type);
            $responseData = [
                'order_id' => $trackData->order_id,
                'tracking_id' => $trackData->tracking_id,
                'order_item' => $trackData->order_item,
                'courier_type' => $courierType,
                'usr_id' => $trackData->usr_id,
                'status' => $trackData->status,
                'date_time' => $trackData->date_time
            ];

            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'Tracking ID not found'], 404);
        }
    }

    private function mapCourierType($courierType)
    {
        $courierTypes = [
            '1' => 'GDEX',
            '2' => 'Fedex',
            '3' => 'J&T Express',
            '4' => 'City-Link Express',
            '5' => 'NinjaVan',
        ];

        return $courierTypes[$courierType] ?? 'No Courier Picked';
    }
}
