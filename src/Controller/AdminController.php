<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Competences;
use App\Entity\Projet;
use App\Entity\Formations;
use App\Form\CompetenceType;
use App\Form\FormationsType;
use App\Form\ProjetType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;

class AdminController extends AbstractController
{
    /**
     * @var ObjectManager
     */
    private $em;


    public function __construct(ObjectManager $em) {
        $this->em = $em;
    }

// PARTIE EDITION //

    /**
     * @Route("/admin/competence/{id}", name="edit_competence", methods="GET|POST") 
     */
    public function editCompetence(Competences $competence, Request $request) {
        $form = $this->createForm(CompetenceType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('creation_competence');
        }
        return $this->render("admin/edit_competence.html.twig", [
            'competence' => $competence,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/projet/{id}", name="edit_projet", methods="GET|POST")
     */
    public function editProjet(Projet $projet, Request $request) {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('creation_projet');
        }
        return $this->render("admin/edit_projet.html.twig", [
            'projet' => $projet,
            'form' => $form->createView()
        ]);
    } 

    /**
     * @Route("/admin/formation/{id}", name="edit_formation", methods="GET|POST")
     */
    public function editFormation(Formations $formation, Request $request) {
        $form = $this->createForm(FormationsType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('creation_formation');
        }
        return $this->render("admin/edit_formation.html.twig", [
            'formation' => $formation,
            'form' => $form->createView()
        ]);
    }

// PARTIE SUPPRESSION //

    /**
    * @Route("admin/competence/{id}", name="delete_competence", methods="DELETE")
    */
    public function deleteCompetence(Competences $competence, Request $request) {
        if ($this->isCsrfTokenValid('delete' . $competence->getId(), $request->get('_token'))) {
            $this->em->remove($competence);
            $this->em->flush();
        } 
        return $this->redirectToRoute('creation_competence');
    }
    

    /**
     * @Route("admin/projet/{id}", name="delete_projet", methods="DELETE")
     */
    public function deleteProjet(Projet $projet, Request $request) {
        if ($this->isCsrfTokenValid('delete' . $projet->getId(), $request->get('_token'))) {
            $this->em->remove($projet);
            $this->em->flush();
        } 
        return $this->redirectToRoute('creation_projet');
    }

    /**
     * @Route("admin/formation/{id}", name="delete_formation", methods="DELETE")
     */
    public function deleteFormation(Formations $formation, Request $request) {
        if ($this->isCsrfTokenValid('delete' . $formation->getId(), $request->get('_token'))) {
            $this->em->remove($formation);
            $this->em->flush();
        } 
        return $this->redirectToRoute('creation_formation');
    }
}
