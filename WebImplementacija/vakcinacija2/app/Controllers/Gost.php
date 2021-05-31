<?php

namespace App\Controllers;

use App\Models\Entities;
class Gost extends BaseController
{
    public function index()
    {
        return view('prototip/index.php');
    }
    
    protected function prikaz($page, $data){
        $gradovi = $this->doctrine->em->getRepository(Entities\Mesto::class)->findAll();
        $nazivi = [];
        foreach($gradovi as $grad)
        {
            $nazivi[] = $grad->getNaziv();
        }
        $data['controller'] = 'Gost';
        $data['gradovi'] = $nazivi;
        
        echo view("Prototip/$page", $data);
    }
    
    public function registracija(){
        return $this->prikaz('registracija.php', []);

    }

    public function registracijaSubmit(){
        //$this->load->library('form_validation');
        $validation =  \Config\Services::validation();
        $validation->reset();
        $validation->setRules([
            'lozinka' => 'required|min_length[8]',
            'potvrda' => 'required',
            'jmbg' => 'required|min_length[13]|max_length[13]',
            'ime' => 'required',
            'prezime' => 'required',
            'mesto' => 'required',
            'adresa' => 'required',
            'email' => 'required|valid_email'
        ],
        [   // Errors
            'lozinka' => [
                'required' => 'Ovo polje je obavezno',
                'min_length' => 'Lozinka mora sadrzati barem 8 karaktera'
            ],
            'potvrda' =>[
                'required' => 'Ovo polje je obavezno'
            ],
            'ime' =>[
                'required' => 'Ovo polje je obavezno'
            ],
            'prezime' =>[
                'required' => 'Ovo polje je obavezno'
            ],
            'jmbg' =>[
                'required' => 'Ovo polje je obavezno',
                'min_length' =>'JMBG mora sadrzati tacno 13 cifara',
                'max_length' => 'JMBG mora sadrzati tacno 13 cifara'
            ],
            'email' =>[
                'required' => 'Ovo polje je obavezno',
                'valid_email' => 'E-mail nije validan'
            ],
            'mesto' =>[
                'required' => 'Ovo polje je obavezno'
            ],
            'adresa' =>[
                'required' => 'Ovo polje je obavezno'
            ]
        ]);
        
        
        if(!$validation->withRequest($this->request)->run()){
           return $this->prikaz('registracija.php', ["greske" => $validation->getErrors()]);
        }
        
        $lozinka = $this->request->getVar('lozinka');
        $potvrda = $this->request->getVar('potvrda');
        
        if($potvrda != $lozinka)
        {
            return $this->prikaz('registracija.php', ["greske" => ["potvrda" => "Lozinke se ne podudaraju"]]);
        }
        
        $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                ->findBy(['jmbg' => $this->request->getVar('jmbg')]);
        
        if($gradjanin != null){
            return $this->prikaz('registracija.php', ["greske" => ["jmbg" => "Korisnik sa ovim JMBG-om je vec registrovan"]]);
        }
        
        
        //$mail = $this->request->getVar('email');
        $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                ->findBy(['email' => $this->request->getVar('email')]);
               
        if($gradjanin){
            return $this->prikaz('registracija.php', ["greske" => ["email" => "Korisnik sa ovim mejlom je vec registrovan"]]);
        }
        
        if($this->request->getVar('mesto') == "Izaberite mesto"){
            return $this->prikaz('registracija.php', ["greske" => ["mesto" => "Izaberite odgovarajuce mesto"]]);
        }
        
        $mesta = $this->doctrine->em->getRepository(Entities\Mesto::class)->
                findBy(['naziv' => $this->request->getVar('mesto')]);
        
        $idMesta;
        
        if(count($mesta) == 0){
            return $this->prikaz('registracija.php', ["greske" => ["mesto" => "Izabernao mesto ne postoji"]]);
        }
        foreach($mesta as $mesto){
            $idMesta = $mesto->getIdMesta();
            break;
        }
        
        $mesto = $this->doctrine->em->getRepository(Entities\Mesto::class)->find($idMesta);
        
        $gradjanin = new Entities\Gradjanin();
        $gradjanin->setIme($this->request->getVar('ime'));
        $gradjanin->setPrezime($this->request->getVar('prezime'));
        $gradjanin->setAdresa($this->request->getVar('adresa'));
        $gradjanin->setEmail($this->request->getVar('email'));
        $gradjanin->setPassword( $this->request->getVar('lozinka'));
        $gradjanin->setBrojtelefona($this->request->getVar('broj'));
        $gradjanin->setIdmesta($mesto);
        $gradjanin->setStatusprijave("Nije Zakazan");
        $gradjanin->setJmbg($this->request->getVar('jmbg'));

        $this->doctrine->em->persist($gradjanin);
        $this->doctrine->em->flush();
        
        echo "idemo".$gradjanin->getJmbg();
        return redirect()->to(site_url("Gost/prijava"));
    }
    
    public function prijava(){
        return $this->prikaz("prijava.php", []);
    }
}
