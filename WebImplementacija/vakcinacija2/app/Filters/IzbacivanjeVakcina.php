<?php namespace App\Filters;

use App\Models\Entities;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IzbacivanjeVakcina implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session=session();
        $trenutniDatum = date('m/d/Y', time());       
        $datt = $session->get('datum');
        
        $doctrine = \Config\Services::doctrine();
        
        if(strtotime($datt) != strtotime($trenutniDatum) or (strtotime($datt) == strtotime($trenutniDatum) and (int)$session->get('setFlag') == 0)){
            $vakcine = $doctrine->em->getRepository(Entities\Pristiglevakcine::class)->findAll();
            foreach($vakcine as $vakcina){
                $datum = $vakcina->getRokupotrebe();
                $datum = $datum->format('d/m/Y');
                if(strtotime($datum) == strtotime($trenutniDatum)){
                    $tipVack = $doctrine->em->getRepository(Entities\Tipvakcine::class)->find($vakcina->getIdtipvakcine());
                    $tipVack->removePristigleKolicine($vakcina);
                    $doctrine->em->remove($vakcina);
                }
            }
            $session->set('datum', $trenutniDatum);
            $session->set('setFlag', 1);
            $doctrine->em->flush(); 
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}