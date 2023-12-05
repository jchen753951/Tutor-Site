<?php
session_start();

// Include Firebase SDK
require __DIR__ . '/vendor/autoload.php';
use Kreait\Firebase\Factory;

// Initialize Firebase
$factory = (new Factory)->withServiceAccount('/credentials/account_key.json');
$auth = $factory->createAuth();

// Function to handle login
function login($email, $password) {
    global $auth;

    try {
        // Attempt to sign in the user
        $user = $auth->signInWithEmailAndPassword($email, $password);

        // Successful login
        return ['success' => true, 'message' => 'Login successful'];
    } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
        // Incorrect email or password
        return ['success' => false, 'message' => 'Invalid email or password'];
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (you can add more validation if needed)

    // Call the login function
    $result = login($email, $password);

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}

$db = mysqli_connect('localhost', 'root', '', 'c2education');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
