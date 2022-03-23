<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use App\Entity\Stage;
use App\Entity\Entreprise;
use App\Form\FormationType;
use App\Repository\StageRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FormationRepository;
use App\Entity\Formation;
use App\Form\EntrepriseType;
use App\Form\UserType;
use App\Form\StageType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Form\Extension\Core\Type\TextareaType ;
 use Symfony\Component\Form\Extension\Core\Type\TextType ;
 use Symfony\Component\Form\Extension\Core\Type\UrlType ;
 use Doctrine\ORM\EntityManagerInterface;
 use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
	 * @Route ("/inscription" , name ="app_inscription")
	 */
	public function ajouterUser(Request $requete, EntityManagerInterface $manager,UserPasswordEncoderInterface $encoder )
	{
        // Création un utilisateur vide
        $user = new User ();

        $formulaireUser = $this -> createForm (UserType::class,$user);
        $formulaireUser-> handleRequest ( $requete);

        if($formulaireUser->isSubmitted() && $formulaireUser->isValid())
        {
        
        // Enregistrer la ressource en BD
        $user->setRoles(['ROLE_USER']);
        //Encoder le mot de passe de l'utilisateur
        $encodagePassword = $encoder->encodePassword($user, $user->getPassword());
        $user->setPassword($encodagePassword);
        $manager -> persist ($user);
        $manager -> flush ();
        // Rediriger l' utilisateur vers la page affichant la liste des ressources
        return $this -> redirectToRoute ('prostages_accueil');
        

        }
        // Afficher la page d'ajout d'un utilisateur
        return $this -> render ('security/inscription.html.twig ',
        ['vueFormulaireUser' => $formulaireUser -> createView ()]);
	}
}
