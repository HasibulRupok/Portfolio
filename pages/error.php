<?php
$error = "";
if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']); 
    // echo $error;
} else {
  $error = "No error, return home page by clicking the button below";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="files/tabIcon.png">

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../css/error.css">
  
  <title>Hasibul Hasan Rupok</title>
</head>

<!-- oncontextmenu="return false" -->

<body oncontextmenu="return true">
  <section class="bg-circles">
    <div class="circle-1"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
    <div class="circle-4"></div>
  </section>

  <section class="w-11/12 mx-auto h-5/6 my-auto bodySection flex justify-center items-center flex-col" >
    <h1 class="text-2xl text-center"><?php echo $error; ?></h1>
    <button class="mt-3 pt-1 pb-1.5 px-3.5 rounded-lg text-lg" id="homeBtn" onclick="window.location.href='../'">Back to Home</button>
  </section>


  <script src="js/index.js"></script>
  <script src="js/navAndHome.js"></script>
</body>

</html>