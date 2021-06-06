<?php

namespace App\Controllers;
ini_set('memory_limit', '2000M');
use App\Models\Entities;
class Lekar extends BaseController
{

    public function index()
    {
        return $this->pocetnaStranica();
    }

    public function pocetnaStranica(){
        $lekar = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)->find($this->session->get('id'));
        return $this->prikaz("lekar.php",['ime' => $lekar->getIme(), 'prezime' => $lekar->getPrezime()]);
    }


    public function pocetniPrikaz(){
        $data = ['lekari' => [],'gradjanini' => [],'vakcine' => [],'dijagnoze' => [],'broj'];
        $izvestaji = $this->doctrine->em->getRepository(Entities\Izvestajlekara::class)->findAll();

        $data['broj'] = 0;
        foreach($izvestaji as $izvestaj){
            $lekar = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)->find(
                $izvestaj->getIdlekara());
            $lekarr = $lekar->getIme();

            $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)->find(
                $izvestaj->getIdgradjanin());

            $gradjaninn = $gradjanin->getIme();

            $vakcina = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->find(
                $izvestaj->getIdtipvakcine());
            $vakcinaa = $vakcina->getNaziv();

            $dijagnoza = $izvestaj->getDiagnoza();

            array_push($data['lekari'],$lekarr);
            array_push($data['gradjanini'],$gradjaninn);
            array_push($data['vakcine'],$vakcinaa);
            array_push($data['dijagnoze'],$dijagnoza);

            $data['broj'] += 1;

        }
        return $this->prikaz('izvestaji.php',$data);
    }

    public function pocetniPrikazUnosenjaNezeljeneReakcijeBezGreske(){
        $data = ['tipovi'=> []];
        $tipoviVakcina = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();

        foreach ($tipoviVakcina as $tipovi){
            array_push($data['tipovi'],$tipovi->getNaziv());
        }
        return $this->prikaz("izvestaj_kreiranje.php",$data);
    }

    public function pocetniPrikazUnosaNezeljeneReakcije($data){

        $tipoviVakcina = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();

        foreach ($tipoviVakcina as $tipovi){
            array_push($data['tipovi'],$tipovi->getNaziv());
        }

        return $this->prikaz("izvestaj_kreiranje.php",$data);
    }

    public function prikaz($naziv,$data){
        echo view("Prototip/$naziv",$data);
    }

    public function unosNezeljenihRekacija(){
        $this->doctrine->em->clear();

        $tip = $this->request->getVar('tipVakcine');
        $validation =  \Config\Services::validation();
        $validation->reset();

        $validation->setRules([
            'nazivJMBG' => 'required|min_length[13]',
            'nezeljeneReakcije' => 'required|max_length[100]',
            'tekstIzvestaj' => 'required|max_length[100]',
        ],
            [   // Errors
                'nazivJMBG' => [
                    'required' => 'Ovo polje je obavezno',
                    'min_length' => 'Lozinka mora sadrzati barem 13 karaktera'
                ],
                'nezeljeneReakcije' =>[
                    'required' => 'Ovo polje je obavezno',
                    'max_length' => 'Ovo polje moze da primi najvise 100 karaktera'
                ],
                'tekstIzvestaj' =>[
                    'required' => 'Ovo polje je obavezno',
                    'max_length' => 'Ovo polje moze da primi najvise 100 karaktera'
                ]
            ]);

        $greske = [];

        if($tip == "Izaberite tip vakcine") {
            $greske['tipVakcine'] = 'Ovo polje je obavezno';
        }
        if(!$validation->withRequest($this->request)->run() or !empty($greske['tipVakcine'])){
            $ret = $validation->getErrors();

            if(!empty($ret['tekstIzvestaj'])){
                $greske['tekstIzvestaj'] = $ret['tekstIzvestaj'];    }

            if(!empty($ret['nazivJMBG'])){
                $greske['nazivJMBG'] = $ret['nazivJMBG'];}

            if(!empty($ret['nezeljeneReakcije'])){
                $greske['nezeljeneReakcije'] = $ret['nezeljeneReakcije'];}
            $data = ['greske' => $greske,'tipovi' => []];
            return $this->pocetniPrikazUnosaNezeljeneReakcije($data);
        }

        $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
            ->findOneBy(['jmbg' => $this->request->getVar('nazivJMBG')]);

        ;       if($gradjanin == null){
            $greske['nazivJMBG'] = 'Ne postoji korisnik sa zadatim JMBG-om';
            return $this->pocetniPrikazUnosaNezeljeneReakcije('izvestaj_kreiranje.php', ['greske' => $greske]);
        }

        $nezeljeneReakcije = explode(",", $this->request->getVar('nezeljeneReakcije'));

        $izvestaj = new Entities\Izvestajlekara();
        $izvestaj->setDiagnoza($this->request->getVar('tekstIzvestaj'));

        foreach ($nezeljeneReakcije as $reakcija){

            $postojiReakcija = $this->doctrine->em->getRepository(Entities\Nezeljenereakcije::class)->findOneBy(['naziv' => $reakcija]);

            if($postojiReakcija == null){
                $novaReakcija = new Entities\Nezeljenereakcije();
                $novaReakcija->setNaziv($reakcija);
                $novaReakcija->addIzvestajlekaraIdizvestaja($izvestaj);
                $this->doctrine->em->persist($novaReakcija);
            }
            else{
                $postojiReakcija->addIzvestajlekaraIdizvestaja($izvestaj);
            }
        }


        $tipvakc = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findOneBy(['naziv' => $this->request->getVar('tipVakcine')]);
        $tipvakc->addIzvestaji($izvestaj);

        $gradjanin->addIzvestaji($izvestaj);

        $lekar = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)->find($this->session->get('id'));
        $lekar->addIzvestaji($izvestaj);

        $this->doctrine->em->persist($izvestaj);

        $this->doctrine->em->flush();

        return $this->pocetniPrikazUnosenjaNezeljeneReakcijeBezGreske();
    }

}
