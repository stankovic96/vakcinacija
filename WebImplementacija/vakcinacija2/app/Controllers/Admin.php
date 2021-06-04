<?php

namespace App\Controllers;
use App\Models\Entities;
class Admin extends BaseController
{
	public function index()
	{
            $this->prikaz('admin.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Admin";
            
            $data['korisnik'] =$this->doctrine->em->getRepository(Entities\Admin::class)
                    ->find($this->session->get('id'));
            echo view("Prototip/$page", $data);
        }
}
