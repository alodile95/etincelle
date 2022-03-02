<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Niveau1Controller extends AbstractController
{
    /**
     * @Route("/qui-suis-je", name="qui")
     */
    public function qui(): Response
    {
        return $this->render('niveau1/qui.html.twig');
    }

    /**
     * @Route("/methode-vittoz", name="vittoz")
     */
    public function vittoz(): Response
    {
        return $this->render('niveau1/vittoz.html.twig');
    }

    /**
     * @Route("/que-faisons-nous-ensemble", name="que")
     */
    public function que(): Response
    {
        return $this->render('niveau1/que.html.twig');
    }

    /**
     * @Route("/pour-qui", name="pour-qui")
     */
    public function pour_qui(): Response
    {
        return $this->render('niveau1/pour-qui.html.twig');
    }

    /**
     * @Route("/exercices", name="exercices")
     */
    public function exercices(): Response
    {
        return $this->render('niveau1/exercices.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('niveau1/contact.html.twig');
    }

    /**
     * @Route("/seances-au-cabinet", name="cabinet")
     */
    public function cabinet(): Response
    {
        return $this->render('niveau1/cabinet.html.twig');
    }

    /**
     * @Route("/seances-a-l-ecole", name="ecole")
     */
    public function ecole(): Response
    {
        return $this->render('niveau1/ecole.html.twig');
    }

    /**
     * @Route("/seances-en-entreprise", name="entreprise")
     */
    public function entreprise(): Response
    {
        return $this->render('niveau1/entreprise.html.twig');
    }
}
