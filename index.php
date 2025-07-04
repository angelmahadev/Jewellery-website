<?php
session_start();

// Always destroy any active session
//session_unset();
//session_destroy();


// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: Login.php");
    exit;
}
?>
<?php
$jsonFile = 'products.json';
$products = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jewellery Website</title>
    
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="product.css">
    <!--==========fav-icon=========-->
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="showCart">

    <!-- Header Section -->
    <header>
        <!-- Top Bar -->
        <div class="header-top-bar" style="background-color: #3e4444; color: white; text-align: center; padding: 10px; font-size: 18px;">
            Welcome to Jewellery Store
        </div>
    
        <!-- Navigation Upper Section -->
        <div class="nav-upper">
            <!-- Left: Logo & Name -->
            <div class="nav-left">
                <img src="images/logo.png" alt="Logo" class="logo">
                <span class="store-name">Modern Minima</span>
            </div>
    
            <!-- Middle: Search Bar -->
            <div class="nav-search">
                <input type="text" placeholder="Search for jewellery..." class="search-bar">
            </div>
    
            <!-- Right: Icons -->
                  
            <div class="icon-cart">
                <a href="admin_login.php" title="Login">
  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  </svg>
</a>

                  
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                  </svg>
                  
                <span>0</span>


            </div>       
            </div>

        </div>
    
        <!-- Navigation Lower Section (Categories) -->
        <nav class="nav-lower">
            <ul class="menu">
                <li><a href="#product-list" class="nav-item">Earrings, pendents and rings</a></li>
                <li><a href="#diamond-jewellery" class="nav-item">Diamond Jewellery</a></li>
                <li><a href="#more-jewellery1" class="nav-item">More Jewellery</a></li>
                <li><a href="#gifting" class="nav-item">Gifting & Wedding Collection</a></li>
            </ul>
        </nav>
    </header>
    <video autoplay loop muted playsinline class="category-video">
    <source src="video/video2.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
    <!--Service-info-->

    <section class="what-we-provide">
        <!--**box**-->
        <div class ="w-info-box">
            <!--icon-->
            <div class="w-info-icon">
                <i class="fa-solid fa-plane"></i>
            </div>
            <!--text-->
            <div class="w-info-text">
                <strong>Free Shipping</strong>
                <p>Lorem ipsum dolor sit.</p>
            </div>

        </div>
        <div class ="w-info-box">
            <!--icon-->
            <div class="w-info-icon">
                <i class="fa-solid fa-comment"></i>
            </div>
            <!--text-->
            <div class="w-info-text">
                <strong>Support 24/7</strong>
                <p>Lorem ipsum dolor sit.</p>
            </div>

        </div>
        <div class ="w-info-box">
            <!--icon-->
            <div class="w-info-icon">
                <i class="fa-regular fa-credit-card"></i>
            </div>
            <!--text-->
            <div class="w-info-text">
                <strong>100% payment secure</strong>
                <p>Lorem ipsum dolor sit.</p>
            </div>

        </div>
        

    </section>
    <!--============= Categories Section (5 Circular Images) ==========-->

    <section class="category-container">
        <a href="earrings.html" class="category-box">
            <img src="images/img 1.jpg" alt="Earring">
            <p>Earrings</p>
        </a>
        <a href="chains.html" class="category-box">
            <img src="images/img 2.jpg" alt="Chain">
            <p>Chain</p>
        </a>
        <a href="rings.html" class="category-box">
            <img src="images/img 3.jpg" alt="Ring">
            <p>Ring</p>
        </a>
        <a href="necklaces.html" class="category-box">
            <img src="images/img 5.jpg" alt="Necklace">
            <p>Necklace</p>
        </a>
        <a href="bracelates.html" class="category-box">
            <img src="images/img 4.jpg" alt="Bracelet">
            <p>Bracelet</p>
        </a>
    </section>
    
<!--============= Automatic Background Video Section ==========-->
<!--============= Automatic Background Video Section ==========-->
<video autoplay loop muted playsinline class="category-video">
    <source src="video/video1.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

 <img src="images/Line-Design.svg" alt="Line Design" class="line-design">

    


