<?php
//Ho Kian Hou
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Response;
use App\Models\User;
use Livewire\Component;

class UserXMLController extends Component
{
    public function getUserXml()
    {
        $users = User::all();

        $xml = new \SimpleXMLElement("<users/>");
        foreach ($users as $user) {
            $profileXml = $xml->addChild("user");
            $profileXml->addChild("id", $user->id);
            $profileXml->addChild("name", $user->name);
            $profileXml->addChild("email", $user->email);
            $profileXml->addChild("emailVerifiedAt", $user->email_verified_at);
            $profileXml->addChild("password", $user->password);
            $profileXml->addChild("utype", $user->utype);
            $profileXml->addChild("rememberToken", $user->remember_token);
            $profileXml->addChild("created_at", $user->created_at);
            $profileXml->addChild("updated_at", $user->updated_at);
        }

        return Response::make($xml->asXML(), '200')->header('Content-Type', 'application/xml');
    }

    public function exportXmlToFile()
    {
        $xmlData = $this->getUsersXml()->getContent(); 

        $dom = new \DOMDocument();
        
        $dom->loadXML($xmlData);
        
        $dom->formatOutput = true;
       
        $filePath = public_path('xml/users.xml');

        $dom->save($filePath);

        return redirect()->route('home.index');
    }
}
