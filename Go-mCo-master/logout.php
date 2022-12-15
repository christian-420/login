<?php 

session_start();

$conn= new mysqli("localhost", "root", "", "mydata");

$_SESSION = array();
session_destroy();
header ("location: index.html");
