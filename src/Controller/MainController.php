<?php

namespace App\Controller;


use App\Repository\CategoriesRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    //^^ Premiére page du site qui affiche une presentation sommaire des categories et produits 
    #[Route('/', name: 'app_main')]
    public function index(CategoriesRepository $categoriesRepository, ProductsRepository $productsRepository): Response
    {

        $cat = $categoriesRepository->findBy([], ['categoryOrder' => 'asc']);
        $pro = $productsRepository->findBy([], ['name' => 'asc']);

        // var_dump($cat);

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'categories' => $cat,
            'products' => $pro,
        ]);
    }


    #[Route('/loader', name: 'app_loader')]
    public function loader(): Response
    {

        return $this->render('fonctionality/loader.html.twig',[
            'loader' => 'loader',
        ]);
    }

    
    #[Route('/card', name: 'app_loader')]
    public function card(): Response
    {

        return $this->render('fonctionality/card.html.twig',[
            'loader' => 'loader',
        ]);
    }


}





