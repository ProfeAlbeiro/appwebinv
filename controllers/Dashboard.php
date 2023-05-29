<?php session_start();
    require_once "models/Employee.php";
    require_once "models/Customer.php";
    class Dashboard{        
        public function __construct(){
            if (empty($_SESSION['profile'])) {
                $_SESSION['profile'] = null;
                $_SESSION['session'] = null;
            }
        }
        public function main(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                require_once "views/roles/".$session."/header.view.php";
                require_once "views/roles/".$session."/".$session.".view.php";
                require_once "views/roles/".$session."/footer.view.php";
            } else {
                header("Location:?");
            }
        }
    }
?>