<?php session_start(); 
    require_once "models/Employee.php";
    require_once "models/Customer.php";
    class Login{        
        public function __construct(){
            if (!empty($_SESSION['profile'])) {
                header("Location:?c=Dashboard");
            }
        }        
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                require_once "views/company/header.view.php";            
                require_once "views/company/login.view.php";            
                require_once "views/company/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $credential = new Credential(
                    $_POST['userEmail'],
                    $_POST['credentialPass']
                );
                $profile = $credential->login();
                if ($profile) {
                    $status = $profile->getCredentialStatus();                    
                    $rol = $profile->getRolCode();
                    if ($status == 1) {
                        if ($rol == 1) {
                            $_SESSION['session'] = "admin";
                        } elseif ($rol == 3) {
                            $_SESSION['session'] = "customer";
                        } elseif ($rol == 4) {
                            $_SESSION['session'] = "seller";
                        }
                        $profile = serialize($profile);
                        $_SESSION['profile'] = $profile;
                        header("Location: ?c=Dashboard");
                    } else {                        
                        header("Location:?");
                    }
                } else {                    
                    header("Location:?");
                }
            }
        }
        public function forgotLogin(){
            require_once "views/company/header.view.php";            
            require_once "views/company/forgot.view.php";            
            require_once "views/company/footer.view.php";
        }
    }
?>