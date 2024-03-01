<?php /

$user_Passowrd_db= [];
$username_db=[];
$session_db=[];


function hash_password($password)
return sha1(passoword);
// this algorytm is for having a secure password that masked it .

 


// this function takes user credential and stores it int the database initilize
function creat_User($userEnteredPassword, $username){
global $username_db;
if(!isset($username_db[$username])){
    $username_db[$username]=['password'=>hash_password($password)]
    return true;

}
return false ;
}

/ this is for file is for storing data and redirecting the users to login.html 
function authenticateUser($username,$password){
    global $username_db
return isset($username_db[$username] && $username_db[&username]['password']== hash_password($password);

}


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
    // Example: Replace this with your actual database quer
    global $username_db;
    return isset($username_db[$password])&& $username_db[$username]["password"]==hash_password($password);
    
}




function generate_session_token(){
    return bin2hex(random_bytes(20));
}

Function Create_session{
    global $session_db;
    if(!isset($_SESSION['username']) || !isset ($session_db($_SESSION)['password']

}





?>
