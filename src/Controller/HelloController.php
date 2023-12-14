<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        ["message" => "hello", "created" => "2023/12/06"],
        ["message" => "hi", "created" => "2023/04/12"],
        ["message" => "bye", "created" => "2021/01/14"]
    ];
    #[Route('/{limit<\d+>?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
       return $this->render(
           "hello/index.html.twig", [
               "messages" => $this->messages,
               "limit" => $limit
       ]);
    }

    #[Route('/messages/{id<\d+>}', name: "app_show_one")]
    public function showOne(int $id): Response
    {
        return $this->render(
            "hello/show_one.html.twig", [
                "message" => $this->messages[$id]
        ]);
    }
}

