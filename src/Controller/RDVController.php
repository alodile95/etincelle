<?php

namespace App\Controller;

use App\Entity\RDV;
use App\Form\RDVType;
use App\Services\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RDVController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/rdv", name="rdv")
     */
    public function rdv(Request $request): Response
    {
        $rdv = new RDV();
        $form = $this->createForm(RDVType::class, $rdv);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rdv->setCreatedAt(new \DateTimeImmutable());
            $rdv = $form->getData();

            $this->entityManager->persist($rdv);
            $this->entityManager->flush();

            //  envoi d'un email à l'administrateur pour prévenir de l'arrivée d'un nouveau rdv
            $content = "<div style='border: #377207 solid 3px ; padding: 5px ; margin: auto'><b>" . $rdv->getPrenom() ." ". $rdv->getNom() . " </b> demande un rendez-vous. <br><br><b>
            email : " . $rdv->getEmail() . " <br><br>
            téléphone : ". $rdv->getTelephone() ."</b><br><br>
            Voici son motif (facultatif) : <br><br><em>"
            . $rdv->getMotif() . "</em><br><br></div><br>
            <b> Il attend une réponse.</b>";
            $mail = new Mail();
            $mail->send('alain.pegeot@gmail.com', 'Alain', 'Nouvelle demande de rendez-vous pour Étincelle-Vittoz.', $content);
        }

        return $this->render('rdv/rdv.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
