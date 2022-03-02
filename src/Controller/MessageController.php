<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Services\Mail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/message", name="message")
     */
    public function message(Request $request): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setCreatedAt(new \DateTimeImmutable());
            $message = $form->getData();

            $this->entityManager->persist($message);
            $this->entityManager->flush();

//  envoi d'un email à l'administrateur pour prévenir de l'arrivée d'un nouveau message
            $content = "'<b>" . $message->getNom() . "</b>' t'a laissé le message suivant depuis son adresse" . $message->getMail() . " : <br><br>Titre du message :<br><b>" . $message->getTitre() . "</b><br><br/> Corps du message : <br>" . $message->getCorps() . "<br><br><b> Il attend une réponse.</b>";
            $mail = new Mail();
            $mail->send('alain.pegeot@gmail.com', 'Alain', 'Tu as un nouveau message pour Étincelle.', $content);
        }

        return $this->render('message/message.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
//TODO changer la présentation du Dashboard et en particulier la première page