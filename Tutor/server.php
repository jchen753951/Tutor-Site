<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'c2education');
//$db = mysqli_connect('localhost', 'id21622081_username', 'P@ssw0rd', 'id21622081_c2education');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}