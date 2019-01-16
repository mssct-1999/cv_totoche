<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Formations;
use App\Entity\Competences;
use App\Entity\Projet;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CompetenceType;
use App\Form\FormationsType;
use App\Form\ProjetType;
use Doctrine\Common\Persistence\ObjectManager;

class CVController extends AbstractController
{
    /**
     * @var ObjectManager
     */
    private $em;


    public function __construct(ObjectManager $em) {
        $this->em = $em;
    }
    
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Projet::class);
        $images = $repo->findAllPictures();
        $projets = $repo->findAll();
        return $this->render('cv/index.html.twig', [
            'projets' => $projets,
            'images' => $images 
        ]);
    }

    /**
     * @Route("/formations", name="formation")
     */
    public function showFormations() {
        $repo = $this->getDoctrine()->getRepository(Formations::class);
        $formations = $repo->findAll();
        return $this->render('cv/formations.html.twig', [
            'formations' => $formations,
        ]);
    }

    /**
     * @Route("/competences", name="competences")
     */
    public function showCompetences() {
        $repo = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repo->findAll();
        return $this->render('cv/competences.html.twig', [
            'competences' => $competences
        ]);
    }

    /**
     * @Route("/loisirs",name="loisirs") 
     */
    public function showLoisirs() {
        return $this->render('cv/loisirs.html.twig');
    }

    /** 
     * @Route("/contact", name="contact")
     */
    public function showContact() {
        return $this->render('cv/contact.html.twig');
    }

    /**
     * @Route("/creation_formation", name="creation_formation")
     */
    public function createFormation(Request $request) {
        $formation = new Formations();
        $repo = $this->getDoctrine()->getRepository(Formations::class);
        $formations = $repo->findAll();
        $form = $this->createForm(FormationsType::class, $formation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $a = $form->getData();
            $this->em->persist($a);
            $this->em->flush();
            return $this->redirectToRoute('creation_formation');
        }
        return $this->render('cv/creation_formation.html.twig', [
            'formations' => $formations,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/creation_projet", name="creation_projet")
     */
    public function createProjet(Request $request) {
        $repo = $this->getDoctrine()->getRepository(Projet::class);
        $projets = $repo->findAll();
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $a = $form->getData();
            $this->em->persist($a);
            $this->em->flush();
            return $this->redirectToRoute('creation_projet');
        }
        return $this->render('cv/creation_projet.html.twig', [
            'projets' => $projets,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/creation_competence", name="creation_competence")
     */
    public function createCompetence(Request $request) {
        $competence = new Competences();
        $repo = $this->getDoctrine()->getRepository(Competences::class);
        $competences = $repo->findAll();
        $form = $this->createForm(CompetenceType::class, $competence);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $a = $form->getData();
            $this->em->persist($a);
            $this->em->flush();
            return $this->redirectToRoute('creation_competence');
        }
        return $this->render('cv/creation_competence.html.twig', [
            'competences' => $competences,
            'form' => $form->createView()
        ]);
    }

}
