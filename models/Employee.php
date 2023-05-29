<?php
    require_once "models/Credential.php";
    class Employee extends Credential{
        private $dbh;        
        private $employeeCode;
        private $employeeSalary;
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
        public function __construct2($employeeCode,$employeeSalary){            
            $this->employeeCode = $employeeCode;
            $this->employeeSalary = $employeeSalary;
        }        
        public function setEmployeeCode($employeeCode){
            $this->employeeCode = $employeeCode;
        }
        public function getEmployeeCode(){
            return $this->employeeCode;
        }        
        public function setEmployeeSalary($employeeSalary){
            $this->employeeSalary = $employeeSalary;
        }
        public function getEmployeeSalary(){
            return $this->employeeSalary;
        }        

/*  ---------------------------------------------------------------------------  */
/*  -------------------------- CASOS DE USO EMPLEADO --------------------------  */
/*  ---------------------------------------------------------------------------  */

        # CU013 - Crear Empleado (Vendedor o Administrador)
        public function createEmployee(){
            try {
                $sql = "INSERT INTO EMPLOYEES VALUES (
                    :employeeCode,
                    :employeeSalary
                )";                
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('employeeCode', $this->getEmployeeCode());                
                $stmt->bindValue('employeeSalary', $this->getEmployeeSalary());
                $stmt->execute();                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU17 - Consultar empleados
        public function readEmployee(){}
        # CU22 - Obtener código del empleado
        public function getEmployeeByCode(){}
        # CU23 - Actualizar empleado
        public function updateEmployee(){}
        # CU24 - Editar perfil del empleado
        public function editProfileEmployee(){}
        # CU# - Generar reporte impreso de empleados
        public function printedEmployeeReport(){}
        # CU# - Generar reporte gráfico de empleados
        public function graphicEmployeeReport(){}
    }
?>