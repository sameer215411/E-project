<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="icon" type="image" href="images\logo.png">
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="css/style.css"> -->
   <link rel="stylesheet" type="text/css" href="css/headerr.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <!-- <h3 style="color:black ;">Electronics Waste </h3> -->
      <!-- <p style="color:black ;">E-waste stands for Electronic Waste. It is a piece of electrical or electronic equipment, machine, material which are not in operation/use and is destined for refurbishment, salvage recycling through material recovery, or disposal.</p> -->
      
    
    <marquee direction="right" 
        behavior="alternate" 
        style="color:white" class="mq">
        Electronics Waste 
    </marquee>
    <marquee class="mq1"> E-waste stands for Electronic Waste. It is a piece of electrical or electronic equipment, machine, material which are not in operation/use and is destined for refurbishment, salvage recycling through material recovery, or disposal.</marquee>
      <a href="about.php" class="white-btn">discover more</a>
   </div>



   

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/rotate.gif" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>E-waste stands for Electronic Waste. It is a piece of electrical or electronic equipment, machine, material which are not in operation/use and is destined for refurbishment, salvage recycling through material recovery, or disposal.
</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <!-- <h4 style="color: white;">Need for E-Waste Recycling?</h4> -->
      <p>How Recycling my e-waste ? <br> 
         How To Donate my My E-waste ? <br>
         and How to contact with Clients & E-waste Company <br>
        <br> Just Click here on Contact us 
      </p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>