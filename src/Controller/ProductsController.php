<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
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






    //& Site Raisine
    //^^ Page boutique - index_prodict.html.twig
    #[Route('/boutique', name: 'boutique')]
    public function boutique(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository){

        // Recherche tout les produits en base
        $products = $productsRepository->findAll();

        // recherche toutes les categories
        $categories = $categoriesRepository->findAll();


        return $this->render('boutique/index_produit.html.twig', [
            'name_page' => 'Boutique',
            'image1' => 'fonctionel.jpeg',
            'controller_name' => 'titre',
            'products' => $products,
            'categories' => $categories,       

        ]);
    }

        //^^ recherche de produit apres le post
        #[Route('/boutique/recherche', name: 'boutique_recherche')]
        public function Boutique_recherche(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository){
    
            // Recherche tout les produits en base
            $products = $productsRepository->findAll();
    
            // recherche toutes les categories
            $categories = $categoriesRepository->findAll();
            

            // $form->handleRequest($request);

           
            // $form = $this->createForm(VotreFormType::class);

            // // Manipulation du formulaire (vérification de la soumission, traitement des données, etc.)
            // $form->handleRequest($request);
    
            // // Vérifie si le formulaire a été soumis et est valide
            // if ($form->isSubmitted() && $form->isValid()) {
            //     // Récupération des données du formulaire
            //     $donnees = $form->getData();

            // }



        
            return $this->render('boutique/index_produit.html.twig', [
                'name_page' => 'Boutique',
                'image1' => 'fonctionel.jpeg',
                'controller_name' => 'titre',
                'products' => $products,
                'categories' => $categories,       
    
            ]);
        }
    


}
