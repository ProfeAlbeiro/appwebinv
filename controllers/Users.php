<?php session_start();
    require_once "models/Employee.php";
    require_once "models/Customer.php";
    class Users{
        public function __construct(){
            if (empty($_SESSION['profile'])) {
                $_SESSION['profile'] = null;
                $_SESSION['session'] = null;
            }
        }
        public function main(){
            header("Location:?c=Dashboard");
        }
        public function createUser(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        require_once "views/roles/".$session."/header.view.php";
                        require_once "views/modules/01_users/create_user.view.php";
                        require_once "views/roles/".$session."/footer.view.php";
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $userCode = new User;
                        $userCode = $userCode->createUserCode();
                        $user = new User(
                            null,
                            $userCode,
                            $_POST['userName'],
                            $_POST['userLastName'],
                            $_POST['userEmail']
                        );
                        $user->createUser();
                        header("Location: ?c=Users&a=readUser");
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function createAdmin(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $userCode = new User();
                        require_once "views/roles/".$session."/header.view.php";
                        require_once "views/modules/01_users/create_admin.view.php";
                        require_once "views/roles/".$session."/footer.view.php";
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
                            $_POST["credentialPhoto"],
                            $_POST["credentialId"],
                            $_POST["credentialStartDate"],                    
                            $_POST["credentialPass"],
                            $_POST["credentialStatus"]                    
                        );
                        $admin = new Employee(
                            $userCode,
                            $_POST["employeeSalary"],
                        );
                        $user->createUser();                
                        $credential->createCredential();
                        $admin->createEmployee();
                        header("Location:?c=Users&a=readUser");
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function createSeller(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $userCode = new User();                
                        require_once "views/roles/admin/header.view.php";
                        require_once "views/modules/01_users/create_seller.view.php";
                        require_once "views/roles/admin/footer.view.php";
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
                            $_POST["credentialPhoto"],
                            $_POST["credentialId"],
                            $_POST["credentialStartDate"],                    
                            $_POST["credentialPass"],
                            $_POST["credentialStatus"]                    
                        );
                        $seller = new Employee(
                            $userCode,
                            $_POST["employeeSalary"],
                        );
                        $user->createUser();                
                        $credential->createCredential();
                        $seller->createEmployee();
                        header("Location:?c=Users&a=readUser");
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function createCustomer(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1 || $rol == 4) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $userCode = new User();
                        require_once "views/roles/".$session."/header.view.php";
                        require_once "views/modules/01_users/create_customer.view.php";
                        require_once "views/roles/".$session."/footer.view.php";
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
                            $_POST["credentialPhoto"],
                            $_POST["credentialId"],
                            $_POST["credentialStartDate"],                    
                            $_POST["credentialPass"],
                            $_POST["credentialStatus"]                    
                        );
                        $customer = new Customer(
                            $userCode,
                            $_POST["customerBirthDate"],
                        );
                        $user->createUser();                
                        $credential->createCredential();
                        $customer->createCustomer();
                        header("Location:?c=Users&a=readUser");
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }        
        public function readUser(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1 || $rol == 4) {
                    $users = new User;
                    $users = $users->readUser();
                    require_once "views/roles/" . $session . "/header.view.php";                    
                    require_once "views/modules/01_users/read_user.view.php";
                    require_once "views/roles/" . $session . "/footer.view.php";                    
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function readCustomer(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1 || $rol == 4) {
                    $customers = new Customer;
                    $customers = $customers->readCustomer();
                    require_once "views/roles/".$session."/header.view.php";
                    echo "<h1>En construcción</h1>";
                    require_once "views/roles/".$session."/footer.view.php";
                } else {
                    header("Location:?");
                }
            } else {
                header("Location:?");
            }
        }
        public function updateUser(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $user = new User;
                        $user = $user->getUserByCode($_GET['userCode']);
                        require_once "views/roles/admin/header.view.php";                
                        require_once "views/modules/01_users/update_user.view.php";
                        require_once "views/roles/admin/footer.view.php";
                    }
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                        $user = new User(
                            null,
                            $_POST['userCode'],
                            $_POST['userName'],
                            $_POST['userLastName'],
                            $_POST['userEmail']
                        );
                        $user->updateUser();
                        header('Location: ?c=Users&a=readUser');
                    }
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
        public function editProfile(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/edit_profile.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        public function deleteUser(){
            if (isset($_SESSION['profile']) && isset($_SESSION['session'])) {
                $profile = unserialize($_SESSION['profile']);
                $session = $_SESSION['session'];
                $rol = $profile->getRolCode();
                if ($rol == 1) {
                    $user = new User;
                    $user->deleteUser($_GET['userCode']);
                    header('Location: ?c=Users&a=readUser');
                } else {
                    header("Location:?c=Dashboard");
                }
            } else {
                header("Location:?c=Dashboard");
            }
        }
    }
?>