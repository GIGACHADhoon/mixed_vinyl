<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(){

        $tracks = [
            ['song'=>'Quiver','artist'=>'Darren Styles'],
            ['song'=>'Famous','artist'=>'21 Savage'],
        ];

        return $this->render('homepage.html.twig',['title'=>'PB & Jams','tracks'=>$tracks,]);
    }

    #[Route('/browse/{genre}')]
    public function browse(string $genre = null): Response
    {
        if ($genre) {
            $title = u(str_replace('-', ' ', $genre))->title(true);
        } else {
            $title = "All Genres";
        }
        return new Response("Genre: {$title}");

    }
}