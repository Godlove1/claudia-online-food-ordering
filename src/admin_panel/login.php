<?php
// database connection file
include '../config/config.inc.php';

// Start the session
// session_start();

// Check whether the Submit Button is Clicked or Not
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // SQL to check whether the username and password exist or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($count == 1) {
        // User available and login success
        $_SESSION['login'] = '<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-6 px-4 py-3 shadow-md" role="alert"><div class="flex"><div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div><div><p class="font-bold">SUCCESS!</p><p class="text-sm">Successfully logged in as admin.</p></div></div></div>';

        $_SESSION['user'] = $username;

        // Redirect to index page
        ob_start(); // Start output buffering
        header('location:index');
        ob_end_flush(); // Flush output buffer and send output to browser
        exit();
    } else {
        // User not available and login fail
        $_SESSION['login'] = '<div class="w-auto bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert"><div class="flex"><div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div><div><p class="font-bold">Something went wrong</p><p class="text-sm">Please enter correct password/username.</p></div></div></div>';

        // Redirect to login page
        ob_start(); // Start output buffering
        header('location:login');
        ob_end_flush(); // Flush output buffer and send output to browser
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/output.css">
    <title>Admin Login</title>
</head>
<body>
<main class="w-full h-screen  flex justify-center items-center flex-col ">
    <!-- error message for failed login/wrong password -->
    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
    <!-- error message for failed login/wrong password -->
    <div class="w-full max-w-xs mt-4 border rounded border-slate-300">
        <form class="bg-white  rounded px-8 pt-6 pb-8 mb-4" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm  mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border border-slate-300  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder:italic" name="username" type="text" placeholder="username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm  mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-slate-300  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="************">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                    Sign In
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;Anonymous 2022. All rights reserved.
        </p>
    </div>
</main>
</body>
</html>