<?php
    require '../vendor/autoload.php';
    use Firebase\JWT\JWT;
?>
<?php
    class Login extends Dbh{

        protected function getUser($uid, $pwd){
            $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ?";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute([$uid, $uid])) {
                $stmt = null;
                header("location: /membersystem/index.php?error=stmtfailed");
                exit();
            }
            
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: /membersystem/index.php?error=usernotfound");
                exit();
            }

            $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

            if($checkPwd == false){
                $stmt = null;
                header("location: /membersystem/index.php?error=wrongpassword");
                exit();
            }
            elseif($checkPwd == true) {
                $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ? AND `pwd` = ?;";
                $stmt = $this->connect()->prepare($sql);
                if(!$stmt->execute([$uid, $uid, $pwdHashed[0]["pwd"]])){
                    $stmt = null;
                    header("location: /membersystem/index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: /membersystem/index.php?error=usernotfound");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION["userid"] = $user[0]["id"];
                $_SESSION["useruid"] = $user[0]["uid"];
                $key = 'Nn8XDFLBAEbapZF5TLGsAuLhzqJsAx5qQfHY6KcAfvDHZJrQ5MZzHrBrg4kjDUAspL7NA4sDrRTvi8xTM3hShftbH9uF93WoXSt6KakWsCAqj2Api8fAJqm2R9Ak3nir';
                $token = JWT::encode(
                    array(
                        'iat'   => time(),
                        'nbf'   => time(),
                        'exp'   => time() + 3600,
                        'data'  => array(
                                        'user_id'   => $user[0]["id"],
                                        'user_name' => $user[0]["uid"]
                                        )
                        ),
                        $key,
                        'HS256'
                );

                setcookie("token", $token, time() + 3600, "/", "", true, true);
            }

            $stmt = null;

        }

        
    }

?>