<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
            $this->prikaz('admin.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Admin";
            
            $korisnik = $this->session->get('korisnik');
            $data['ime'] = $korisnik->getIme();
            $data['prezime'] = $korisnik->getPrezime();
            echo view("Prototip/$page", $data);
        }
}
