<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class EmailFormController extends BaseController {

    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        return view('EmailFormController');
    }
    public function sendEmailsByButton() {
        $email_addresses = explode(',', $this->request->getPost('email_addresses'));
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        foreach ($email_addresses as $email) {
            $this->sendEmail($email, $subject, $message);
        }

        echo 'Les e-mails ont été envoyés avec succès.';
    }

    private function sendEmail($to, $subject, $message) {
        $email = \Config\Services::email();

        $SMTPUser = config('Email')->SMTPUser;

        $email->setFrom($SMTPUser);
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);
        

        if ($email->send()){
            echo 'Mail envoyer a  ' . $to;
        } else {
            echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $email->printDebugger();
        }
    }
}
?>
