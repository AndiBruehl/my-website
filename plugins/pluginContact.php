<?php

class pluginContact
{
    private $senderName;
    private $senderCompany;
    private $senderEmail;
    private $senderPhone;
    private $message;

    public function setSenderName($name)
    {
        $this->senderName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    }

    public function setSenderCompany($company)
    {
        $this->senderCompany = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');
    }

    public function setSenderEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->senderEmail = $email;
        } else {
            throw new Exception("Invalid email address");
        }
    }

    public function setSenderPhone($phone)
    {
        $this->senderPhone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
    }

    public function setMessage($message)
    {
        $this->message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    }

    public function beforeAll()
    {

        if (!$this->senderName || !$this->senderEmail || !$this->message) {
            throw new Exception("Required fields are missing.");
        }


        $this->sendToCRM();
    }

    private function sendToCRM()
    {

        return true;
    }

    public function frontendMessage()
    {
        return '<p class="success-message">Message successfully sent!</p>';
    }
}
