<?php

namespace App\Controllers;

class Sestra extends BaseController
{
	public function index()
	{
            $this->prikaz('sestra.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Sestra";
            
            $korisnik = $this->session->get('korisnik');
            $data['ime'] = $korisnik->getIme();
            $data['prezime'] = $korisnik->getPrezime();
            echo view("Prototip/$page", $data);
        }
}
