<?php

namespace services\contact;


use frontend\models\ContactForm;
use SebastianBergmann\Timer\RuntimeException;
use yii\mail\MailerInterface;

class ContactService
{
    //можем передовать разный mailer
    private $adminEmail;
    private $mailer;

    public function __construct($adminEmail,MailerInterface $mailer)
    {
        $this->adminEmail = $adminEmail;
        $this->mailer = $mailer;
    }

    public function send(ContactForm $form) : void
    {
        $send = $this->mailer->compose()
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$send){
            throw new \RuntimeException('Sending error!');
        }
    }
}