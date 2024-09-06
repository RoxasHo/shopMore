<?php

//Tang Ming Yi

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerReport;
use Illuminate\Support\Facades\Auth;
class CustomerReportController extends Controller
{
    public function view_report_form(){
       $id=Auth::user()->id;
       $report= CustomerReport::getReport($id);
       
       return view('layouts/report_form',['id'=>$id,'report'=>$report]);
   }
   public function view_customer_report(){
       $report= CustomerReport::getInstance();
       return view('layouts/customer_report',['report'=>$report]);
   }
    public function view_reply_Customer($id){
        
        $report= CustomerReport::getReportwithId($id);
        
        return view('layouts/customer_report_reply', ['report'=>$report]);
    }
    
    public function createReport(Request $request){
        
        CustomerReport::createReport($request->id, $request->complaint_details);
        return redirect()->back();
    }
    public function updateRating(Request $request){
        
        
        $id= $request->id;
        $Rating = $request->Rating;
        CustomerReport::updateRating($id, $Rating);
        
        return redirect()->back();
    }
    public function update_reply(Request $request){
        
        CustomerReport::updateReply($request->id, $request->repy);
        return redirect( 'view_customer_report');
    }
    
   
   
}
