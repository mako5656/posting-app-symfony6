<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {
//        $microPost = new MicroPost();
//        $microPost->setTitle('It comes from controller');
//        $microPost->setText('HI!');
//        $microPost->setCreated(new DateTime());

        $microPost = $posts->find(4);
        $microPost->setTitle('Welcome in general!');
        $posts->save($microPost, true);

        return $this->render('micro_post/index.html.twig', [
            'controller_name' => 'MicroPostController',
        ]);
    }
}
