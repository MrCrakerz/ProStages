<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Entity\Formation;
class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(): Response
    {
		$stageRepository = $this->getDoctrine()->getRepository(Stage::class);
		$stages=$stageRepository->findAll();

        return $this->render('prostages/index.html.twig',['stages'=>$stages]);
        //return new Response ('<html > <body > <h1 > Bienvenue sur la page d\'accueil de Prostages </h1 > </ body > </ html >');
    }

	/**
	* @Route ("/entreprises" , name ="prostages_entreprises")
	*/
	public function afficherEntreprises () : Response
	{
	  $entrepriseRepository = $this->getDoctrine()->getRepository(Entreprise::class);
	  $entreprises=$entrepriseRepository->findAll();
      return $this->render('prostages/entreprise.html.twig',['entreprises'=>$entreprises]);
    //return new Response ('<html > <body > <h1 > Cette page affichera la liste des entreprises proposant un stage </h1 > </ body > </ html >');
	}

	/**
	* @Route ("/formations" , name ="prostages_formations")
	*/
	public function afficherFormations () : Response
	{
	$formationRepository = $this->getDoctrine()->getRepository(Formation::class);
	$formations=$formationRepository->findAll();
    return $this->render('prostages/formation.html.twig',['formations'=>$formations]);
	}

	/**
	 * @Route ("/stages/{id}" , name ="prostages_stages")
	 */
	 public function afficherStages ($id) : Response
	 {
	 	$stageRepository = $this->getDoctrine()->getRepository(Stage::class);
		$stage = $stageRepository->find($id);
		 return $this->render('prostages/detailStage.html.twig',['stage'=>$stage,]);
	//return new Response ('Cette page affichera le descriptif du stage ayant pour identifiant '.$id);
	 }

	 /**
	 * @Route ("/stages/entreprise/{id}" , name ="prostages_stagesParE")
	 */
	public function triParEntreprise ($id) : Response
	{
		$entrepriseRepository = $this->getDoctrine()->getRepository(Entreprise::class);
	  	$entreprise = $entrepriseRepository->find($id);
		
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$entreprise->getStages(),]);

	}

	 /**
	 * @Route ("/stages/formation/{id}" , name ="prostages_stagesParF")
	 */
	public function triParFormation ($id) : Response
	{
		$formationRepository = $this->getDoctrine()->getRepository(Formation::class);
	  	$formation = $formationRepository->find($id);
		
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$formation->getStages(),]);

	}
}
