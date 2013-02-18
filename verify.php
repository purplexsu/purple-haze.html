<?php
session_start();
if($_POST["capchar"] != $_SESSION["capchar"] || empty($_POST["capchar"])) 
{ 
	print("wrong! Correct is:".$_SESSION["capchar"]."Your input is:".$number); 
} 
else
{
	print("correct!"); 
}
die();
?>