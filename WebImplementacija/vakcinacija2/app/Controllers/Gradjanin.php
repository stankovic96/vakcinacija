<?php

namespace App\Controllers;
use App\Models\Entities;

ini_set('memory_limit','2000M');
class Gradjanin extends BaseController
{
	public function index()
	{
            return $this->prikaz('gradjanin.php', []);
	}
        
        public function prikaz($page, $data){
            $data['controller'] = "Gradjanin";
            
            $data["korisnik"] = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                    ->find($this->session->get("id"));

            echo view("Prototip/$page", $data);
        }
        
        public function prijavaVakcina()
        {
            $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                                    ->find($this->session->get('id'));
            
            if($gradjanin->getStatusprijave() == "Zakazan"){
                return $this->prikaz('gradjanin.php', ['greske' =>['prijava' => 'Nije moguće prijaviti se više puta!']]);
            }
            
            $naziviVakcine = [];
            
            $vakcine = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();
                    
            if($vakcine != null)
                foreach($vakcine as $vakcina){
                    $naziviVakcine[] = $vakcina->getNaziv();
                }
            else{
                $naziviVakcine[] = "Ne postoji niti jedna vakcina u ponudi";
            }
            
            $gradovi = $this->doctrine->em->getRepository(Entities\Mesto::class)->findAll();
            $nazivi = [];
            
            if($gradovi != null){
                foreach($gradovi as $grad)
                    {
                        $nazivi[] = $grad->getNaziv();
                    }
            }
            else{
                $naiziv[] = "Ne postoji grad u kojem se moze primiti vakcina";
            }
            return $this->prikaz("vakcinacija_prijava.php", ["vakcine" => $naziviVakcine, "gradovi" => $nazivi]);
        }
        
        public function prijavaVakcinasubmit()
        {
            $tip = $this->request->getVar('vakcina');
            $bolest = $this->request->getVar('bolest');
            $mesto = $this->request->getVar('mesto');
            
            
            //PROVERA DA LI IMA DOSTUPINIH VAKCINA
            $vakcine = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)
                    ->findOneBy(['naziv' => $tip]);
            
            $pristigle = $vakcine->getPristigleKolicine();
            $imaVakcina = false;
            $paketVakcinaId = null;
            
            if($pristigle != null)
                foreach($pristigle as $kolicina){
                    if($kolicina->getRaspolozivakolicina() - $kolicina->getRezervisanakolicina() > 0){
                        $paketVakcinaId = $kolicina->getIdpristiglevakcine();
                        $imaVakcina = true;
                        break;
                    }
                }
            
            if($imaVakcina == false){
                $gradovi = $this->doctrine->em->getRepository(Entities\Mesto::class)->findAll();
                $nazivi = [];

                if($gradovi != null){
                    foreach($gradovi as $grad)
                        {
                            $nazivi[] = $grad->getNaziv();
                        }
                }
                else{
                    $naiziv[] = "Ne postoji grad u kojem se moze primiti vakcina";
                }
                
                $naziviVakcine = [];            
                $vakcine = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)->findAll();

                if($vakcine != null)
                    foreach($vakcine as $vakcina){
                        $naziviVakcine[] = $vakcina->getNaziv();
                    }
                else{
                    $naziviVakcine[] = "Ne postoji niti jedna vakcina u ponudi";
                }
                
                return $this->prikaz('vakcinacija_prijava.php', ['greske' => ['nedostatak' => "Ne postoji dovoljan broj vakcina za $tip vakcine za koje se prijavljujete"],
                    "gradovi" => $nazivi, "vakcine" => $naziviVakcine]);
            }
            
            
            $gradjanin = $this->doctrine->em->getRepository(Entities\Gradjanin::class)
                    ->find($this->session->get('id'));
            

            $mest = $this->doctrine->em->getRepository(Entities\Mesto::class)->
                    findOneBy(['naziv' => $mesto]);
            
            $paketVakcina = $this->doctrine->em->getRepository(Entities\Pristiglevakcine::class)
                    ->find($paketVakcinaId);
            
            $mest->addGradjanini($gradjanin);
            
            $vakcine = $this->doctrine->em->getRepository(Entities\Tipvakcine::class)
                    ->findBy(['naziv' => $tip]);
            $idVakcine = $vakcine[0]->getIdtipvakcine();
            
            $gradjanin->setIdtipvakcine($this->doctrine->em->getRepository(Entities\Tipvakcine::class)->find($idVakcine));
            $gradjanin->setStatusprijave('Zakazan');
            $gradjanin->setDatumt1(new \DateTime("+1 week"));
            $gradjanin->setTermint1(true);
            $paketVakcina->setRezervisanakolicina($paketVakcina->getRezervisanakolicina() + 1);
            $this->doctrine->em->flush();
            
           // return $this->prikaz('gradjanin.php', []);
            return redirect()->to(site_url("Gradjanin"));
        }
}
