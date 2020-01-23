<?php
require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['id_masakan'])) {
                $id_masakan = $_GET['id_masakan'];
                if (isset($_SESSION['items'][$id_masakan])) {
                    $_SESSION['items'][$id_masakan] += 1;
                } else {
                    $_SESSION['items'][$id_masakan] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['id_masakan'])) {
                $id_masakan = $_GET['id_masakan'];
                if (isset($_SESSION['items'][$id_masakan])) {
                    $_SESSION['items'][$id_masakan] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['id_masakan'])) {
                $id_masakan = $_GET['id_masakan'];
                if (isset($_SESSION['items'][$id_masakan])) {
                    $_SESSION['items'][$id_masakan] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['id_masakan'])) {
                $id_masakan = $_GET['id_masakan'];
                if (isset($_SESSION['items'][$id_masakan])) {
                    unset($_SESSION['items'][$id_masakan]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         if ($_GET['id_kategori'] == ""){
			 header("location:".$ref);
		 }else{
        header ("location:" . $ref. "&id_kategori=".$_GET['id_kategori']);
    }
	}
?>