<?php

//Tang Ming Yi

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class FAQPage extends Model
{
    use HasFactory;
    protected $table="faq";
    protected $fillable=[   
        'Question',
        'Answer'
    ];
    private static $instance = null;
    public function __construct() {}
    public static function getInstance() {
        if (self::$instance == null) {
             // Establish a database connection ..
            try{
                self::$instance=DB::select("select * from faq");
            } catch (Exception $e) {
                echo $e->getMessage();			
            }      
        }
        return self::$instance;
    }
    public static function create($Question, $Answer){
        $faq = new FAQPage;
        $faq->Question = $Question;
        $faq->Answer = $Answer;
        // $faq->CSPID = 990001;
        $faq->save();
    }
    public static function edit($id,$Question,$Answer) {
        $faq = FAQPage::find($id);
        $faq->Question= $Question;
        $faq->Answer=$Answer;
        $faq->save();  
    }
    public static function erase($id){
        $faq = FAQPage::destroy($id);
    }
}