<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
    <title>Fashistore</title>
	<link rel="icon" href="<?php echo base_url(); ?>assets/vendor/img/fav.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
       
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="<?php echo base_url('');?>">
                                <img src="<?php echo base_url(); ?>assets/vendor/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                           
                            <li class="cart-icon">
                                <a href="<?php echo base_url('cart'); ?>">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Products</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Mens wear</a></li>
                            <li><a href="#">Womens wear</a></li>
                            <li><a href="#">Kids</a></li>                            
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="<?php if($this->uri->segment(1)==''){ echo "active";} ?>"><a href="<?php echo base_url('');?>">Home</a></li>
                        <li class="<?php if($this->uri->segment(1)=='aboutus'){ echo "active";} ?>" ><a href="<?php echo base_url('aboutus');?>">About Us</a></li>                       
                        <li class="<?php if($this->uri->segment(1)=='giftcards'){ echo "active";} ?>"><a href="<?php echo base_url('giftcards');?>">Giftcards</a></li>
                        <li class="<?php if($this->uri->segment(1)=='contact'){ echo "active";} ?>"><a href="<?php echo base_url('contact');?>">Contact</a></li>
                        <li class="<?php if($this->uri->segment(1)=='login'){ echo "active";} ?>"><a href="<?php echo base_url('login');?>">Login | Signup</a></li>
                       
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->