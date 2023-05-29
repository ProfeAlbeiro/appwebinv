<?php
    require_once "models/User.php";
    class Credential extends User{
        private $dbh;
        protected $credentialCode;
        protected $credentialPhoto;
        protected $credentialId;
        protected $credentialStartDate;
        protected $credentialPass;
        protected $credentialStatus = false;
        public function __construct(){            
            try {                
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        
        public function __construct2($userEmail,$credentialPass){
            $this->userEmail = $userEmail;
            $this->credentialPass = $credentialPass;            
        }
        public function __construct5($credentialPhoto,$credentialId,$credentialStartDate,$credentialPass,$credentialStatus){            
            $this->credentialPhoto = $credentialPhoto;
            $this->credentialId = $credentialId;
            $this->credentialStartDate = $credentialStartDate;
            $this->credentialPass = $credentialPass;
            $this->credentialStatus = $credentialStatus;            
        }
        public function __construct6($credentialCode,$credentialPhoto,$credentialId,$credentialStartDate,$credentialPass,$credentialStatus){            
            $this->credentialCode = $credentialCode;
            $this->credentialPhoto = $credentialPhoto;
            $this->credentialId = $credentialId;
            $this->credentialStartDate = $credentialStartDate;
            $this->credentialPass = $credentialPass;
            $this->credentialStatus = $credentialStatus;            
        }
        public function __construct10($rolCode,$userCode,$userName,$userLastName,$userEmail,$credentialPhoto,$credentialId,$credentialStartDate,$credentialPass,$credentialStatus){
            unset($this->dbh);
            $this->rolCode = $rolCode;            
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;            
            $this->credentialPhoto = $credentialPhoto;
            $this->credentialId = $credentialId;
            $this->credentialStartDate = $credentialStartDate;
            $this->credentialPass = $credentialPass;
            $this->credentialStatus = $credentialStatus;            
        }
        # Código de Credencial
        public function setCredentialCode($credentialCode){
            $this->credentialCode = $credentialCode;
        }
        public function getCredentialCode(){
            return $this->credentialCode;
        }               
        # Foto de Credencial
        public function setCredentialPhoto($credentialPhoto){
            $this->credentialPhoto = $credentialPhoto;
        }
        public function getCredentialPhoto(){
            return $this->credentialPhoto;
        }               
        # Identificación de la Credencial
        public function setCredentialId($credentialId){
            $this->credentialId = $credentialId;
        }
        public function getCredentialId(){
            return $this->credentialId;
        }               
        # Fecha de Ingreso de la Credencial
        public function setCredentialStartDate($credentialStartDate){
            $this->credentialStartDate = $credentialStartDate;
        }
        public function getCredentialStartDate(){
            return $this->credentialStartDate;
        }               
        # Contraseña de la Credencial
        public function setCredentialPass($credentialPass){
            $this->credentialPass = $credentialPass;
        }
        public function getCredentialPass(){
            return $this->credentialPass;
        }               
        # Estado de la Credencial
        public function setCredentialStatus($credentialStatus){
            $this->credentialStatus = $credentialStatus;
        }
        public function getCredentialStatus(){
            return $this->credentialStatus;
        }
        
/*  ---------------------------------------------------------------------------  */
/*  ------------------------- CASOS DE USO CREDENCIAL -------------------------  */
/*  ---------------------------------------------------------------------------  */

        # CU012 - Crear Credencial
        public function createCredential(){
            try {
                $sql = "INSERT INTO CREDENTIALS VALUES (
                    :credentialCode,
                    :credentialPhoto,
                    :credentialId,
                    :credentialStartDate,
                    :credentialPass,
                    :credentialStatus
                )";                
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('credentialCode', $this->getCredentialCode());
                $stmt->bindValue('credentialPhoto', $this->getCredentialPhoto()); 
                $stmt->bindValue('credentialId', $this->getCredentialId());                
                $stmt->bindValue('credentialStartDate', $this->getCredentialStartDate());                
                $stmt->bindValue('credentialPass', sha1($this->getCredentialPass()));
                $stmt->bindValue('credentialStatus', (bool)$this->getCredentialStatus());
                $stmt->execute();                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }       
        # CU01 - Iniciar Sesión
        public function login(){
            $sql = 'SELECT * FROM USERS                     
                    INNER JOIN CREDENTIALS 
                    ON users.user_code = credentials.credential_code
                    WHERE user_email = :userEmail AND credential_pass = :credentialPass';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('userEmail', $this->getUserEmail());
            $stmt->bindValue('credentialPass', sha1($this->getCredentialPass()));
            $stmt->execute();
            $credentialDb = $stmt->fetch();
            if ($credentialDb) {
                $credential = new Credential(
                    $credentialDb['rol_code'],
                    $credentialDb['user_code'],
                    $credentialDb['user_name'],
                    $credentialDb['user_lastname'],
                    $credentialDb['user_email'],
                    $credentialDb['credential_photo'],
                    $credentialDb['credential_id'],
                    $credentialDb['credential_startdate'],
                    $credentialDb['credential_pass'],
                    $credentialDb['credential_status']
                );
                return $credential;
            } else {
                return false;
            }
        }
        # CU02 - Recuperar Contraseña
        public function forgotLogin(){}
        # CU03 - Cerrar Sesión
        public function logout(){}        
    }
?>