<?php
// database connection file
include '../config/config.inc.php';
include 'partials/login-check.php';

?>
<?php

//Check whether the Submit Button is Clicked or not
if(isset($_POST['save_pass'])){

    $username = $_POST['nuser'];
    $password=md5($_POST['npass']);

    //Create a SQL Query to Update Admin
    $sql = "UPDATE tbl_admin SET username = '$username',password='$password'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if($res==true){
        //Query Executed and Admin Updated
        $_SESSION['login'] = '
<div class="w-auto bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 my-6 px-4 py-3 shadow-md" role="alert">
<div class="flex">
  <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
  <div> 
    <p class="font-bold">SUCCESS!</p>
    <p class="text-sm">Profile Successfully Updated.</p>
  </div>
</div>
</div>
        ';

        $_SESSION['user'] = $username; 
        //tealirect to Manage Admin Page
        header('location:index');
        exit();
    }else{
        //Failed to Update Admin
        $_SESSION['login'] ='
         <div class="w-auto bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 my-6 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
          <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
          <div>
            <p class="font-bold">Something went Wrong</p>
            <p class="text-sm">Error Updating Profile please try again.</p>
          </div>
        </div>
      </div>
         ';
        //tealirect to Manage Admin Page
        header('location:index');
        exit();
    }
}

// header
include 'partials/header-add.php';

?>
<!--edit form -->
<div class="w-full flex justify-center items-center p-8 mt-2">
<form class="lg:w-1/2 w-full space-y-4 font-semibold" method="post">
<div class="text-center mb-6">
<p class="text-3xl underline">Change Password</p>
</div>
<!-- back button -->
<a href="index" class="w-auto  p-1 my-6 font-semibold bg-teal-500 text-white rounded-lg "><i class="fa-solid fa-left-long mr-2"></i>Go Back</a> 

<div class="font-semibold my-2">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Username</label>
        <input class="w-full h-10 px-3 text-base placeholder-gray-300 border-2 border-slate-400 rounded-lg focus:outline-none" type="text" value="<?php echo $_SESSION['user'];?>" name="nuser" required/>
      </div>

    <div class="font-semibold">
        <label class="block mb-1 text-gray-500" for="forms-labelOverInputCode">Password</label>
        <input class="w-full h-10 px-3 text-base border-slate-400 placeholder-gray-300 border-2 rounded-lg focus:outline-none" type="password" placeholder="old password or enter new password" name="npass" required/>
      </div>
     
    <input class="w-1/2 h-10 px-3 mb-2 font-semibold bg-teal-500 text-white rounded-lg focus:outline-none" type="submit" name="save_pass" value="Update"/>
   
  </form>
</div>

<!-- footer -->
<?php include 'partials/footer.php'; ?>