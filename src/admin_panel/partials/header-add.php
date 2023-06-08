
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/icons/favicon.png" type="image/png">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/3ecb4095fb.js" crossorigin="anonymous"></script>
    <!-- tailwindwind css -->
    <link rel="stylesheet" href="../assets/css/output.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- ckeditor -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.ico">
    <!-- wysiwyg editor -->
    <script src="https://cdn.tiny.cloud/1/g1zemnecrffm9foubaxwbrdcn4eefyegw09o0jq6z6m923xr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- datables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <title>Admin</title>
    <script language=JavaScript>
function reload(form){
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='index?cat=' + val ;
}
</script>
</head>
<body>
    <!-- header info -->
    <header class="relative w-full h-[80px] bg-teal-500 text-white flex justify-between items-center px-4">

    <div class="menu__btn lg:hidden">
        <i class="fa-solid fa-bars font-bold text-2xl" onclick="openNav()"></i>
    </div>
    
<div>
<p class="text-2xl font-bold"><a href="index">SheyonceFashion</a></p>
</div>

  
<!-- menu for laptop devices -->
<div class="w-full h-full lg:w-1/2  hidden lg:flex">
<ul class="flex justify-end items-center name w-full h-full">
    <li class="flex justify-center items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="../">visit website</a></li>
    <li class="flex justify-center items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="index">Home</a></li>
    <li class="flex justify-center items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="password">Password</a></li>
    <li class="flex justify-center items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="categories">Categories</a></li>
   
    <li class="flex justify-center items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="logout">log out</a></li>
</ul>
</div>

 

    <!-- mobile sidenave for mobile devices -->
<di class="side__nav absolute w-0 left-0 overflow-hidden transition-all ease-in-out h-screen top-0  z-50">
<div class="inner w-full h-full flex justify-start">
<!-- close menu -->

    <!-- menu contents right here -->
    <div class="relative z-50 h-full w-full">
    <div class="cm  absolute top-0 right-24 ">
<i class="fa-solid fa-close font-bold m-4  text-2xl hover:bg-teal-500 cursor-pointer hover:text-white" onclick="closeNav()"></i>
</div>
<div class=" h-full w-1/2 ">
<ul class="name mt-4">
    <li class="flex items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="../" class="w-full"><i class="fa-solid fa-globe"></i> visit website</a></li>
    <li class="flex items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="index" class="w-full"><i class="fa-solid fa-home"></i> Home</a></li>
    <li class="flex items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="categories" class="w-full"><i class="fa-solid fa-folder-open"></i> Categories</a></li>
   
    <li class="flex items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="password" class="w-full"><i class="fa-solid fa-lock"></i> Password</a></li>
    
    <li class="flex items-center hover:text-teal-500 hover:bg-white bg-teal-500 transition-all ease-linear w-full p-2 border-b border-white text-white capitalize"><a href="logout" class="w-full"><i class="fa-solid fa-right-from-bracket"></i> log out</a></li>
</ul>
</div>
</div>
</di>


    </header>
    <!-- /header -->