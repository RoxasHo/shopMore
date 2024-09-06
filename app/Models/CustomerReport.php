<?php

//Tang Ming Yi

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CustomerReport extends Model
{
    
    use HasFactory;
    public $table = 'customer_report';
    protected $fillable=[   
        'description',
        'rating'
    ];
    private static $instance = null;
    public function __construct() {}
    public static function getInstance() {
        if (self::$instance == null) {
             // Establish a database connection ..
            try{
                self::$instance=DB::select("select * from customer_report");
            } catch (Exception $e) {
                echo $e->getMessage();			
            }      
        }
        return self::$instance;
    }
    public static function getReport($uid){
        $cr = CustomerReport::where('CID',$uid)->get();
        return $cr;
    }
    public static function getReportwithId($id){
        return $cr= CustomerReport::find($id);
    }
    public static function createReport($uid,$description){
        $cr = new CustomerReport;
        $cr->CID = $uid;
        $cr->description=$description;
        $cr->status="Submitted";
        $cr->rating=0;
        $cr->repy='No replied yet';
        $cr->save();
    }
    public static function updateRating($id,$rating){
        $cr = CustomerReport::find($id);
        $cr-> rating = $rating;
        
        $cr->save();
    }
    public static function updateReply($id,$reply) {
        $cr = CustomerReport::find($id);
        $cr-> status = "Replied";
        $cr-> repy = $reply;
        
        $cr->save();
    }
    
    
}
