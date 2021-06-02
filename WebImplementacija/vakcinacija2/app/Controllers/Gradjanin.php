<?php

namespace App\Controllers;

class Gradjanin extends BaseController
{
	public function index()
	{
            $this->prikaz('gradjanin.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Gradjanin";
            
            $korisnik = $this->session->get('korisnik');
            $data['ime'] = $korisnik->getIme();
            $data['prezime'] = $korisnik->getPrezime();
            
//            $data['ime'] = "nedim";
//            $data['prezime'] = "jukic";
            echo view("Prototip/$page", $data);
        }
}
