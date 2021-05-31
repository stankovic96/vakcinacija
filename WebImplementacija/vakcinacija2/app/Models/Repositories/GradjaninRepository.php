<?php namespace App\Models\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GradjaninRepository
 *
 * @author Computer
 */

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\Criteria;
class GradjaninRepository extends EntityRepository{
    
    public function dohvatiGradjaninaPoEmailu($mail){
        return $this->findBy(['email'=>$mail]);
    }
}
