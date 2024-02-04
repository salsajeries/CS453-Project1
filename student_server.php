<?php 
    
    $nameArr = array();

    session_start(); // Start or resume the session

    $nameArr = isset($_SESSION["nameArr"]) ? $_SESSION["nameArr"] : array();

    if (isset($_REQUEST["fname"])) {
        $mydata = $_REQUEST["fname"];
        array_push($nameArr, $mydata);
        $_SESSION["nameArr"] = $nameArr; // Store the updated array in the session
    }

    if (isset($_REQUEST["lastValue"])) {
        $lastValue = end($nameArr);
        echo $lastValue;
    }
  
?>