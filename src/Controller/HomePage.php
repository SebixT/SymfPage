<?php

namespace App\Controller;

use App\Entity\Movie;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePage extends AbstractController
{

    /**
     * @Route("/", name="movie_list")
     */
    public function index() 
    {
        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();
        return $this->render(
            'homepage.html.twig',
            array('movies' => $movies)
        );
    }

    /**
     * @Route("/movie/{id}", name="movie_show")
     */
    public function show($id)
    {
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);

        return $this->render(
            'movie/show.html.twig',
            array('movie' => $movie)
        );
    }

    // /**
    //  * @Route("/movie/save")
    //  */
    // public function save()
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $movie = new Movie();
    //     $movie->setTitle('Movie 2');
    //     $movie->setBody('Body for movie 2');

    //     $entityManager->persist($movie);
    //     $entityManager->flush();

    //     return new Response('Saves a movie with id of ' . $movie->getId());
    // }
}