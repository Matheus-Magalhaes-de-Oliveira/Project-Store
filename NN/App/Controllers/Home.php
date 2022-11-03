<?php

namespace App\Controllers;



class Home extends Abstracts\BaseController {
    public function home(){
        \App\Db\Conection::getConection();
        
        $data['page'] = 'homeView';
        $this->view("indexView", $data);
    }
}

?>