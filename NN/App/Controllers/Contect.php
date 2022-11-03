<?php

namespace App\Controllers;


class Contect extends Abstracts\BaseController {
    public function contact(){
        $data['page'] = 'contactView';
        $this->view("indexView", $data);
    }
}
?>