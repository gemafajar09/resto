<?php
require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act1']) && isset($_GET['ref1'])) {
        $act1 = $_GET['act1'];
        $ref1 = $_GET['ref1'];
             
        if ($act1 == "add") {
            if (isset($_GET['id_meja'])) {
                $id_meja = $_GET['id_meja'];
                if (isset($_SESSION['items1'][$id_meja])) {
                    $_SESSION['items1'][$id_meja] += 1;
                } else {
                    $_SESSION['items1'][$id_meja] = 1; 
                }
            }
        } 
			 header("location:".$ref1);
		 }
?>