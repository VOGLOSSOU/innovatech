<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php
    // Connexion à la base de données
    require_once 'backend/config/database.php';
    require_once 'backend/models/Product.php';
    require_once 'backend/models/Category.php';
    
    $productModel = new Product();
    $categoryModel = new Category();
    
    // Récupérer l'ID du produit depuis l'URL
    $productId = $_GET['id'] ?? 0;
    
    // Charger le produit
    if ($productId) {
        $product = $productModel->getProductById($productId);
    } else {
        $product = null;
    }
    
    // Si pas de produit, rediriger ou afficher erreur
    if (!$product) {
        header('Location: error.php');
        exit;
    }
    
    // Récupérer les produits de la même catégorie (produits similaires)
    $relatedProducts = [];
    if (!empty($product['category_id'])) {
        $relatedProducts = $productModel->getProductsByCategory($product['category_id'], 8);
        // Exclure le produit actuel de la liste
        $relatedProducts = array_filter($relatedProducts, function($p) use ($productId) {
            return $p['id'] != $productId;
        });
        $relatedProducts = array_values($relatedProducts); // Réindexer le tableau
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Erna - Multi-Purpose Modern & Minimal WooCommerce Template - Shop Details</title>
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

<body>

   <?php include 'include/header.php'; ?>
    
<!--==============================
    Product Details
    ==============================-->
    <section class="product-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-60">
                <div class="col-xl-6">
                    <div class="product-big-img">
                        <div class="img"><img src="/<?php echo htmlspecialchars($product['image'] ?: 'assets/img/placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($product['nom']); ?>"></div>
                    </div>
                </div>
                <div class="col-xl-6 align-self-center">
                    <div class="product-about">
                        <div class="product-rating">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span></div>
                            <a href="shop-details.html" class="woocommerce-review-link">(<span class="count">2</span>
                                reviews)</a>
                        </div>
                        <h2 class="product-title"><?php echo htmlspecialchars($product['nom']); ?></h2>
                        <p class="price"><?php echo number_format($product['prix'], 2, ',', ' '); ?> €</p>

                                                 <p class="text"><?php echo nl2br(htmlspecialchars($product['description'] ?: 'Aucune description disponible.')); ?></p></p>
                        <div>
                        </div>
                       
                        <div class="checklist">
                            <ul>
                                <li><i class="fa-regular fa-ship fa-fw"></i>Estimation des délais de livraison : 3 à 12 jours (international), 2 à 4 jours (Bénin).</li>
                                <li><i class="fa-solid fa-rotate-left"></i>Retour possible dans les 7 jours suivant l’achat. Les droits et taxes ne sont pas remboursables.</li>
                            </ul>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">Catégorie: <a href="shop.php?category=<?php echo $product['category_id']; ?>"><?php echo htmlspecialchars($product['category_name'] ?? 'Non catégorisé'); ?></a></span>
                            <span>Disponibilité: <a href="shop.php"><?php echo $product['quantity']; ?> <span class="stock"><?php echo $product['quantity'] > 0 ? 'En Stock' : 'Rupture'; ?></span></a></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--==============================
		Related Product  
		==============================-->
            <div class="space-extra-top mb-30">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto">
                        <h2 class="sec-title text-center">Related Products</h2>
                    </div>
                    <div class="col-md d-none d-sm-block">
                        <hr class="title-line">
                    </div>
                    <div class="col-md-auto d-none d-md-block">
                        <div class="sec-btn">
                            <div class="icon-box">
                                <button data-slider-prev="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                                <button data-slider-next="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper th-slider has-shadow" id="productSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                    <div class="swiper-wrapper">
                        <?php if (!empty($relatedProducts)): ?>
                        <?php foreach ($relatedProducts as $relatedProduct): ?>
                        <div class="swiper-slide">
                            <div class="product-grid style1">
                                <div class="box-img">
                                    <img src="/<?php echo htmlspecialchars($relatedProduct['image'] ?: 'assets/img/placeholder.jpg'); ?>" alt="<?php echo htmlspecialchars($relatedProduct['nom']); ?>">
                                    <?php if ($relatedProduct['quantity'] > 0): ?>
                                    <span class="product-tag">En Stock</span>
                                    <?php else: ?>
                                    <span class="product-tag" style="background: #666;">Rupture</span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-grid-content">
                                    <h3 class="box-title"><a href="shop-details.php?id=<?php echo $relatedProduct['id']; ?>"><?php echo htmlspecialchars($relatedProduct['nom']); ?></a></h3>
                                    <span class="box-price"><?php echo number_format($relatedProduct['prix'], 2, ',', ' '); ?> €</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="swiper-slide">
                            <p class="text-center">Aucun produit similaire disponible.</p>
                        </div>
                        <?php endif; ?>
                    </div>

                    </div>
                </div>
                <div class="d-block d-md-none mt-40 text-center">
                    <div class="icon-box">
                        <button data-slider-prev="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                        <button data-slider-next="#productSlider1" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section><!--==============================
	Footer Area
==============================-->
  
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