<?php

namespace App\Controllers;

class Lekar extends BaseController
{
	public function index()
	{
            $this->prikaz('lekar.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Lekar";
            
            $korisnik = $this->session->get('korisnik');
            $data['ime'] = $korisnik->getIme();
            $data['prezime'] = $korisnik->getPrezime();
            echo view("Prototip/$page", $data);
        }
}
