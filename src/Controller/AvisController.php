<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Services\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/avis", name="avis")
     */
    public function avis(): Response
    {
        $avis = $this->entityManager->getRepository(Avis::class)->findAll();

        return $this->render('avis/avis.html.twig',[
            'avis'=> $avis
            ]);
    }

    /**
     * @Route("/avis/edition", name="avis_edition")
     */
    public function avisEdition(Request $request): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setCreatedAt(new \DateTimeImmutable());
            $avis = $form->getData();

            $this->entityManager->persist($avis);
            $this->entityManager->flush();

//  envoi d'un email à l'administrateur pour prévenir de l'arrivée d'un nouveau message
            $content = "'<b>" .$avis->getPseudo()."</b>' t'a laissé l'avis suivant depuis son adresse ". $avis->getEmail()." : <br><br/> <b>". $avis->getTitre() . "</b><br><br/>" . $avis->getCorps();
            $mail = new Mail();
            $mail->send('alain.pegeot@gmail.com', 'Alain','Tu as un nouvel avis sur ton site.',$content);


        }

        return $this->render('avis/avisEdition.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
//TODO afficher les avis en commençant par le plus récent
//TODO faire une page pour envoyer un message à Yvette
//TODO faire une page de demande de RDV
//TODO ? faire une page avec les messages pour Yvette
//TODO ? faire une page avec les demandes de RDV pour Yvette
