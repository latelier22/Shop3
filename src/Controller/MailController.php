<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * MailController
 */
class MailController extends AbstractController
{

    /**
     * Send
     *
     * @return Response
     * 
     */
    #[Route('/{_locale}/mail/', name: 'app_mail')]
    public function mail(): Response
    {

        return new Response('
        <h1> Welcome to the Mail page! </h1>
        <a href="/fr_FR/mail/send"> Send Mail </a>
        <a href="/"> Retour </a>');
    }


    #[Route('/{_locale}/mail/send', name: 'app_mail_send')]
    public function send(MailerInterface $mailer)
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

    #[Route('/{_locale}/mail/sendtemp', name: 'app_mail_sendtemp')]
    public function sendtemp(MailerInterface $mailer)
    {
        // Créer un objet Email
        $email = (new TemplatedEmail())
            ->from('no-reply@latelier22.fr')
            ->to('lecorre@yahoo.com')
            ->subject('Subject of the email')
            ->htmlTemplate('emails/mail.html')
            ->context([
                'nom' => 'LE CORRE',
                'prenom' => 'Cyrille',

            ]);

        //… Ajouter d'autres informations à l'e-mail si nécessaire

        // Envoyer l'e-mail
        $mailer->send($email);

        // …
        return new Response(
            'Email was sent'
        );
    }




}
