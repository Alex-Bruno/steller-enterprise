<?php

namespace App\Controller\Admin;

use App\Entity\Enterprise;
use App\Form\EnterpriseType;
use App\Repository\EnterpriseRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/enterprise")
 */
class EnterpriseController extends AbstractController
{
    /**
     * @Route("/", name="enterprise_index", methods={"GET"})
     */
    public function index(EnterpriseRepository $enterpriseRepository): Response
    {
        return $this->render('admin/enterprise/index.html.twig', [
            'enterprises' => $enterpriseRepository->findOneBy([]),
        ]);
    }

    /**
     * @Route("/new", name="enterprise_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $service): Response
    {
        $enterprise = new Enterprise();
        $form = $this->createForm(EnterpriseType::class, $enterprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enterprise);
            $entityManager->flush();

            return $this->redirectToRoute('enterprise_index');
        }

        return $this->render('admin/enterprise/new.html.twig', [
            'enterprise' => $enterprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="enterprise_show", methods={"GET"})
     */
    public function show(Enterprise $enterprise): Response
    {
        return $this->render('admin/enterprise/show.html.twig', [
            'enterprise' => $enterprise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="enterprise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Enterprise $enterprise): Response
    {
        $form = $this->createForm(EnterpriseType::class, $enterprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('enterprise_index');
        }

        return $this->render('admin/enterprise/edit.html.twig', [
            'enterprise' => $enterprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="enterprise_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Enterprise $enterprise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enterprise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($enterprise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('enterprise_index');
    }
}
