<?php
namespace App\Controller;

use App\Form\Type\TaskType;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Code\Type\SubmitType;
use Symfony\Component\Form\Extension\Code\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task/new', name: 'task_new')]
    public function new(Request $request): Response
    {
        $task = new Task();
        $task->setTask("Write a blog post");
        $task->setDueTime(new \DateTime('tomorrow'));

        // $form = $this->createFormBuilder($task)
        //     ->add('task', TextType::class)
        //     ->add('task', DateType::class)
        //     ->add('task', SubmitType::class, ['label' => 'Create task'])
        //     ->getForm();
        $form = $this->createForm(TaskType::class, $task);

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}