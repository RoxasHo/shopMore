<?php

//Tang Ming Yi

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use App\Models\FAQPage;
/**
 * Description of FAQDeleteController
 *
 * @author tangm
 */
class FAQDeleteController implements Command{
    private $id;
    public function __construct($id) {
        $this->id = $id;
    }

    public function executeCommand() {
        FAQPage::erase($this->id);
    }
}
