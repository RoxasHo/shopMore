<?php

//Choong Kah Chay

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Response;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderXMLController extends Component
{
    public function getOrderXml()
    {
        $userId = Auth::id();
        
        $orders = Order::where('user_id', $userId)->get();

        $xml = new \SimpleXMLElement("<orders/>");
        foreach ($orders as $order) {
            $profileXml = $xml->addChild("order");
            $profileXml->addChild("id", $order->id);
            $profileXml->addChild("firstname", $order->firstname);
            $profileXml->addChild("lastname", $order->lastname);
            $profileXml->addChild("address", $order->address);
            $profileXml->addChild("city", $order->city);
            $profileXml->addChild("state", $order->state);
            $profileXml->addChild("postcode", $order->postcode);
            $profileXml->addChild("phone", $order->phone);
            $profileXml->addChild("email", $order->email);
            $profileXml->addChild("user_id", $order->user_id);
            $profileXml->addChild("product", $order->product);
            $profileXml->addChild("Quantity", $order->Quantity);
            $profileXml->addChild("total", $order->total);
            $profileXml->addChild("created_at", $order->created_at);
            $profileXml->addChild("updated_at", $order->updated_at);

        }

        return Response::make($xml->asXML(), '200')->header('Content-Type', 'application/xml');
    }

    public function exportXmlToFile()
    {
        $xmlData = $this->getOrderXml()->getContent(); 

        $dom = new \DOMDocument();
        
        $dom->loadXML($xmlData);
        
        $dom->formatOutput = true;
       
        $filePath = public_path('xml/orders.xml');

        $dom->save($filePath);

        return redirect()->route('home.index');
    }
}
