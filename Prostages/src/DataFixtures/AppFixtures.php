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
            $EntrepriseFaker->setContact($Faker->email());
            $manager->persist($EntrepriseFaker);
        }
       $FormationInfo = new Formation();
       $FormationInfo->setLibelle('DUT informatique');
       $manager->persist($FormationInfo);
       $FormationGim = new Formation();
       $FormationGim->setLibelle('DUT GIM');
       $manager->persist($FormationGim);
       $FormationGea = new Formation();
       $FormationGea->setLibelle('DUT GEA');
       $manager->persist($FormationGea);
       $FormationLpProg = new Formation();
       $FormationLpProg->setLibelle('LP programmation');
       $manager->persist($FormationLpProg);


       $manager->flush();
    }
}
 