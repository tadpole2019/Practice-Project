<?php

use PHPMailer\PHPMailer;

class Mail extends PHPMailer\PHPMailer {
    public $Host = 'smtp.gmail.com';
    public $Mailer = 'smtp';
    public $SMTPAuth = true;
    public $Username = '';
    public $Password = '';
    public $SMTPSecure = 'tls';
    public $WordWrap = 75;

    public function __construct($Username, $Password) {
        $this->Username = $Username;
        $this->Password = $Password;
    }

    public function sendemail(){
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "postmanjhan@gmail.com";
        $mail->Password = "byvm klzo ucus aizx";

        $mail->setFrom($email, $name);
        $mail->addAddress($email);

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
    }

    public function subject($subject) {
        $this->Subject = $subject;
    }

    public function body($body) {
        $this->Body = $body;
    }

    public function send() {
        $this->AltBody = strip_tags(stripcslashes($this->Body))."\n\n";
        $this->AltBody = str_replace(" ", "\n\n", $this->AltBody);
        return parent::send();
    }
}