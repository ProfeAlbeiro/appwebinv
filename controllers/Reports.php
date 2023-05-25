<?php
    class Reports{
        public function __construct(){}
        # CU# - Generar reporte impreso de usuarios
        public function printedUserReport(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/03_reports/printed_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU# - Generar reporte gráfico de usuarios
        public function graphicUserReport(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/03_reports/graphic_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
    }
?>