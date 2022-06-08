<?php

namespace App;

use Swift_FileSpool;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;


class Mailer
{

    /**
     * @var Swift_SmtpTransport
     */
    private $transport;

    /**
     * @var Swift_Mailer
     */
    private $mailer;

    /**
     * @var Swift_FileSpool
     */
    private $spool;

    function __construct()
    {
        
        $this->transport = (new Swift_SmtpTransport('smtp.nauta.cu', 25))
        ->setUsername('orozco92@nauta.cu')
        ->setPassword('kj8xbNxi');
        
        $this->spool = new Swift_FileSpool('./emails');
        $this->mailer = new Swift_Mailer($this->transport);
    }

    public function sendTestEmail($to, $subject, $body = 'This is a test email')
    {
        $message = (new Swift_Message())
            ->setSubject($subject)
            ->setFrom(['orozco92@nauta.cu' => 'NOREPLY'])
            ->setTo($to)
            ->setBody($body);

        try {
            $result = $this->mailer->send($message);
            var_dump($result);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }

    public function createTestEmailFile($to, $subject, $body = 'This is a test email')
    {
        $message = (new Swift_Message())
            ->setSubject($subject)
            ->setFrom(['orozco92@nauta.cu' => 'NOREPLY'])
            ->setTo($to)
            ->setBody($body);

        try {
            $result = $this->spool->queueMessage($message);
            var_dump($result);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }

    public function sendQueuedEmails()
    {
        try {
            $result = $this->spool->flushQueue($this->transport);
            var_dump($result);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }
}
