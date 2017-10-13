<?php
error_reporting(0);
session_start();
$_SESSION['cart'] = $_SESSION['cart'] + $_GET['quantity'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Wavey Urban Vintage Outlet</title>
    <link href="lib/css/newhotstylez.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="top_wrapper row">
        <div class="columns one-fourth">
          <header class="header">
            <h1><a href="index.php">Wavey Urban Vintage</a></h1>
          </header>
        </div><!-- .columns one-fourth -->
        <div class="columns one-third">
          <nav class="main_nav">
            <ul class="nav">
              <li class="shop"><a href="shop.php">Shop</a></li>
              <li class="contact"><a href="contact.php">Contact Us</a></li>
              <li class="search"><a href="search.php">Search</a></li>
              <li><span><p><?php echo $_SESSION['cart']?></p><img class="cart" src="lib/img/carticon.png" alt="carticon"></span></li>
            </ul>
          </nav><!-- nav -->
        </div><!-- columns one-third -->
      </div><!-- top_wrapper -->
