<?php


namespace App\Controller;


use App\Entity\ContactSupport;
use App\Form\ContactSupportType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        $entity = new ContactSupport();
        $form = $this->createForm(ContactSupportType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            try {
                $enterprise = $this->get('session')->get('enterprise');

                $isSend = true;
                $email = new Email();
                $email
                    ->from('contact@steller.com')
                    ->to($enterprise->getEmail())
                    ->subject('E-mail contact in steller')
                    ->html(
                        $this->renderView(
                            'email/contact.html.twig',
                            [
                                'enterprise' => $enterprise,
                                'entity' => $entity
                            ]
                        ),
                        'text/html'
                    );

                $mailer->send($email);
            } catch (\Exception $e) {
                $isSend = false;
            }
            return $this->render('contact/index.html.twig', [
                'controller_name' => 'ContactController',
                'form' => $form->createView(),
                'isSend' => $isSend
            ]);

        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }
}