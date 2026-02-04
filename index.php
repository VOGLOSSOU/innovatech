<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Innovatech - ome Electronics Shop</title>
    <meta name="author" content="Erna">
    <meta name="description" content="Erna - Multi-Purpose Modern & Minimal WooCommerce Template">
    <meta name="keywords" content="Erna - Multi-Purpose Modern & Minimal WooCommerce Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Dancing+Script:wght@400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Js -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="electronics-shop">

    <?php 
    // Connexion à la base de données
    require_once 'backend/config/database.php';
    require_once 'backend/models/Product.php';
    $productModel = new Product();
    $recentProducts = $productModel->getRecentProducts(6);
    ?>

    <?php include 'include/header.php'; ?>

    <!--==============================
Hero Area
==============================-->
    <div class="th-hero-wrapper hero-2" style="background-color: #f8f9fa; padding: 20px 0;">
        <div class="container th-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h3 class="hero-text">
                            Innovatech : des PC performants, pensés 
                            pour vos besoins pros et perso, avec une expertise
                             complète en maintenance et réparation de cartes mères.
                        </h3>
                        <div class="btn-group">
                            <a href="shop.php" class="th-btn">Voir nos Produits</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img text-center">
                        <img src="assets/img/descc.png" alt="Services Innovatech" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
Category Area
==============================-->
    <section class="categorySlide-area position-relative overflow-hidden">
        <div class="container th-container">
            <div class="slider-area">
                <div class="swiper th-slider has-shadow categorySlide" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"5"},"1400":{"slidesPerView":"9"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_1.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Bluetooth Speaker</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_2.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Headphone</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_3.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Laptops</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_4.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Smart TV</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_5.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Camera</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_6.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Smart Phone</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_7.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Smart Watches</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_8.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Accessories</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_1.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Bluetooth Speaker</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_2.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Headphone</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_3.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Laptops</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_4.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Smart TV</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_5.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Camera</a></h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="categories-item">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/category/category_1_6.png" alt="categories-item">
                                </div>
                                <h3 class="box-title"><a href="shop-details.php">Smart Phone</a></h3>
                            </div>
                        </div>

                    </div>
                </div>
                <button data-slider-prev=".categorySlide" class="slider-arrow slider-prev">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button data-slider-next=".categorySlide" class="slider-arrow slider-next">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!--==============================
Cta Area  
==============================-->

    <section class="space overflow-hidden">
        <div class="container th-container">
            <div class="cta-sec1">
                <div class="row justify-content-lg-between justify-content-center align-items-center">
                    <div class="col-lg-3 col-xl-4">
                        <div class="cta-wrapp" data-bg-src="assets/img/shape/cta-shape1.png">
                            <h4 class="box-title">Special <span>Gift Voucher</span></h4>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="cta-content" data-bg-src="assets/img/shape/cta-shape2.png">
                            <p class="sec-text text-white"><span class="text-theme">ONLINE SHOPPING SALE:</span> 
                                Ordinateurs,
                                Tablettes, Camera & accessoires
                                chez Innovatech</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-2">
                        <div class="cta-group">
                            <a href="shop.php" class="th-btn style3">ACHETER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--==============================
Product Area
==============================-->

    <div class="product-sec space-bottom overflow-hidden">
        <div class="container th-container">
            <div class="row justify-content-xl-between justify-content-center">
                <div class="col-lg-auto">
                    <div class="title-area mb-20 text-xl-start text-center">
                        <h2 class="sec-title style2">Flash Sale Today</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="product-right">
                        <div class="product-title-area">
                            <h3 class="box-title"><img src="assets/img/icon/fire2.svg" alt="">Hurry up! Sale end in:</h3>
                        </div>
                        <ul class="timer-counter counter-list style4" data-offer-date="12/12/2025">
                            <li>
                                <div class="day count-number">00</div>
                                <span class="count-name">Days</span>
                            </li>
                            <li>
                                <div class="hour count-number">00</div>
                                <span class="count-name">Hours</span>
                            </li>
                            <li>
                                <div class="minute count-number">00</div>
                                <span class="count-name">Mins</span>
                            </li>
                            <li>
                                <div class="seconds count-number">00</div>
                                <span class="count-name">Secs</span>
                            </li>
                        </ul>
                        <a href="contact.php" class="line-btn style2">Explore All</a>
                    </div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow productSlider4" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1400":{"slidesPerView":"5"},"1600":{"slidesPerView":"6"}}}'>
                    <div class="swiper-wrapper">

                        <?php if (!empty($recentProducts)): ?>
                        <?php foreach ($recentProducts as $product): ?>
                        <div class="swiper-slide">
                            <div class="product-grid style2">
                                <div class="box-img">
                                    <img src="<?php echo '/' . htmlspecialchars($product['image'] ?: 'assets/img/placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($product['nom']); ?>">
                                    <span class="product-tag">NEW</span>
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['nom']); ?></a></h3>
                                    <span class="box-price"><?php echo number_format($product['prix'], 2, ',', ' '); ?>€</span>
                                    <span class="product-text"><i class="fa-light fa-check"></i><span class="stock">En stock</span><?php echo $product['quantity']; ?></span>
                                    <a href="https://wa.me/2290157400640" target="_blank" class="th-btn2 btn-fw">
                                        <span class="link-effect">
                                            <span class="effect-1">Contacter le vendeur</span>
                                            <span class="effect-1 style2">Contacter le vendeur</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="swiper-slide">
                            <div class="product-grid style2">
                                <div class="box-content">
                                    <p>Aucun produit disponible pour le moment.</p>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--==============================
