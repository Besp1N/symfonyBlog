<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    #[Route('/', name: 'app_index')]
    public function index(UserProfileRepository $profiles, EntityManagerInterface $entityManager): Response
    {
//        $user = new User();
//        $user->setEmail("dupa@wp.pl");
//        $user->setPassword("123456789");
//
//       $profile = new UserProfile();
//       $profile->setUser($user);
//
//       $entityManager->persist($profile);
//       $entityManager->flush();

//        $profile = $profiles->find(1);
//        $entityManager->remove($profile);
//        $entityManager->flush();


       return $this->render(
           "hello/index.html.twig", [
               "messages" => $this->messages,
               "limit" => 3
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

