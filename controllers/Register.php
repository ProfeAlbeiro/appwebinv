<?php    
    require_once "models/Credential.php";    
    require_once "models/Customer.php";    
    class Register{
        public function __construct(){}
        public function main(){
            header("Location:?");
        }
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {                
                require_once "views/company/header.view.php";            
                require_once "views/company/register.view.php";            
                require_once "views/company/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userCode = new User;
                $userCode = $userCode->createUserCode();
                $user = new User(
                    null,
                    $userCode,
                    $_POST["userName"],
                    $_POST["userLastName"],
                    $_POST["userEmail"]
                );
                $credential = new Credential(
                    $userCode,
                    "",
                    null,
                    date('Y-m-d'),
                    $_POST["credentialPass"],
                    false
                );
                $customer = new Customer(
                    $userCode,
                    null,
                );
                $user->createUser();                
                $credential->createCredential();
                $customer->createCustomer();                
                header("Location:?c=Register&a=register");
            }
        }
    }
?>