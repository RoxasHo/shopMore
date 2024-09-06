<?php
//Joey Tan Chun Yee
namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Response;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminProductListXML extends Component
{

    public function getProductsXml()
    {
        $products = Product::all();

        // Convert data to XML
        $xml = new \SimpleXMLElement('<products/>');
        foreach ($products as $product) {
            $userXml = $xml->addChild('product');
            $userXml->addChild('id', $product->id);
            $userXml->addChild('name', $product->name);
            $userXml->addChild('image', $product->image);
            $userXml->addChild('price', $product->regular_price);
            $userXml->addChild('stock', $product->stock_status);
            $userXml->addChild('category', $product->category->name);
            $userXml->addChild('date', $product->created_at);
            // Add more fields as needed
        }

        // Return XML response
        return Response::make($xml->asXML(), '200')->header('Content-Type', 'application/xml');
    }
    public function getProductsHtml()
    {
        $xmlData = $this->getProductsXml()->getContent();

        $xsl = new \DOMDocument();
        $xsl->load(public_path('xml/products.xslt'));

        $xml = new \DOMDocument();
        $xml->loadXML($xmlData);

        $processor = new \XSLTProcessor();
        $processor->importStylesheet($xsl);



        return $processor->transformToXml($xml);
    }



    public function exportXmlToFile()
    {
        $xmlData = $this->getProductsXml()->getContent(); 

        $dom = new \DOMDocument();

        
        $dom->loadXML($xmlData);

        
        $dom->formatOutput = true;

       
        $filePath = public_path('xml/products.xml');
        $dom->save($filePath);

        return redirect()->route('admin.xproducts');
    }
    public function render()
    {
        $html = $this->getProductsHtml();
        return view('livewire.admin.admin-product-list-x-m-l')->with('html', $html);
    }
}
