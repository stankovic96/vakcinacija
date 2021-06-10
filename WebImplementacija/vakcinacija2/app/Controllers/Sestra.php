<?php

namespace App\Controllers;
use App\Models\Entities;

//ini_set('memory_limit','2000M');

class Sestra extends BaseController
{
        private static $pacijentJMBG = null;
        
	public function index()
	{
            $this->prikaz('sestra.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Sestra";
            
            $data['korisnik'] = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)
                    ->find($this->session->get('id'));
            
            echo view("Prototip/$page", $data);
        }
        
        public function validacija(){
            return $this->prikaz("vakcinacija_validacija.php", []);
        }
        
        public function pretraga(){
            $this->validation->reset();
            $this->validation->setRules(
                [
                    'pacijentJMBG' => 'required|min_length[13]|max_length[13]'
                ],
                [
                    'pacijentJMBG' =>[
                        'required' => 'Popunite polje',
                        'min_length' => 'JMBG ima 13 karaktera',
                        'max_length' => 'JMBG ima 13 karateera'
                    ]    
                ]
            );
            
            if(!$this->validation->withRequest($this->request)->run()){
                return $this->prikaz('vakcinacija_validacija.php', ["greske" => $this->validation->getErrors(), 'pronasao' => false]);
            }
            
            $jmbg = $this->request->getVar('pacijentJMBG');
            
            
            if (!ctype_digit($jmbg)) {
                return $this->prikaz('vakcinacija_validacija.php', ["greske" => ["pacijentJMBG" => "JMBG mora sadržati isključivo cifre"],
                    'pronasao' => false]);
            }
            
            $gradjanini = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                    ->findBy(["jmbg" => $jmbg]);
            
            if($gradjanini != null){
                $gradjanin = $gradjanini[0];
                
                if($gradjanin->getStatusprijave() == 'Zakazan'){
                    $id = $gradjanin->getId();
                    return redirect()->to(site_url("Sestra/validacijaPretraga/$id"));
                }
                else{
                    return $this->prikaz('vakcinacija_validacija.php', ["greske" => ['pronasao' => 'Ne postoji zakazan termin za pacijenta sa ovim JMBG-om']]);
                }
            }
            else{
                return $this->prikaz('vakcinacija_validacija.php', ["greske" => ['pronasao' => 'Pacijent sa ovim JMBG-om ne postoji']]);
            }
        }
        
        public function validacijaPretraga($id){
            $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                    ->find($id);
            
            return $this->prikaz("validacija.php", ['gradjanin' => ['gradjanin' => $gradjanin], 'id' => $id]);
        }
        
        public function zabelezi($id){
            $g = $this->doctrine->em->getRepository(Entities\Gradjanin::class)->find($id);

            if($g->getStatust1() == "Uspesno"){
                return $this->prikaz('validacija.php',["greske" => ['vakcina' => 'Građanin je već vakcinisan'],
                    'gradjanin' => ['gradjanin' => $g]]);
            }
            
            $g->setStatust1("Uspesno");
            $sestra = $this->doctrine->em->getRepository(Entities\Zdravstveniradnici::class)->find($this->session->get('id'));
            $g->setIdSestrat1($sestra);
            
            $tipVakcine = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->find($g->getIdtipvakcine());
            $pristigle = $tipVakcine->getPristiglekolicine();
            foreach($pristigle as $kolicina){
                $kolicina->setRezervisanakolicina($kolicina->getRezervisanakolicina() - 1);
                $kolicina->setRaspolozivakolicina($kolicina->getRaspolozivakolicina() - 1);
                
                if($kolicina->getRaspolozivakolicina() == 0){
                    $tipVakcine->removePristigleKolicine($kolicina);
                }
                
                break;
            }
            
            $tipVakcine->setKolicinavakcinisanih($tipVakcine->getKolicinavakcinisanih() + 1);
            $this->doctrine->em->flush();
            
            return $this->prikaz('validacija.php', ["greske" => ['vakcina' => 'Vakcinacija zabeležena'], 'gradjanin' => ['gradjanin' => $g]]);
        }
}
