<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstagesController extends AbstractController
{
    /**
     * @Route("/", name="prostages_accueil")
     */
    public function index(): Response
    {
        return new Response ('<html > <body > <h1 > Bienvenue sur la page d\'accueil de Prostages </h1 > </ body > </ html >');
    }
	
	/**
	* @Route ("/entreprises" , name =" prostages_entreprises ")
	*/
	public function afficherEntreprises () : Response
	{
		return new Response ('<html > <body > <h1 > Cette page affichera la liste des entreprises proposant un stage </h1 > </ body > </ html >');
	}
	
	/**
	* @Route ("/formations" , name =" prostages_formations ")
	*/
	public function afficherFormations () : Response
	{
		return new Response ('<html > <body > <h1 > Cette page affichera la liste des formations de l\'IUT </h1 > </ body > </ html >');
	}
	
	/**
	 * @Route ("/stages/{id}" , name =" openclassdut_stages ")
	 */
	 public function afficherStages ($id) : Response
	 {
		return new Response ('Cette page affichera le descriptif du stage ayant pour identifiant '.$id);
	 }
}

