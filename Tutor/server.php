<?php
session_start();

// Create a database connection
$db = mysqli_connect('localhost', 'root', '', 'c2education');

// Check if the connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}