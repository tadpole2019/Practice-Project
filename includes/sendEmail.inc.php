<?php
    require '../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
?>
<?php
    if (isset($_POST["submit"])){
        $email = $_POST["email"];
        $name = "change password";
        $subject = "click link below to change password";
        $body = "你好大大";
        
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

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

        header("Refresh:1; url= /membersystem/send_success.php", true, 303);
    }
?>