Product Area
==============================-->


    <!--==============================
Product Area
==============================-->
    <section class="space overflow-hidden overflow-hidden">
        <div class="container th-container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-auto">
                    <div class="title-area text-center text-lg-start mb-30">
                        <h2 class="sec-title style2">Best Sellerss</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="nav tab-menu style2 indicator-active justify-content-lg-end justify-content-center mb-45" id="tab-menu1" role="tablist">
                        <button class="tab-btn th-btn active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Best Deals</button>
                        <button class="tab-btn th-btn" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Phones & Tablets</button>
                        <button class="tab-btn th-btn" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Laptops &
                            Computers</button>
                        <button class="tab-btn th-btn" id="nav-four-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four" aria-selected="false">Video & Audios</button>

                        <button class="tab-btn th-btn" id="nav-five-tab" data-bs-toggle="tab" data-bs-target="#nav-five" type="button" role="tab" aria-controls="nav-five" aria-selected="false">Accessories</button>

                        <button class="tab-btn th-btn" id="nav-six-tab" data-bs-toggle="tab" data-bs-target="#nav-six" type="button" role="tab" aria-controls="nav-six" aria-selected="false">Cameras</button>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <!-- Single item -->
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Single item -->
                <div class="tab-pane fade" id="nav-six" role="tabpanel" aria-labelledby="nav-six-tab">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_11.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Xiaomi Redmi Note 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$750.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_12.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">iphone x cell phone 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$890.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_13.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">samsung z fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$895.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_14.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Watch6 Aluminum Smartwatch BT - Silver</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$590.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_15.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">Samsung Galaxy Z Fold6 12 Pro 5G 128 GB, 6 GB RAM</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$995.00 <del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-lg-6">
                            <div class="product-grid style4 style-flex">
                                <div class="box-img mega-hover">
                                    <img src="assets/img/product/product_2_16.png" alt="Image">
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php">J.P.Gold Wireless Stereo Earphones Headphonea</a></h3>
                                    <div class="woocommerce-product-rating">
                                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span>
                                                customer rating</span>
                                        </div>
                                        <span class="count">(5k reviews)</span>
                                    </div>
                                    <span class="box-price">$589.00<del>$1259.00</del></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
