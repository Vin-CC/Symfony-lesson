<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class EcommerceController extends AbstractController
{
    private $productList;

    public function __construct() {
        $product1 = new Product(1, "air-force", "Air Force One", 125, "Une paire de <strong>Nike noire</strong>", "");
        $product2 = new Product(2, "kayano", "Kayano-14", 140, "Une paire de Oasics", "");
        
        $this->productList = array(
            $product1->getSlug() => $product1,
            $product2->getSlug() => $product2
        );
    }

    #[Route('/homepage', name: 'homepage')]
    public function showHomepage(): Response {
        return $this->render("ecommerce/homepage.html.twig", [
            "productList" => $this->productList
        ]);
    }

    #[Route('/product/create', name: 'product-create')]
    public function productCreate(): Response {
        return $this->render("ecommerce/productCreate.html.twig");
    }

    #[Route('/product/{slug}', name: 'product-detail')]
    public function productDetail(string $slug): Response {
        return $this->render("ecommerce/productDetail.html.twig", [
            "product" => $this->productList[$slug]
        ]);
    }

    #[Route('/product/{slug}/update', name: 'product-update')]
    public function productUpdate(string $slug): Response {
        return $this->render("ecommerce/productUpdate.html.twig", [
            "product" => $this->productList[$slug]
        ]);
    }

    #[Route('/connexion', name: 'connexion')]
    public function connexion(): Response {
        return $this->render("ecommerce/connexion.html.twig", [
        ]);
    }

    #[Route('/admin', name: 'adminHomepage')]
    public function adminHomepage(): Response {
        return $this->render("ecommerce/adminHomepage.html.twig", [
            "productList" => $this->productList
        ]);
    }
}

?>