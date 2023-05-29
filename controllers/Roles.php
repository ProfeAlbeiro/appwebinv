<?php session_start();    
    require_once "models/Employee.php";
    require_once "models/Customer.php";
    class Roles{
        public function __construct(){
            if (empty($_SESSION['profile'])) {
                $_SESSION['profile'] = null;
                $_SESSION['session'] = null;
            }
        }
        public function main(){
            header("Location:?c=Dashboard");
        }
        public function createRol(){
             if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        require_once "views/roles/".$session."/header.view.php";
                        require_once "views/modules/01_users/create_rol.view.php";
                        require_once "views/roles/".$session."/footer.view.php";
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $rolObj = new User(null, $_POST['rolName']);
                        $rolObj->createRol();
                        header("Location: ?c=Roles&a=readRol");
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function readRol(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    $roles = new User;
                    $roles = $roles->readRol();
                    require_once "views/roles/" . $session . "/header.view.php";
                    require_once "views/modules/01_users/read_rol.view.php";
                    require_once "views/roles/" . $session . "/footer.view.php";
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function updateRol(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $rol = new User;
                        $rol = $rol->getRolByCode($_GET['rolCode']);
                        require_once "views/roles/admin/header.view.php";
                        require_once "views/modules/01_users/update_rol.view.php";
                        require_once "views/roles/admin/footer.view.php";
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $rol = new User(
                            $_POST['rolCode'],
                            $_POST['rolName']
                        );
                        $rol->updateRol();
                        header('Location: ?c=Roles&a=readRol');
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function deleteRol(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    $rol = new User;
                    $rol->deleteRol($_GET['rolCode']);
                    header('Location: ?c=Roles&a=readRol');
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
    }
?>