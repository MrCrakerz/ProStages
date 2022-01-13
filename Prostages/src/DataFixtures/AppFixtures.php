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
    //Creation d'un générateur de données Faker en français
    $Faker = \Faker\Factory::create('fr_FR');

    //Boucle servant à créer 10 entreprises
        for ($i=0; $i < 10; $i++) { 
            $EntrepriseFaker = new Entreprise();
            //Utilisation de faker pour remplir les différents attributs de l'objet de type Entreprise crée au dessus 
            $EntrepriseFaker->setNom($Faker->company());
            $EntrepriseFaker->setAdresse($Faker->address());
            $EntrepriseFaker->setActivite($Faker->realText($maxNbChars = 100, $indexSize = 2));
            $EntrepriseFaker->setSite($Faker->url());
            //Affectation de l'objet Entreprise dans un tableau pour pouvoir le réutiliser / le réaffecter plus tard
            $entreprises[]= $EntrepriseFaker;
            //Sauvegarde de l'objet dans symfony
            $manager->persist($EntrepriseFaker);
        }

        //Création de 4 formations sans faker car précises
        $FormationInfo = new Formation();
        $FormationInfo->setLibelle('DUT info');
        $FormationInfo->setNomLong('Diplôme Universitaire Technologique Informatique');
        $formations[]=$FormationInfo;
        //Sauvegarde de l'objet dans symfony
        $manager->persist($FormationInfo);

        $FormationGim = new Formation();
        $FormationGim->setLibelle('DUT GIM');
        $FormationGim->setNomLong('Diplôme Universitaire Technologique Génie Industriel et Maintenance');
        //Affectation de l'objet Formation dans un tableau pour pouvoir le réutiliser / le réaffecter plus tard
        $formations[]=$FormationGim;
        //Sauvegarde de l'objet dans symfony
        $manager->persist($FormationGim);

        $FormationGea = new Formation();
        $FormationGea->setLibelle('DUT GEA');
        $FormationGea->setNomLong('Diplôme Universitaire Technologique Gestion Entreprise Administrations');
        //Affectation de l'objet Formation dans un tableau pour pouvoir le réutiliser / le réaffecter plus tard
        $formations[]=$FormationGea;
        //Sauvegarde de l'objet dans symfony
        $manager->persist($FormationGea);

        $FormationLpProg = new Formation();
        $FormationLpProg->setLibelle('LP Prog');
        $FormationLpProg->setNomLong('License profesionnelle programmation');
        //Affectation de l'objet Formation dans un tableau pour pouvoir le réutiliser / le réaffecter plus tard
        $formations[]=$FormationLpProg;
        //Sauvegarde de l'objet dans symfony
        $manager->persist($FormationLpProg);


        //Création de tableaux allant servir de dictionnaire à Faker pour générer des mots
        $tabMetiersFaker = array("Satgiaire ","Assistant ","Responsable ","Ingénieur");
        $tabType = array("en Ménage","en Informatique","en Gestions de BD","en POO","en Programmation WEB","en Mécanique","en Electronique");
        //Boucle servant à créer 30 stages
       for ($i=0; $i < 30; $i++)
       { 
            //Création d'un stage
            $stageFaker = new Stage();
            //Affectation d'un titre généré grâce à la combinaison d'un mot de chacun des deux tableaux précédents 
            $stageFaker->setTitre($tabMetiersFaker[$Faker->numberBetween($min=0,$max=count($tabMetiersFaker)-1)].$tabType[$Faker->numberBetween($min=0,$max=count($tabType)-1)]);
            $stageFaker->setDescMissions($Faker->catchPhrase());
            $stageFaker->setEmail($Faker->email());
            //Grâce au tableau d'Entreprise crée précédemment, on sélectionne aléatoirmement avec Faker une entreprise
            $stageFaker->setEntreprise($entreprises[$Faker->numberBetween($min=0,$max=count($entreprises)-1)]);
            //Boucle servant à ajouter entre 1 et 4 formation au stage
            for ($j=0 ; $j < $Faker->numberBetween($min=1,$max=4) ; $j++ ) 
            { 
                //Utilisation de unique pour ne pas sélectionner deux fois la même formation
                $numForm = $Faker->unique->numberBetween($min=0,$max=3);
                $formationAjout = $formations[$numForm];
                //Affectation de la formation sélectionnée
                $stageFaker->addFormation($formationAjout);
            }
            //Sauvegarde de l'objet dans symfony
            $manager->persist($stageFaker);
            //Réinitialisation de unique pour qu'il puisse réutilisé les nombres qu'il avait déjà utilisé
            $Faker->unique($reset=true);
           

       }
       //Envoie de toutes les données générées en base de données
       $manager->flush();
    }
}
 