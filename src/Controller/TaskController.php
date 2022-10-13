<?php
namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Code\Type\SubmitType;
use Symfony\Component\Form\Extension\Code\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symofony\Component\HttpFoundation\Response;

class TaskController extends AbstractController
{
    public function new(Request $request): Response
    {
        $task = new Task();
        $task->setTask("Write a blog post");
        $task->setDueTime(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('task', DateType::class)
            ->add('task', SubmitType::class, ['label' => 'Create task'])
            ->getForm();
    }
}