<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'c2education');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}