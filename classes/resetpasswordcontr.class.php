<?php
        require '../vendor/autoload.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
?>

<?php
    class ResetPasswordContr extends ResetPassword{

        private $email;
        private $password;
        private $pwdRepeat;


        public function __construct($email, $password, $pwdRepeat) {
            $this->email = $email;
            $this->password = $password;
            $this->pwdRepeat = $pwdRepeat;
        }

        public function sendEmail(){
            if($this->emptyInput() == false) {
                header("location: /membersystem/change_password.php?error=emptyinput");
                exit();
            }

            if($this->invalidEmail() == false) {
                header("location: /membersystem/change_password.php?error=invalidemail");
                exit();
            }

            if($this->emailExists() == false) {
                header("location: /membersystem/change_password.php?error=unknownemail");
                exit();
            }

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = 'http://localhost/membersystem/create-new-password.php?selector='.$selector.'&validator='.bin2hex($token);
            $expires = date('U') + 1800;

            if(!$this->deleteEmail($this->email)){
                die("ERROR!");
            }

            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

            if(!$this->isertToken($this->email, $selector, $hashedToken, $expires)){
                die("ERROR!");
            }

            $name = "Change Password";
            $subject = "Reset your password";
            $message = "We received a password reset request.";
            $message .= "Here is your password reset link: ";
            $message .= $url;


            $mail = new PHPMailer(true);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = "postmanjhan@gmail.com";
            $mail->Password = "byvm klzo ucus aizx";

            $mail->setFrom($this->email, $name);
            $mail->addAddress($this->email);

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
        }

        public function resetPassword($selector, $validator){
            $url = "location: /membersystem/create-new-password.php?selector=".$selector."&validator=".$validator;
            if($this->emptyPwd() == false) {
                header($url."&error=emptypassword");
                exit();
            }

            if($this->pwdMatch() == false) {
                header($url."&error=passwordnotmatch");
                exit();
            }

            $currentDate = date('U');

            if(!$row = $this->findToken($selector, $currentDate)) {
                echo "連結已逾時，請重新寄電子郵件";

                header("Refresh:1; url= /membersystem/change_password.php", true, 303);
                exit();
            }
            $pwdResetToken = $row['pwd_reset_token'];
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $pwdResetToken);

            if(!$tokenCheck){
                echo "請重新送出更改帳密請求!";
                echo $pwdResetToken;
                header("Refresh:1; url= /membersystem/change_password.php", true, 303);
                exit();
            }

            $this->updatePassword($this->password, $row['pwd_reset_email']);
            
            header("Refresh:1; url= /membersystem/index.php", true, 303);
            echo "更改帳密成功!";

        }

        private function emptyPwd() {
            $result;
            if(empty($this->pwdRepeat) || empty($this->password)){
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function pwdMatch() {
            $result;
            if ($this->password !== $this->pwdRepeat) {
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function emptyInput() {
            $result;
            if(empty($this->email)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function emailExists(){
            $result;
            if(!$this->checkUser($this->email, $this->email)){
                $result = true;
            }
            else {
                $result = false;
            }
            return $result;
        }
    }

?>