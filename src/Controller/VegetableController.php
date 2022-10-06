<?php

namespace App\Controller;

use App\Entity\Vegetable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\VegetableRepository;

class VegetableController extends AbstractController
{
    #[Route('/vegetable', name: 'app_vegetable')]
    public function index(ManagerRegistry $doctrine, ValidatorInterface $validator): Response
    {
        $entityManager = $doctrine->getManager();

        $vegetable = new Vegetable();
        $vegetable->setName("Tomate");
        $vegetable->setPrice("10");
        $vegetable->setDescription("Des petites tomates pour l'apéro");

        $entityManager->persist($vegetable);

        $entityManager->flush();

        $errors = $validator->validate($vegetable);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return new Response('Saved new vegetable with id: ' . $vegetable->getId());
        // return $this->render('vegetable/index.html.twig', [
        //     'controller_name' => 'VegetableController',
        // ]);
    }

    #[Route('/vegetable/all', name: 'vegetable_all')]
    public function showAll(VegetableRepository $vegetableRepository): Response
    {
        $all = $vegetableRepository->findAll();

        $output = array_map(function ($object) { return $object->getName(); }, $all);
        return new Response('All vegetables: '. implode(", ", $output));
    }

    #[Route('/vegetable/{id}', name: 'vegetable_show')]  
    // public function show(ManagerRegistry $doctrine, int $id): Response
    public function show(int $id, VegetableRepository $vegetableRepository): Response
    {
        //$vegetable = $doctrine->getRepository(Vegetable::class)->find($id);
        $vegetable = $vegetableRepository->find($id);

        if(!$vegetable) {
            throw $this->createNotFoundException(
                'No vegetable found for id ' . $id
            );
        }

        return new Response('Check out this great vegetable ' . $vegetable->getName());
    }
}
