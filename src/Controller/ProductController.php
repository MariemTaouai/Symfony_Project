<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    #[Route('/simpleMsg', name: 'app_simpleMsg')]
    public function simpleMsg(){
        return new Response("Bonjourrr");
    }
        #[Route('/paramMsg/{var}', name: 'app_paramMsg')]
    public function paramMsg($var){
        return new Response("Bonjourrr".$var);
    }
      #[Route('/show', name: 'app_show')]
       public function showMsg(){
        return  $this->render("product/show.html.twig");
    }
      #[Route('/gotoIndex', name: 'app_gotoIndex')]
       public function goToIndex(){
        return  $this->redirectToRoute("app_product");
    }

}

