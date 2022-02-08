<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/actualites", name="actualites")
     */
    public function actualites(): Response
    {
        $articles = $this->entityManager->getRepository(Article::class)->findAll();

        return $this->render('blog/blog.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/actualites/{slug}", name="article")
     */
    public function article($slug)
    {
        $article = $this->entityManager->getRepository(Article::class)->findOneBySlug($slug);

        if (!$article) {
            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/article.html.twig', [
            'article' => $article,
        ]);
    }

}
//TODO afficher les news en commençant par les plus récentes