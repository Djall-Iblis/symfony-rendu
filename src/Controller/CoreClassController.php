<?php

namespace App\Controller;

use App\Entity\CoreClass;
use App\Form\CoreClassType;
use App\Repository\CoreClassRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/core/class')]
class CoreClassController extends AbstractController
{
    #[Route('/', name: 'app_core_class_index', methods: ['GET'])]
    public function index(CoreClassRepository $coreClassRepository): Response
    {
        return $this->render('core_class/index.html.twig', [
            'core_classes' => $coreClassRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_core_class_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CoreClassRepository $coreClassRepository): Response
    {
        $coreClass = new CoreClass();
        $form = $this->createForm(CoreClassType::class, $coreClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coreClassRepository->add($coreClass);
            return $this->redirectToRoute('app_core_class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('core_class/new.html.twig', [
            'core_class' => $coreClass,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_core_class_show', methods: ['GET'])]
    public function show(CoreClass $coreClass): Response
    {
        return $this->render('core_class/show.html.twig', [
            'core_class' => $coreClass,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_core_class_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CoreClass $coreClass, CoreClassRepository $coreClassRepository): Response
    {
        $form = $this->createForm(CoreClassType::class, $coreClass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coreClassRepository->add($coreClass);
            return $this->redirectToRoute('app_core_class_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('core_class/edit.html.twig', [
            'core_class' => $coreClass,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_core_class_delete', methods: ['POST'])]
    public function delete(Request $request, CoreClass $coreClass, CoreClassRepository $coreClassRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coreClass->getId(), $request->request->get('_token'))) {
            $coreClassRepository->remove($coreClass);
        }

        return $this->redirectToRoute('app_core_class_index', [], Response::HTTP_SEE_OTHER);
    }
}
