<?php

namespace App\Controllers;
use App\Models\Entities;
ini_set('memory_limit', '2000M');
class Admin extends BaseController
{
	public function index()
	{
            $this->prikaz('admin.php', []);
	}
    /*public function __construct() {
        parent::__construct();
        $this->load->model('Tipvakcine');
        $this->load->model('');

        if(!$this->session->has_userdata('autor')){
            redirect('Gost');
        }
    }*/

    public function NovaVakcina(){
	        $this->prikaz("nova_vakcina.php",[]);
    }

    public function NovaVakcinaSubmit(){
            $this->validation->reset();
            $this->validation->setRules([
                'ime' => 'required|min_length[5]|max_length[45]',
                'opis' => 'required|min_length[20]'
            ],
                [   // Errors
                    'ime' => [
                        'required' => 'Ovo polje je obavezno',
                        'min_length' => 'Naziv mora sadrzati barem 5 karaktera',
                        'max_length'=> 'Maksimalna duzina naziva mora biti ne duza od 45 karaktera'
                    ],
                    'opis' =>[
                        'required' => 'Ovo polje je obavezno',
                        'min_length'=>'Opis mora sadrzati minimalno 20 karaktera'
                    ]
                ]);
            if(!$this->validation->withRequest($this->request)->run()){
                return $this->prikaz('nova_vakcina.php', ["greske" => $this->validation->getErrors()]);
            }

            $naziv = $this->request->getVar('ime');
            $opis = $this->request->getVar('opis');

            $vakcina = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)
                ->findBy(['naziv' => $this->request->getVar('ime')]);

            if($vakcina != null){
                return $this->prikaz('nova_vakcina.php', ["greske" => ["ime" => "Greska! Postoji tip vakcine sa ovim nazivom"]]);
            }

            $nova_vakcina=new Entities\TipVakcine();
            $nova_vakcina->setNaziv($this->request->getVar('ime'));
            $nova_vakcina->setOpis($this->request->getVar('opis'));

            $this->doctrine->em->persist($nova_vakcina);
            $this->doctrine->em->flush();
            $this->prikaz("nova_vakcina.php",["poruka"=>["Uspesno unet tip vakcine"]]);
        }

    public function prikaz($page, $data){
        $data['controller'] = "Admin";
        $data['korisnik'] =$this->doctrine->em->getRepository(Entities\Admin::class)
            ->find($this->session->get('id'));
        echo view("Prototip/$page", $data);
    }
    public function prikaz_globalni($page, $data){
        echo view("Prototip/$page", $data);
    }
    public function Opisi(){
	        $tipoviVakcina=$this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();
	        $this->prikaz_globalni("opisi.php",["tipoviVakcina"=>$tipoviVakcina]);
    }
    public function Statistika(){
        $tipoviVakcina=$this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();
        $this->prikaz_globalni("statistika.php",["tipoviVakcina"=>$tipoviVakcina]);
    }
    public function odjava(){
        $this->session->stop();
        $this->session->destroy();

        return redirect()->to(site_url('/'));
    }
}
