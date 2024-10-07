<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategorieRepository $categorieRepository, ServiceRepository $serviceRepository): Response
    {
        $categories = $categorieRepository->findAll();
        $services = $serviceRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $categories,
            'services' => $services
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }

    #[Route('/apropos', name: 'app_apropos')]
    public function apropos()
    {
        return $this->render('home/apropos.html.twig');
    }
}