Testimonial Area  
==============================-->
    <section class="overflow-hidden position-relative bg-white space overflow-hidden" id="testi-sec">
        <div class="shape-mockup hero-shape2 jump d-none d-xl-block" data-top="0%" data-left="0%"><img src="assets/img/shape/shape-19.png" alt="shape"></div>
        <div class="container th-container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-auto">
                    <div class="title-area mb-10 text-xl-start text-center">
                        <h2 class="sec-title style2">Customers Latest Reviews</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product-btn pb-10 text-end">
                        <a href="contact.php" class="line-btn style2">Explore All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container th-container">
            <div class="line-bottom"></div>
            <div class="slider-wrap">
                <div class="swiper th-slider has-shadow testiSlider2" id="testiSlider2" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"767":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"},"1400":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="testi-wrapp">
                                    <div class="box-quote">
                                        <img src="assets/img/icon/quote2.svg" alt="">
                                    </div>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <p class="box-text">I just got this high fashion for Beckam and couldn’t be happier with it. It gets amazing reviews and made a total believe out of me. I love the minimal, clean look.</p>
                                <div class="box-profile">
                                    <div class="box-avater">
                                        <img src="assets/img/testimonial/testi_2_1.jpg" alt="Avater">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">Michel Smith</h3>
                                        <p class="box-desig">CEO Of Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="testi-wrapp">
                                    <div class="box-quote">
                                        <img src="assets/img/icon/quote2.svg" alt="">
                                    </div>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <p class="box-text">I just got this high fashion for Beckam and couldn’t be happier with it. It gets amazing reviews and made a total believe out of me. I love the minimal, clean look.</p>
                                <div class="box-profile">
                                    <div class="box-avater">
                                        <img src="assets/img/testimonial/testi_2_2.jpg" alt="Avater">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">Abraham Khalil</h3>
                                        <p class="box-desig">Managing Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="testi-wrapp">
                                    <div class="box-quote">
                                        <img src="assets/img/icon/quote2.svg" alt="">
                                    </div>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <p class="box-text">I just got this high fashion for Beckam and couldn’t be happier with it. It gets amazing reviews and made a total believe out of me. I love the minimal, clean look.</p>
                                <div class="box-profile">
                                    <div class="box-avater">
                                        <img src="assets/img/testimonial/testi_2_3.jpg" alt="Avater">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">Jenny Wilson</h3>
                                        <p class="box-desig">CEO Of Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="testi-wrapp">
                                    <div class="box-quote">
                                        <img src="assets/img/icon/quote2.svg" alt="">
                                    </div>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <p class="box-text">I just got this high fashion for Beckam and couldn’t be happier with it. It gets amazing reviews and made a total believe out of me. I love the minimal, clean look.</p>
                                <div class="box-profile">
                                    <div class="box-avater">
                                        <img src="assets/img/testimonial/testi_2_4.jpg" alt="Avater">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">Jackline Techie</h3>
                                        <p class="box-desig">Managing Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testi-box">
                                <div class="testi-wrapp">
                                    <div class="box-quote">
                                        <img src="assets/img/icon/quote2.svg" alt="">
                                    </div>
                                    <div class="box-review">
                                        <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                    </div>
                                </div>

                                <p class="box-text">I just got this high fashion for Beckam and couldn’t be happier with it. It gets amazing reviews and made a total believe out of me. I love the minimal, clean look.</p>
                                <div class="box-profile">
                                    <div class="box-avater">
                                        <img src="assets/img/testimonial/testi_2_5.jpg" alt="Avater">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="box-title">Michel Smith</h3>
                                        <p class="box-desig">CEO Of Company</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="slider-pagination"></div>
                </div>
            </div>
        </div>
    </section><!--==============================
Feature Area  
==============================-->
    <section class="space">
        <div class="feature-area">
            <div class="container th-container">
                <div class="row gy-4">
                    <div class="col-md-6 col-xl-3 feature-card_wrapp">
                        <div class="feature-card">
                            <div class="box-icon">
                                <img src="assets/img/icon/feature_card_1.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title">Free Shipping</h3>
                                <p class="box-text">The Shipping for orders over $120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 feature-card_wrapp">
                        <div class="feature-card">
                            <div class="box-icon">
                                <img src="assets/img/icon/feature_card_2.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title">Money Back Guarantee</h3>
                                <p class="box-text">Back guarantee in 7 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 feature-card_wrapp">
                        <div class="feature-card">
                            <div class="box-icon">
                                <img src="assets/img/icon/feature_card_3.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title">Membership Offer</h3>
                                <p class="box-text">Huge order over $150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 feature-card_wrapp">
                        <div class="feature-card">
                            <div class="box-icon">
                                <img src="assets/img/icon/feature_card_4.svg" alt="icon">
                            </div>
                            <div class="box-content">
                                <h3 class="box-title">Online Support</h3>
                                <p class="box-text">Support online 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Js -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Tilt -->
    <script src="assets/js/tilt.jquery.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- nice select -->
    <script src="assets/js/nice-select.min.js"></script>

    <!-- Gsap -->
    <script src="assets/js/gsap.min.js"></script>


    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
</body>

</html>