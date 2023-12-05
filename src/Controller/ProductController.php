<?php

declare(strict_types=1);

namespace App\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends ResourceController
{
    #[Route('/{_locale}/produit/{productId}', name: 'app_produit')]
    public function showVariantsAction(Request $request, int $productId): Response
    {
        // Utilisez le service sylius.repository.product_variant pour récupérer les variantes du produit
        $variantRepository = $this->get('sylius.repository.product_variant');
        $variants = $variantRepository->findBy(['product' => $productId]);

        // Ajoutez ici toute autre logique nécessaire pour préparer les données à afficher

        // Retournez la réponse
        return $this->render('product.html.twig', [
            'variants' => $variants,
        ]);
    }
}

