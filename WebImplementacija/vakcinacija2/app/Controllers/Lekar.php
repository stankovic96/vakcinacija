<?php

namespace App\Controllers;
use App\Models\Entities;
class Lekar extends BaseController
{
	public function index()
	{
            $this->prikaz('lekar.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Lekar";
            
            $data['korisnik'] =$this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)
                    ->find($this->session->get('id'));
            echo view("Prototip/$page", $data);
        }
}
