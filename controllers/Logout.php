<?php
    class Logout{
        public function __construct(){}        
        # CU03 - Cerrar Sesión
        public function main(){
            header("Location:?c=Landing");
        }
    }
?>