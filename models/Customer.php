<?php
    require_once "models/Credential.php";    
    class Customer extends Credential{
        private $dbh;
        private $customerCode;
        private $customerBirthDate;
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
        public function __construct2($customerCode,$customerBirthDate){            
            $this->customerCode = $customerCode;
            $this->customerBirthDate = $customerBirthDate;
        }        
        public function setCustomerCode($customerCode){
            $this->customerCode = $customerCode;
        }
        public function getCustomerCode(){
            return $this->customerCode;
        }
        public function setCustomerBirthDate($customerBirthDate){
            $this->customerBirthDate = $customerBirthDate;
        }
        public function getCustomerBirthDate(){
            return $this->customerBirthDate;
        }

/*  ---------------------------------------------------------------------------  */
/*  -------------------------- CASOS DE USO EMPLEADO --------------------------  */
/*  ---------------------------------------------------------------------------  */
        
        # CU014 - Crear Cliente o Registrarse (cliente)
        public function createCustomer(){
            try {
                $sql = "INSERT INTO CUSTOMERS VALUES (
                    :customerCode,
                    :customerBirthDate
                )";                
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('customerCode', $this->getCustomerCode());                
                $stmt->bindValue('customerBirthDate', $this->getCustomerBirthDate());
                $stmt->execute();                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU016 - Consultar Clientes
        public function readCustomer(){}
        # CU020 - Obtener código del cliente
        public function getCustomerByCode(){}
        # CU021 - Actualizar cliente
        public function updateCustomer(){}
        # CU025 - Editar perfil del cliente
        public function editProfileCustomer(){}
        # CU# - Generar reporte impreso de clientes
        public function printedEmployeeReport(){}
        # CU# - Generar reporte gráfico de clientes
        public function graphicEmployeeReport(){}
    }
?>