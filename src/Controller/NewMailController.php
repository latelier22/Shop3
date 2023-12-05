<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class NewMailController extends AbstractController
{
    #[Route('/{_locale}/new/mailing', name: 'app_new_mail')]
    public function send(): Response
    {
        return $this->render('new_mail/index.html.twig', [
            'controller_name' => 'NewMailController',
        ]);
    }

    #[Route('/{_locale}/new/send', name: 'app_new_send')]
    public function newsend(MailerInterface $mailer)
    {
        // Créer un objet Email
        $email = (new Email())
            ->from('no-reply@latelier22.fr')
            ->to('lecorre@yahoo.com')
            ->subject('Subject of the email')
            ->text('This is the text version of the email.')  // Ajouter le contenu textuel
            ->html('<p>This is the HTML version of the email.</p>');  // Ajouter le contenu HTML

        //… Ajouter d'autres informations à l'e-mail si nécessaire

        // Envoyer l'e-mail
        $mailer->send($email);

        // …
        return new Response(
            'Email was sent'
        );
    }
}
