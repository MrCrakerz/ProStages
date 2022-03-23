<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Form\FormationType;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use App\Entity\Formation;
use App\Form\EntrepriseType;
use App\Form\StageType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Form\Extension\Core\Type\TextareaType ;
 use Symfony\Component\Form\Extension\Core\Type\TextType ;
 use Symfony\Component\Form\Extension\Core\Type\UrlType ;
 use Doctrine\ORM\EntityManagerInterface;
class ProstagesController extends AbstractController

{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(StageRepository $stageRepository): Response
    {
		//Affichage de la page principale du site
		$stages=$stageRepository->RecupererTousLesStages();
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
	// public function triParEntreprise ($id, EntrepriseRepository $entrepriseRepository) : Response
	// {
	// 	//Affichage de la page listant les stages proposés par une certaine entreprise donnée
	//   	$entreprise = $entrepriseRepository->find($id);
	// 	return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$entreprise->getStages(),]);
	// }

	 /**
	 * @Route ("/stages/formation/{id}" , name ="prostages_stagesParF")
	 */
	// public function triParFormation ($id, FormationRepository $formationRepository) : Response
	// {
	// 	//Affichage de la page listant les stages concernés par une certaine formation donnée
	//   	$formation = $formationRepository->find($id);
	// 	return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$formation->getStages(),]);
	// }

	 /**
	 * @Route ("/stages/entreprise/{nomEntreprise}" , name ="prostages_stagesParEntreprise")
	 */

	public function afficherStagesParEntreprise ($nomEntreprise,StageRepository $stageRepository  ) : Response
	{
	   //Affichage de la page mettant en évidence les détails d'un stage donné
	   $stage = $stageRepository->findByEntreprise($nomEntreprise);
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$stage,]);
	}

	/**
	 * @Route ("/stages/formation/{nomFormation}" , name ="prostages_stagesParFormation")
	 */

	public function afficherStagesParFormation ($nomFormation,StageRepository $stageRepository  ) : Response
	{
	   //Affichage de la page mettant en évidence les détails d'un stage donné
	   $stage = $stageRepository->findByFormation($nomFormation);
		return $this->render('prostages/stagesParEntreprise.html.twig',['stages'=>$stage,]);
	}

	/**
	 * @Route ("/admin/entreprise/ajouter" , name ="prostages_add_entreprise")
	 */
	public function ajouterEntreprise (Request $requete, EntityManagerInterface $manager, )
	{
	// Création d'une ressource initialement vierge
	$entreprise = new Entreprise ();

	$formulaireEntreprise = $this -> createForm ( EntrepriseType::class,$entreprise );
	$formulaireEntreprise -> handleRequest ( $requete);

	if($formulaireEntreprise->isSubmitted() && $formulaireEntreprise->isValid())
	{
	// Enregistrer la ressource en BD
	$manager -> persist ($entreprise);
	$manager -> flush ();
	// Rediriger l' utilisateur vers la page affichant la liste des ressources
	return $this -> redirectToRoute ('prostages_accueil');

	}
	// Afficher la page d'ajout d'une entreprise
	return $this -> render ('prostages/ajoutEntreprise.html.twig ',
	['vueFormulaireEntreprise' => $formulaireEntreprise -> createView ()]);
	}

	/**
	 * @Route ("/admin/entreprise/modifier/{id}" , name ="prostages_modify_entreprise")
	 */
	public function modifierEntreprise (Request $requete, EntityManagerInterface $manager, Entreprise $entreprise)
		{

		$formulaireEntreprise = $this -> createForm (EntrepriseType::class,$entreprise );
		$formulaireEntreprise -> handleRequest ( $requete);

		if($formulaireEntreprise->isSubmitted() && $formulaireEntreprise->isValid())
		{
		// Enregistrer la ressource en BD
		$manager -> persist ($entreprise);
		$manager -> flush ();
		// Rediriger l' utilisateur vers la page affichant la liste des ressources
		return $this -> redirectToRoute ('prostages_accueil');

		}
		// Afficher la page d'ajout d'une entreprise
		return $this -> render ('prostages/ajoutEntreprise.html.twig ',
		['vueFormulaireEntreprise' => $formulaireEntreprise -> createView ()]);
		}
	/**
	 * @Route ("/profile/stage/ajouter" , name ="prostages_add_stage")
	 */
	public function ajouterStage (Request $requete, EntityManagerInterface $manager)
	{
	// Création d'une ressource initialement vierge
	$stage = new Stage ();

	$formulaireStage = $this -> createForm ( StageType::class,$stage );
	$formulaireStage -> handleRequest ( $requete);

	if($formulaireStage->isSubmitted() && $formulaireStage->isValid())
	{
	// Enregistrer la ressource en BD
	$manager -> persist ($stage);
	$manager -> flush ();
	// Rediriger l' utilisateur vers la page affichant la liste des ressources
	return $this -> redirectToRoute ('prostages_accueil');

	}
	// Afficher la page d'ajout d'une entreprise
	return $this -> render ('prostages/ajoutStage.html.twig ',
	['vueFormulaireStage' => $formulaireStage -> createView ()]);
	}

	/**
	 * @Route ("/profile/stage/modifier/{id}" , name ="prostages_modify_stage")
	 */
	public function modifierStage (Request $requete, EntityManagerInterface $manager, Stage $stage)
		{

		$formulaireStage = $this -> createForm (StageType::class,$stage );
		$formulaireStage -> handleRequest ( $requete);

		if($formulaireStage->isSubmitted() && $formulaireStage->isValid())
		{
		// Enregistrer la ressource en BD
		$manager -> persist ($stage);
		$manager -> flush ();
		// Rediriger l' utilisateur vers la page affichant la liste des ressources
		return $this -> redirectToRoute ('prostages_accueil');

		}
		// Afficher la page d'ajout d'une entreprise
		return $this -> render ('prostages/ajoutStage.html.twig ',
		['vueFormulaireStage' => $formulaireStage -> createView ()]);
		}

}
