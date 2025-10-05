<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
        #[Route(path: '/listauthor/{var}', name: 'author_show')]
       public function showMsg($var){
        $authors = array( array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
         array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' => ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
          array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300), );
        return  $this->render("author/listauthor.html.twig",array("x"=>$var,'tabauthors'=>$authors));
    }

        #[Route(path: '/list', name: 'list')]

    public function list(AuthorRepository $rpository){
        $authors=$rpository->findAll();
        return $this->render("author/listAuthorr.html.twig",['tabAuthors'=>$authors]);
       }
        #[Route(path: '/show/{id}', name: 'showAuthor')]

       public function show(AuthorRepository $rpository,$id){
        $author=$rpository->find($id);
        return $this->render("author/show.html.twig",['author'=>$author]);
       }
}
