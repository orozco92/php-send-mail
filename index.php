<?php

use Dotenv\Dotenv;
use App\Mailer;
use \samejack\PHP\ArgvParser;

$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv->load();
$loader = require __DIR__ . '/vendor/autoload.php';
$argvParser = new ArgvParser();
$mailer = new Mailer();
// $mailer->sendTestEmail('orozco92@nauta.cu', 'This is a test email');
// $mailer->createTestEmailFile('orozco92@nauta.cu', 'first email');
// $mailer->createTestEmailFile('orozco92@nauta.cu', 'second email');
// $mailer->sendQueuedEmails();
print_r($argvParser->parseConfigs());
print_r(getenv('EMAIL_HOST'));
print_r(getenv('EMAIL_USER'));
print_r(getenv('EMAIL_PASSOWRD'));
print_r($_ENV);