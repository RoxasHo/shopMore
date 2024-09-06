<?php

//Tang Ming Yi

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQPage;
use Illuminate\Support\Facades\DB;
class FAQPageController extends Controller
{
    public static $command_array= [];
    private Command $cmd;
    
   public function view_faq_page(){   
           $faqpage=FAQPage::getInstance();
          return view('layouts\faq\faq', ['faq_detail' => $faqpage]);
    }
    public function view_faq_crud_page()
    {   $faqpage=FAQPage::getInstance();
        $newFaqQuestion = ''; 
        $newFaqAnswer = ''; 
        return view('layouts\faq\faq_crud', ['faq_detail' => $faqpage ,'new_faq_question'=>$newFaqQuestion,'new_faq_answer'=>$newFaqAnswer]);
    }
    public function view_faq_crud_form_page(){   
        return view('layouts\faq\faq_crud_form', []);
    }
    public function view_faq_crud_form2_page($id)
    {   $faqpage= FAQPage::getInstance();
        $question="";$answer="";
        foreach($faqpage as $row){
            if($row->id == $id){
                $question=$row->Question;
                $answer=$row->Answer;
            }
        }
        
        return view('layouts\faq\faq_crud_form2', ['id'=>$id, 'question'=> $question,'answer'=> $answer ]);
    }
    public function create(Request $request){
      
        $cmd = new FAQCreateController($request->Question,$request-> Answer);
        $cmd->executeCommand();
        return redirect('faq/faq_crud')->with('flash_message','Added');     
    }
    public function delete($id){
        
        $cmd = new FAQDeleteController($id);
        $cmd->executeCommand();
        return redirect('faq/faq_crud')->with('flash_message','Deleted');
    }
    public function update(Request $request){
        
        $cmd = new FAQUpdateController($request->id,$request->Question,$request->Answer);
        
        $cmd->executeCommand();
        return redirect('faq/faq_crud')->with('flash_message','Updated');
            
    }
         
    
    
    
}
