<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_hello')]
    public function hello(): Response
    {
        return new Response('hello world');
    }

    #[Route('/blog/{id}/{name}', name: 'app_blog' , requirements:["name"=>"[a-zA-Z]{2,50}"])]
    public function index($id , $name): Response
    {
        return $this->render('blog/index.html.twig', [
            'id' =>$id,
            'name' =>$name,
            'controller_name' => 'BlogController',
        ]);
    }
}
