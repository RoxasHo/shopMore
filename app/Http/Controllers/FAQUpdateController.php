<?php

//Tang Ming Yi

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use App\Models\FAQPage;
/**
 * Description of FAQUpdateController
 *
 * @author tangm
 */
class FAQUpdateController implements Command{
    private $id,$Question,$Answer;
    public function __construct($id, $Question, $Answer) {
        $this->id = $id;
        $this->Question = $Question;
        $this->Answer = $Answer;
    }

    
    public function executeCommand() {
        FAQPage::edit($this->id,$this->Question,$this->Answer);
    }
}
