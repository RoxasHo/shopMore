<?php

//Tang Ming Yi

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Response;

class FAQXML extends Component
{
    public function getFAQXml()
    {   
        $faq = \App\Models\FAQPage::all();
        
        $xml = new \SimpleXMLElement("<faqxml/>");
        foreach ($faq as $row) {
            $profileXml = $xml->addChild("faq");
            $profileXml->addChild("id", $row->id);
            $profileXml->addChild("Question", $row->Question);
             $profileXml->addChild("Answer", $row->Answer);
            $profileXml->addChild("created_at", $row->created_at);
            $profileXml->addChild("updated_at", $row->updated_at);
            $profileXml->addChild("CSPID", $row->CSPID);
            
            
        }

        return Response::make($xml->asXML(), '200')->header('Content-Type', 'application/xml');
    }

    public function exportXmlToFile()
    {
        $xmlData = $this->getFAQXml()->getContent(); 

        $dom = new \DOMDocument();
        
        $dom->loadXML($xmlData);
        
        $dom->formatOutput = true;
       
        $filePath = public_path('xml/faq.xml');

        $dom->save($filePath);

        return redirect()->route('home.index');
    }
}