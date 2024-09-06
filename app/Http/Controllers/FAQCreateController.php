<?php

//Tang Ming Yi

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use App\Models\FAQPage;
/**
 * Description of FAQCreateController
 *
 * @author tangm
 */
class FAQCreateController implements Command{
    private $Question,$Answer;
    public function __construct($Question, $Answer) {
        $this->Question = $Question;
        $this->Answer = $Answer;
    }

    
    public function executeCommand() {
        FAQPage::create($this->Question,$this->Answer);
    }

   
    

}
