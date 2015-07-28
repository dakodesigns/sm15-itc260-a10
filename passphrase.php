<?php
//passphrase.php

session_start();
$passphrase= "abc123";

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
if(!isset($_SESSION['loggedin']))
{
		if(isset($_POST['submit']))
                   {//validate passphrase
                   		
						if($_POST['password']==$passphrase)
						{
							$_SESSION['loggedin']=true;
							
						}
						else
						{
							$message= "The password you entered is incorrect. Please try again";
							echo ShowForm($message);
                            die;
						}


                   }
                   else
                   {//show form
                        $message="";
                   	    echo ShowForm($message);
                        die;

                   }
}

function ShowForm($message){
    $myReturn= '
    <form action="' . THIS_PAGE . '" method="post">
    	Password: <input type = "password" name="password"><span> '. $message . '</span><br/>
           <input type="submit" name="submit" value="Enter Password">
           
    </form>
    ';
    return $myReturn;
}