<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Creation d'un générateur de données Faker*
        $Faker = \Faker\Factory::create('fr_FR');
        for ($i=0; $i < 10; $i++) { 
            $EntrepriseFaker = new Entreprise();
            $EntrepriseFaker->setNom($Faker->company());
            $EntrepriseFaker->setAdresse($Faker->address());
            $EntrepriseFaker->setActivite($Faker->realText($maxNbChars = 100, $indexSize = 2));
            $EntrepriseFaker->setSite($Faker->url());
            $entreprises[]= $EntrepriseFaker;
            $manager->persist($EntrepriseFaker);
        }
        
       $FormationInfo = new Formation();
       $FormationInfo->setLibelle('DUT info');
       $FormationInfo->setNomLong('Diplôme Universitaire Technologique Informatique');
       $formations[]=$FormationInfo;
       $manager->persist($FormationInfo);

       $FormationGim = new Formation();
       $FormationGim->setLibelle('DUT GIM');
       $FormationGim->setNomLong('Diplôme Universitaire Technologique Génie Industriel et Maintenance');
       $formations[]=$FormationGim;
       $manager->persist($FormationGim);

       $FormationGea = new Formation();
       $FormationGea->setLibelle('DUT GEA');
       $FormationGea->setNomLong('Diplôme Universitaire Technologique Gestion Entreprise Administrations');
       $formations[]=$FormationGea;
       $manager->persist($FormationGea);

       $FormationLpProg = new Formation();
       $FormationLpProg->setLibelle('LP Prog');
       $FormationLpProg->setNomLong('License profesionnelle programmation');
       $formations[]=$FormationLpProg;
       $manager->persist($FormationLpProg);


       

       $tabMetiersFaker = array("Satgiaire","Assistant","Responsable","Ingénieur");
       $tabType = array("en Ménage","en Informatique","en Gestions de BD","en POO","en Programmation WEB","en Mécanique","en Electronique");

       for ($i=0; $i < 30; $i++)
       { 
           $stageFaker = new Stage ();
           $stageFaker->setTitre($tabMetiersFaker[$faker->numberBetween($min=0,$max=count($tabMetiersFaker)-1)].$tabType[$faker->numberBetween($min=0,$max=count($tabType)-1)]);
           $stageFaker->setDescMission($faker->realText($maxNbCahrs=250,$indexSize=2));
           $stageFaker->setEmail($faker->email());
           $stageFaker->setEntreprise($entreprises[$faker->numberBetween($min=0,$max=count($entreprises)-1)]);
           for ($j=0 ; $j < $faker->numberBetween($min=1,$max=4) ; $j++ ) { 
               $numForm = $faker->unique->numberBetween($min=0,$max=4);
               $formationAjout = $formations[$numForm];
               $stageFaker->addFormation($formationAjout);
           }
           manager->persist($stageFaker);
           $faker->unique($reset=true);
           

       }

       $manager->flush();
    }
}
 