<section class="imgsec">
    <!-- Left: Large Image -->
    <div class="rightimg">
        <img src="images/banner.jpg" alt="Large Banner Image">
    </div>

    <!-- Right: Two Stacked Images -->
    <div class="twoimg">
        <img src="images/banner1.jpg" alt="Top Right Image">
        <img src="images/banner2.jpg" alt="Bottom Right Image" class="lowerimg">
    </div>
</section>
<section class="diamond-title"> 
    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">

    <h1>Our collections</h1>


    <div class="category-images">
        <img src="images/category1.jpg" alt="Category Image 1">
        <img src="images/category2.jpg" alt="Category Image 2">
        <img src="images/category3.jpg" alt="Category Image 3">
        <img src="images/category4.jpg" alt="Category Image 4">
        <img src="images/category5.jpg" alt="Category Image 5">
        <img src="images/category6.jpg" alt="Category Image 6">
    </div>
    


</section>


<section class="collection-section">
    <div class="collection-container">
        <div class="collection-item">
            <img src="images/collection1.jpg" alt="Collection 1">
        </div>
        <div class="collection-item middle">
            <img src="images/collection2.jpg" alt="Collection 2">
        </div>
        <div class="collection-item">
            <img src="images/collection3.jpg" alt="Collection 3">
        </div>
    </div>
    <div class="view-collections">
        <a href="#" class="view-button">View All Collections</a>
    </div>
</section>

<div id="diamond-jewellery" >

    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">

    <div class="diamond-title">
 <h1>Diamond Jewellery</h1>
 </div>

        <div class="diamond-images">
        <img src="images/diamond jewellery.webp" alt="Diamond Jewellery 1">
        <img src="images/diamond jewellery1.jpg" alt="Diamond Jewellery 2">
        </div>
 </div>
 
 
        <div id="more-jewellery1">
<section class="diamond-title">
    
    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">

    <h1>More Jewellery</h1>

<section class="more-jewellery">
    <div class="jewellery-container">
        <img src="images/more jewellery1.jpg" alt="Jewellery 1">
        <img src="images/more jewellery2.jpg" alt="Jewellery 2">
        <img src="images/more jewellery3.jpg" alt="Jewellery 3">
    </div>
</section>
</section>
</div>


<!--============= Products Section (26 Products) ==========-->
<img src="images/Line-Design.svg" alt="Line Design" class="line-design">
<div class="title">Recommended Products</div>

        
        <div class="container">
    
    <!-- Product 1 -->
    <div id="product-list" class="listProduct-earings"></div>
<!--
        <div class="item">
        <img src="images/earing1.jpeg" alt="earing">
        <h2>chain set</h2>
        <div class="price">₹999</div>
        <button class="addCart">Add to Cart</button>
        </div>


     
        <div class="item">
        <img src="images/earing2.jpeg" alt="earing">
        <h2>stud earing</h2>
        <div class="price">₹1999</div>
        <button class="addCart">Add to Cart</button>
        </div>
    

    
        <div class="item">
        <img src="images/earing3.jpeg" alt="earing">
        <h2>pearl earing</h2>
        <div class="price">₹2999</div>
        <button class="addCart">Add to Cart</button>
        </div>
    
    

     
        <div class="item">
        <img src="images/earing4.jpeg" alt="earing">
        <h2>star earing</h2>
        <div class="price">₹3999</div>
        <button class="addCart">Add to Cart</button>
        </div>

        <div class="item">
        <img src="images/earing5.jpeg" alt="earing">
        <h2>flower earing</h2>
        <div class="price">₹4999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/earing6.jpeg" alt="earing">
        <h2>star stud earing</h2>
        <div class="price">₹5999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/chain1.jpeg" alt="earing">
        <h2>gold chain</h2>
        <div class="price">₹999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/chain2.jpeg" alt="earing">
        <h2>blue diamond chain</h2>
        <div class="price">₹1999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/chain3.jpeg" alt="earing">
        <h2>purple diamond chain</h2>
        <div class="price">₹2999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/chain4.jpeg" alt="earing">
        <h2>blue necklace chain</h2>
        <div class="price">₹3999</div>
        <button class="addCart">Add to Cart</button>
        </div>

        <div class="item">
        <img src="images/chain5.jpeg" alt="earing">
        <h2>purple grape chain</h2>
        <div class="price">₹4999</div>
        <button class="addCart">Add to Cart</button>
        </div>

        <div class="item">
        <img src="images/chain6.jpeg" alt="earing">
        <h2>gold pendant</h2>
        <div class="price">₹5999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/ring16.jpg" alt="earing">
        <h2>eternal spark</h2>
        <div class="price">₹6999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/ring17.jpg" alt="earing">
        <h2>Celestial bloom</h2>
        <div class="price">₹7999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
        <img src="images/ring18.jpg" alt="earing">
        <h2>Golden aura</h2>
        <div class="price">₹8999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        <div class="item">
            <img src="images/ring19.jpg" alt="earing">
            <h2>Radiant grace</h2>
            <div class="price">₹9999</div>
            <button class="addCart">Add to Cart</button>
       </div>
         <div class="item">
                <img src="images/ring20.jpg" alt="earing">
                <h2>Regal charm</h2>
                <div class="price">₹7999</div>
                <button class="addCart">Add to Cart</button>
        </div>
    <div class="item">
        <img src="images/ring10.jpeg" alt="earing">
        <h2>Lustrous elegence</h2>
        <div class="price">₹2999</div>
        <button class="addCart">Add to Cart</button>
        </div>
        </div>
   

    -->
   <!--  Add more products up to 25 -->
     <!--  Add more products up to 25 -->
