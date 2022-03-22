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
	 * @Route ("/entreprise/ajouter" , name ="prostages_add_entreprise")
	 */
	public function ajouterEntreprise (Request $requete, EntityManagerInterface $manager, )
	{
	// Création d'une ressource initialement vierge
	$entreprise = new Entreprise ();

	// création d'un objet formulaire pour ajouter une ressource
	$formulaireEntreprise = $this -> createFormBuilder ( $entreprise )
	-> add ('nom', TextType::class)
	-> add ('activite', TextType::class)
	-> add ('adresse', TextType::class)
	-> add ('site', UrlType::class)
	-> getForm ();
	$formulaireEntreprise -> handleRequest ( $requete );
	if($formulaireEntreprise->isSubmitted())
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
	 * @Route ("/entreprise/modifier/{id}" , name ="prostages_modify_entreprise")
	 */
	public function modifierEntreprise (Request $requete, EntityManagerInterface $manager, Entreprise $entreprise)
		{

		// création d'un objet formulaire pour ajouter une ressource
		$formulaireEntrepriseModif = $this -> createFormBuilder ( $entreprise )
				-> add ('nom', TextType::class)
				-> add ('activite', TextType::class)
				-> add ('adresse', TextType::class)
				-> add ('site', UrlType::class)
				-> getForm ();

		$formulaireEntrepriseModif -> handleRequest ( $requete );

		if($formulaireEntrepriseModif->isSubmitted())
		{
			// Enregistrer la ressource en BD
			$manager -> persist ($entreprise);
			$manager -> flush ();
			// Rediriger l' utilisateur vers la page affichant la liste des ressources
			return $this -> redirectToRoute ('prostages_accueil');

		}
		// Afficher la page d'ajout d'une entreprise
		return $this -> render ('prostages/modifierEntreprise.html.twig ',
		['vueFormulaireEntrepriseModif' => $formulaireEntrepriseModif -> createView ()]);
		}
}
