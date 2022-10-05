<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\User;

class BrandNewController extends AbstractController
{
    // l'ajout d'un paramètre dans la fonction permet
    // l'injection de dépendance
    #[Route('/brand/new', name: 'app_brand_new')]
    public function index(
        Request $request,
        SessionInterface $session //
    ): Response
    {
        $oldText = $session->get('oldTextInSession'); //
        $textFromQuery = $request->query->get('text');
        $session->set('oldTextInSession', $textFromQuery); //
        
        if($oldText) {
            $this->addFlash(
                'notice',
                'Nous avons pu récupérer la valeur
                    de oldTextInSession');
            $this->addFlash(
                'notice',
                'deuxieme message');
        }

        return $this->render('brand_new/index.html.twig', [
            'textToShow' => $textFromQuery,
            'oldText' => $oldText //
        ]);
    }

    #[Route('/brand', name: 'app_brand')]
    function brand (): JsonResponse
    {

        return $this->json([
            'brand' => 'Nike',
            'customer' => ['Jean', 'Paul'],
            "user" => $john
        ]);
    }

    #[Route('/user', name: 'app_user')]
    function user(): Response
    {
        $john = new User("John", "Doe");

        return $this->render('brand_new/user.html.twig', [
            'user' => $john
        ]);
    }

    #[Route('/products', name: 'app_user')]
    function showProducts(): Response {
        return $this->render('products/index.html.twig');
    }

    public function recentProducts(int $max = 3): Response {
        $products = ['Une paie de Nike', 'une smartwatch', 'une casquette Jordan'];

        return $this->render('component/products/list.html.twig',[
            'products' => $products
        ]);
    }
}
