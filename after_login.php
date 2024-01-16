<?php // this is for file is for storing data and redirecting the users to login.html 
function authenticateUser($username,$password){
return($username ===' username'&& $password=== 'password');

}

$userEnteredPassword = $_POST['entered_password'];
$storedHasedPassword = 'username' ($username);
session_start();

if ( password_verfiy($password,$username)){
    echo 'authentication verified ';

    else {
        echo ' authentocation failed , try again';
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform database query to check credentials (replace with your actual database logic)
    $userExists = checkUserCredentials($username, $password);

    if ($userExists) {
        $_SESSION['username'] = $username;
        header("Location: after_loginUser.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
} else {
    // Redirect to login page if not a POST request
    header("Location: Login.html");
    exit();
}

function checkUserCredentials($username, $password) {
    // Implement your database logic to check if the user exists and the password is correct
    // Return true if credentials are valid, false otherwise
    // Example: Replace this with your actual database query
    $validCredentials = ($username === 'user' && $password === 'password');
    return $validCredentials;
}
?>
