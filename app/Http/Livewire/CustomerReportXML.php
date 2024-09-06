<?php

//Tang Ming Yi

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Response;
use App\Models\CustomerReport;
use Livewire\Component;

class CustomerReportXML extends Component
{
    public function getCustomerReportXml()
    {   /*
        $user_id=Auth::id();
        
        $customer_report = CustomerReport::where('$CID',$user_id)->get();
        */
        $customer_report = CustomerReport::all();
        
        $xml = new \SimpleXMLElement("<customer_report/>");
        foreach ($customer_report as $report) {
            $profileXml = $xml->addChild("report");
            $profileXml->addChild("id", $report->id);
            $profileXml->addChild("CID", $report->CID);
            $profileXml->addChild("created_at", $report->created_at);
            $profileXml->addChild("updated_at", $report>updated_at);
            $profileXml->addChild("Description", $report->Description);
            $profileXml->addChild("CSPID", $report->CSPID);
            $profileXml->addChild("Rating", $report->Rating);
            
        }

        return Response::make($xml->asXML(), '200')->header('Content-Type', 'application/xml');
    }

    public function exportXmlToFile()
    {
        $xmlData = $this->getCustomerReportXmlXml()->getContent(); 

        $dom = new \DOMDocument();
        
        $dom->loadXML($xmlData);
        
        $dom->formatOutput = true;
       
        $filePath = public_path('xml/customer_report.xml');

        $dom->save($filePath);

        return redirect()->route('home.index');
    }
}
