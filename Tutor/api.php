<?php
require __DIR__ . '/vendor/autoload.php'; // Include Firebase SDK

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;

// Initialize Firebase
$factory = (new Factory)->withServiceAccount('account_key.json');
$auth = $factory->createAuth();

// Function to handle login
function login($email, $password) {
    global $auth;

    try {
        // Attempt to sign in the user
        $user = $auth->signInWithEmailAndPassword($email, $password);

        // Successful login
        return ['success' => true, 'message' => 'Login successful'];
    } catch (FailedToSignIn $e) {
        // Incorrect email or password
        return ['success' => false, 'message' => 'Invalid email or password'];
    } catch (\Exception $e) {
        // Other exceptions (Firebase SDK or other issues)
        return ['success' => false, 'message' => 'An error occurred during login'];
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the request
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate input (you can add more validation if needed)
    if (empty($email) || empty($password)) {
        $result = ['success' => false, 'message' => 'Email and password are required'];
    } else {
        // Call the login function
        $result = login($email, $password);
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($result);
    exit();
}
?>