<div class="container">
    <div class="listProduct-earings">
        <?php
        $products = file_exists("products.json") ? json_decode(file_get_contents("products.json"), true) : [];
        foreach ($products as $product): ?>
            <div class="item" data-id="<?= htmlspecialchars($product['id']) ?>">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <div class="price">₹<?= number_format($product['price'], 2) ?></div>
                <button class="addCart">Add to Cart</button>
            </div>
        <?php endforeach; ?>
        
    </div>
</div>   
<!--CART TAB SECTION--->

<div class="cartTab-earings">
    <h1>Shopping Cart</h1>
    <div class="listCart">
       <div class="item">
        <div class="image">
            <img src="images/earing1.jpeg"  alt="">
        </div>
        
        <div class="total price">
            ₹999
        </div>
        <div class="quantity">
            <span class="minus"><</span>
            <span>1</span>
            <span class="plus">></span>
        </div>
       </div>
    </div>
    <div class="btn">
        <button class="close">CLOSE</button>
        <button class="checkOut">CHECKOUT</button>
    </div>
</div>
</div>
<!---------gifting and wedding collections-->

    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">
    <div id="gifting"class="title">
    Gifting and Wedding Collection
    </div>


    <section class="gifting-section">
        <!-- Left: Large Gift Image (40%) -->
        <div class="gift-main">
            <img src="images/gift.jpg" alt="Main Gift">
        </div>
    
        <!-- Right: Six Small Gift Images (60%) -->
        <div class="gift-grid">
            <img src="images/gift1.jpg" alt="Gift 1">
            <img src="images/gift2.jpg" alt="Gift 2">
            <img src="images/gift3.jpg" alt="Gift 3">
            <img src="images/gift4.jpg" alt="Gift 4">
            <img src="images/gift5.jpg" alt="Gift 5">
            <img src="images/gift6.jpg" alt="Gift 6">
        </div>
    </section>
    
    </section>



