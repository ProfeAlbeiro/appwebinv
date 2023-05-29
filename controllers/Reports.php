<?php
    class Reports{
        public function __construct(){}        
        public function printedUserReport(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/03_reports/printed_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        public function graphicUserReport(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/03_reports/graphic_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
    }
?>