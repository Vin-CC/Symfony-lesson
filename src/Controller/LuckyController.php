<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController {

    #[Route('/lucky', name: 'app_lucky_number')]
    public function number(): Response {
        $number = random_int(0, 100);

        $url = $this->generateUrl('app_lucky_number');

        return $this->render('lucky/number.html.twig',
            ['number' => $number, 'name'  => 'app_lucky_number']);
    }

    #[Route('/lucky/number/{max}', name: 'app_lucky_number_max')]
    public function numberWithMax(int $max): Response {
        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig',
            ['number' => $number, 'name'  => 'app_lucky_number']);
    }
}
