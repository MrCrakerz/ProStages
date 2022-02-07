<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use App\Entity\Formation;
class ProstagesController extends AbstractController

{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(StageRepository $stageRepository): Response
    {
		//Affichage de la page principale du site
		$stages=$stageRepository->findAll();
        return $this->render('prostages/index.html.twig',['stages'=>$stages]);
    }

	/**
	* @Route ("/entreprises" , name ="prostages_entreprises")
	*/
	public function afficherEntreprises (EntrepriseRepository $entrepriseRepository) : Response
	{
		//Affichage de la page de la liste des entreprises proposant des stages
		$entreprises=$entrepriseRepository->findAll();
		return $this->render('prostages/entreprise.html.twig',['entreprises'=>$entreprises]);
	}

	/**
	* @Route ("/formations" , name ="prostages_formations")
	*/
	public function afficherFormations (FormationRepository $formationRepository) : Response
	{
		//Affichage de la page de la liste des formations ayant des stages les concernant
		$formations=$formationRepository->findAll();
		return $this->render('prostages/formation.html.twig',['formations'=>$formations]);
	}

	/**
	 * @Route ("/stages/{id}" , name ="prostages_stages")
	 */
	 public function afficherStages ($id,StageRepository $stageRepository  ) : Response
	 {
		//Affichage de la page mettant en évidence les détails d'un stage donné
		$stage = $stageRepository->find($id);
		 return $this->render('prostages/detailStage.html.twig',['stage'=>$stage,]);
	 }

	 /**
	 * @Route ("/stages/entreprise/{id}" , name ="prostages_stagesParE")
	 */
	public function triParEntreprise ($id, EntrepriseRepository $entrepriseRepository) : Response
	{
		//Affichage de la page listant les stages proposés par une certaine entreprise donnée
	  	$entreprise = $entrepriseRepository->find($id);
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$entreprise->getStages(),]);
	}

	 /**
	 * @Route ("/stages/formation/{id}" , name ="prostages_stagesParF")
	 */
	public function triParFormation ($id, FormationRepository $formationRepository) : Response
	{
		//Affichage de la page listant les stages concernés par une certaine formation donnée
	  	$formation = $formationRepository->find($id);
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$formation->getStages(),]);
	}
}
