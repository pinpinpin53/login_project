<?php
/*
 * Authenticate username and password. Start session
 *
 * @author Steve Layman <slayman@sendpepper.com>
 *
 * @param str $username
 * @param str $password
 */

//is this a good way of restarting the session when someone logs in? Not sure if there's a better way to do this
session_destroy();
session_start();

include restriction.php;
 
//query db for row matching username and password
function authenticate ($username,$password) {
    
    $dbc=mysqli_connect('localhost','steve','password1','web_users')or die("Error connecting to MySQL server." . mysqli_connect_error());
    
    $query="SELECT * FROM users WHERE username='$username' and password='$password'";
    $result=mysqli_query($dbc, $query)or die("Error querying database");
    $row=mysqli_fetch_assoc($result);
    
    $_SESSION['access_level']=$row["access_level"];
    
    //keep count of matching records
    $count=mysqli_num_rows($result);
    
    return $count==1;
}

//if unique user is located, start session
//problem is this runs regardless of whether or not a unique user is found. If I just type gibberish in the login page, $_SESSION['logged_in'] still gets set to yes
function start ($username,$password) {
    if (authenticate($username,$password)) {
        $_SESSION['logged_in']=yes;
        
        header("location: 1.php");
        }
    
    else {
        echo "Wrong Username or Password.<br>";
    }
}