<!--=================Testamonials==========-->
<!--============= Testimonials Section ==========-->
<section id="clients">

    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">
    <!-- Heading -->
    <div class="client-heading">
        <h3>Testimonials</h3>
        <p>What they say</p>
    </div>

    <!-- Testimonial Container -->
    <div class="client-box-container">
        <div class="swiper mySwiperTestimonials">
            <div class="swiper-wrapper">
                
                <!-- Testimonial 1 -->
                <div class="swiper-slide client-box">
                    <div class="client-profile">
                        <img src="images/t1.jpg" alt="Client">
                        <div class="profile-text">
                            <strong>Edward James</strong>
                            <span>Client</span>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet. Et voluptatem voluptatem sed sint officiis aut commodi repudiandae ea voluptatibus aspernatur est optiotem quo assumenda eaque eum aliquam tempora.</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide client-box">
                    <div class="client-profile">
                        <img src="images/t2.jpg" alt="Client">
                        <div class="profile-text">
                            <strong>Sophia Williams</strong>
                            <span>Client</span>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet. Et voluptatem voluptatem sed sint officiis aut commodi repudiandae ea voluptatibus aspernatur est optiotem quo assumenda eaque eum aliquam tempora.</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide client-box">
                    <div class="client-profile">
                        <img src="images/t3.jpg" alt="Client">
                        <div class="profile-text">
                            <strong>Michael Brown</strong>
                            <span>Client</span>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet. Et voluptatem voluptatem sed sint officiis aut commodi repudiandae ea voluptatibus aspernatur est optiotem quo assumenda eaque eum aliquam tempora.</p>
                </div>

                <!-- Testimonial 4 -->
                <div class="swiper-slide client-box">
                    <div class="client-profile">
                        <img src="images/t4.jpg" alt="Client">
                        <div class="profile-text">
                            <strong>Emily Davis</strong>
                            <span>Client</span>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>Lorem ipsum dolor sit amet. Et voluptatem voluptatem sed sint officiis aut commodi repudiandae ea voluptatibus aspernatur est optiotem quo assumenda eaque eum aliquam tempora. </p>
                </div>

            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!--============= Recent Blog Posts Section ==========-->
<section class="blog-section">
    

    <img src="images/Line-Design.svg" alt="Line Design" class="line-design">

    <div class="blog-heading">
        <h3>Recent Blog Posts</h3>
        <p>Stay updated with the latest jewellery trends</p>
    </div>

    <div class="blog-container">
        <!-- Blog Post 1 -->
        <div class="blog-box">
            <img src="images/blog-img1.webp" alt="Blog Image 1">
            <h4>Top 10 Jewellery Trends in 2024</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
               Vivamus in justo non libero dictum tempus. 
               Nulla facilisi. Mauris at quam a est fermentum. 
               Donec id mi nec turpis bibendum consectetur. 
               Aenean non erat facilisis.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <!-- Blog Post 2 -->
        <div class="blog-box">
            <img src="images/blog-img2.webp" alt="Blog Image 2">
            <h4>How to Choose the Perfect Engagement Ring</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
               Duis auctor est in risus tempus, vel vestibulum lectus ultricies. 
               Curabitur vitae justo sed turpis vehicula auctor. 
               Sed tristique magna ut magna interdum pharetra. 
               Cras sit amet dui non eros facilisis eleifend.</p>
            <a href="#" class="read-more">Read More</a>
        </div>

        <!-- Blog Post 3 -->
        <div class="blog-box">
            <img src="images/blog-img3.webp" alt="Blog Image 3">
            <h4>Gold vs Diamond: Which is the Better Investment?</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
               Nunc feugiat dui vel purus auctor, nec ullamcorper eros dictum. 
               Proin malesuada lectus sed mauris posuere, non sagittis sapien posuere. 
               Nam posuere justo a lacus tincidunt suscipit. 
               Integer id ligula a sapien porta hendrerit.</p>
            <a href="#" class="read-more">Read More</a>
        </div>
    </div>
</section>
<!--===============footer========-->
<!--============= Footer Section ==========-->
<footer class="footer">
    <div class="footer-container">
        <!-- Column 1: About -->
        <div class="footer-column">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Mauris at quam a est fermentum.</p>
        </div>

        <!-- Column 2: Quick Links -->
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>

        <!-- Column 3: Contact -->
        <div class="footer-column">
            <h3>Contact Us</h3>
            <p><i class="fa-solid fa-envelope"></i> support@jewellery.com</p>
            <p><i class="fa-solid fa-phone"></i> +91 98765 43210</p>
            <p><i class="fa-solid fa-map-marker-alt"></i> Mumbai, India</p>
        </div>

        <!-- Column 4: Social Media -->
        <div class="footer-column">
            <h3>Follow Us</h3>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="footer-bottom">
        <p>&copy; 2024 Jewellery Store | All Rights Reserved.</p>
    </div>
</footer>


<script>
    let listProducts = <?= json_encode($products); ?>;
</script>
<script src="cart.js"></script>

<script src="script.js"></script>