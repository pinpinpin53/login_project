<?php
session_start();

//check for appropriate access level. grant access or rediret to fail
function check_level ($level) { 
    if ($_SESSION['access_level']  == $level) {
        echo "You Win!";
    }
    else {
        header ('location: ../fail.html');
    }
}

//function check_level() {
//    if ($_SESSION['access_level'] == 1) {
//	    header("location: ../1.html");
//	} else if ($_SESSION['access_level'] == 2){
//	    header("location: ../2.html");
//	} else {
//    header("location: http://localhost/~coltontrautz/Login System/fail.html");
//	}
//}