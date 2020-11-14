<?php

namespace Tests\App\Entity;

use App\Entity\Voyage;
use App\Repository\VoyageRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Collection;

class VoyageTest extends TestCase {

    private $em;
    private $voyageRep;

    public function __construct(EntityManagerInterface $em, VoyageRepository $voyageRep)
    {
        $this->em=$em;
        $this->voyageRep=$voyageRep;
    }

    public function testVoyageTitreType(){
        
    /* 
        $pile = array();
        $this->assertEmpty($pile);
        return $pile;
    */

        $voyage = new Voyage();
        //$voyageList=$this->em->getRepository(Voyage::class);
        
        $list = $this->voyageRep->findAll();
        
        foreach ($list as $voyageb)
        {
            $monTexte = $voyageb->getTitre();
            
            if ($monTexte == ''){
                $monTexte = null;
            }
            $this->assertIsString($monTexte);
        }
    
        return $monTexte;
        
    }
}