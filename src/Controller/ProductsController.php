<?php

namespace App\Controller;

use App\Entity\Categories;
// use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/produits', name: 'produits_')]
class ProductsController extends AbstractController
{
    // ^^ indexProduits
    #[Route('/indexProduits', name: 'indexProduits')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
        ]);
    }

    // ^^ produitsDetails
    #[Route('/details/{slug}', name: 'produitsDetails')]
    public function details( Categories $categories, ProductsRepository $productsRepository): Response
    {

        $pro = $productsRepository->findBy([], ['name' => 'asc']);

        return $this->render('products/details.html.twig', [
            'controller_name' => 'ProductsController',
            'products' => $pro,
            'categories' => $categories,
            // compact($products),
            // compact($categories),
        ]);
    }

    // ^^ produitsList
    #[Route('/list/{slug}', name: 'produitsList')]
    public function list(ProductsRepository $productsRepository, $slug){

        $pro = $productsRepository->findBy([], ['name' => 'asc']);

        return $this->render('products/details.html.twig', [
            'controller_name' => 'ProductsController',
            'product' => $pro,
        ]);
    }


}
