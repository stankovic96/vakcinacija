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
//        $gradovi = $this->doctrine->em->getRepository(Entities\Mesto::class)->findAll();
//        $nazivi = [];
//        foreach($gradovi as $grad)
//        {
//            $nazivi[] = $grad->getNaziv();
//        }
        $data['controller'] = 'Gost';
//        $data['gradovi'] = $nazivi;
        
        echo view("Prototip/$page", $data);
    }
    
    public function registracija(){
        return $this->prikaz('registracija.php', []);

    }

    public function registracijaSubmit(){
        //$this->load->library('form_validation');
        $this->validation->reset();
        $this->validation->setRules([
            'lozinka' => 'required|min_length[8]',
            'potvrda' => 'required',
            'jmbg' => 'required|min_length[13]|max_length[13]',
            'ime' => 'required',
            'prezime' => 'required',
            //'mesto' => 'required',
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
//            'mesto' =>[
//                'required' => 'Ovo polje je obavezno'
//            ],
            'adresa' =>[
                'required' => 'Ovo polje je obavezno'
            ]
        ]);
        
        
        if(!$this->validation->withRequest($this->request)->run()){
           return $this->prikaz('registracija.php', ["greske" => $this->validation->getErrors()]);
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
        
//        if($this->request->getVar('mesto') == "Izaberite mesto"){
//            return $this->prikaz('registracija.php', ["greske" => ["mesto" => "Izaberite odgovarajuce mesto"]]);
//        }
//        
//        $mesta = $this->doctrine->em->getRepository(Entities\Mesto::class)->
//                findBy(['naziv' => $this->request->getVar('mesto')]);
//        
//        $idMesta;
//        
//        if(count($mesta) == 0){
//            return $this->prikaz('registracija.php', ["greske" => ["mesto" => "Izabernao mesto ne postoji"]]);
//        }
//        foreach($mesta as $mesto){
//            $idMesta = $mesto->getIdMesta();
//            break;
//        }
//        
//        $mesto = $this->doctrine->em->getRepository(Entities\Mesto::class)->find($idMesta);
        
        $gradjanin = new Entities\Gradjanin();
        $gradjanin->setIme($this->request->getVar('ime'));
        $gradjanin->setPrezime($this->request->getVar('prezime'));
        $gradjanin->setAdresa($this->request->getVar('adresa'));
        $gradjanin->setEmail($this->request->getVar('email'));
        $gradjanin->setPassword( $this->request->getVar('lozinka'));
        $gradjanin->setBrojtelefona($this->request->getVar('broj'));
   //     $gradjanin->setIdmesta($mesto);
        $gradjanin->setStatusprijave("Nije Zakazan");
        $gradjanin->setJmbg($this->request->getVar('jmbg'));

        $this->doctrine->em->persist($gradjanin);
        $this->doctrine->em->flush();

        return redirect()->to(site_url("Gost/prijava"));
    }
    
    public function prijava(){
        return $this->prikaz("prijava.php", []);
        //return redirect()->to(site_url("Gost/prikazPrijave"));
    }
    
    public function prikazPrijave(){
        return $this->prikaz("prijava.php", []);
    }
    
    public function prijavaSubmit(){
        $this->validation->reset();
        $this->validation->setRules([
            'lozinka' => 'required',
            'email' => 'required'
        ],
        [   // Errors
            'lozinka' => [
                'required' => 'Ovo polje je obavezno',
            ],
            'email' =>[
                'required' => 'Ovo polje je obavezno',
            ]
        ]);
        
        
        if(!$this->validation->withRequest($this->request)->run()){
           return $this->prikaz('prijava.php', ["greske" => $this->validation->getErrors()]);
        }
        
        $tip = $this->request->getVar('tip');
        if($tip == "Izaberite tip"){
            return $this->prikaz('prijava.php', ["greske" => ['tip' => "Izaberite odgovarajuci tip"]]);
        }
        
        $mail = $this->request->getVar('email');
        $lozinka = $this->request->getVar('lozinka');
        
        $gradjanin;
        $rezultat;
        if($tip == "Gradjanin"){
            $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                    ->findBy(['email' => $mail]);
            $rezultat = $this->provera($gradjanin, $lozinka, "Gradjanin");
        }
        else if($tip == "Admin"){
            $gradjanin = $this->doctrine->em->getRepository(Entities\Admin::class)
                    ->findBy(['email' => $mail]);
            $rezultat = $this->provera($gradjanin, $lozinka, "Admin");
        }
        else if($tip == "Lekar"){
            $gradjanin = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)
                    ->findBy(['email' => $mail]);
            $rezultat = $this->provera($gradjanin, $lozinka, "ZdravstveniRadnik");
            
            if($rezultat == 1 && $gradjanin[0]->getTip() != "Lekar")
                $rezultat = 2;
        }
        else if($tip == "Sestra"){
            $gradjanin = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)
                    ->findBy(['email' => $mail]);
            $rezultat = $this->provera($gradjanin, $lozinka, "ZdravstveniRadnik");
            if($rezultat ==1 && $gradjanin[0]->getTip() != "Sestra")
                $rezultat = 2;
        }
        else{
            return $this->prikaz('prijava.php', ["greske" => ['tip' => "Izaberite odgovarajuci tip"]]);
        }
        
        if($rezultat == 2){
            return $this->prikaz('prijava.php', ["greske" => ['lozinka' => "Lozinka nije tacna za izabrani tip korisnika"]]);
        }
        if($rezultat == 3){
            return $this->prikaz('prijava.php', ["greske" => ['email' => "Email nije tacan za izabrani tip korisnika"]]);
        }

        
        $korisnik = $gradjanin[0];

        if($rezultat == 1){
            $this->session->set('tip', $tip);
            $this->session->set('id', $korisnik->getId());
            return redirect()->to(site_url("$tip"));
        }
    }
    
    private function provera($gradjanin, $lozinka, $tip){
        if(count($gradjanin) == 1){
            if($lozinka == $gradjanin[0]->getPassword()){
               return 1;
            }
            else{
                return 2;
            }
        }
        else{
            return 3;
        }
    }
}
