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
    
    // Récupérer la catégorie sélectionnée
    $categoryId = $_GET['category'] ?? '';
    
    // Filtrer par catégorie si sélectionnée
    if (!empty($categoryId)) {
        $allProducts = $productModel->getAllProductsByCategory($categoryId);
    } else {
        $allProducts = $productModel->getAllProducts();
    }
    
    $allCategories = $categoryModel->getAllCategories();
    $totalProducts = count($allProducts);
    ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Innovatech - Nos Produits - Boutique Informatique</title>
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
Product Area
==============================-->
    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <p class="woocommerce-result-count"> 1–<?php echo min(15, $totalProducts); ?> sur <?php echo $totalProducts; ?> produits</p>
                    </div>

                    <div class="col-md-auto">
                        <form class="woocommerce-ordering" method="get">
                            <select name="category" class="orderby" aria-label="Filter by category" onchange="this.form.submit()">
                                <option value="">Toutes les catégories</option>
                                <?php foreach ($allCategories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo ($categoryId ?? '') === (string)$category['id'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($category['nom']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
                        <div class="row gy-40">
                <?php if (!empty($allProducts)): ?>
                <?php foreach ($allProducts as $product): ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product-grid style1">
                        <div class="box-img">
                            <img src="/<?php echo htmlspecialchars($product['image'] ?: 'assets/img/placeholder.jpg'); ?>" 
                                 alt="<?php echo htmlspecialchars($product['nom']); ?>">
                            <?php if ($product['quantity'] > 0): ?>
                            <span class="product-tag">En Stock</span>
                            <?php else: ?>
                            <span class="product-tag" style="background: #666;">Rupture</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-grid-content">
                            <h3 class="box-title">
                                <a href="shop-details.php?id=<?php echo $product['id']; ?>">
                                    <?php echo htmlspecialchars($product['nom']); ?>
                                </a>
                            </h3>
                            <span class="box-price"><?php echo number_format($product['prix'], 2, ',', ' '); ?>FCFA</span>
                            <a href="https://wa.me/2290157400640" target="_blank" class="th-btn2 btn-fw">
                                Contacter le vendeur
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div class="col-12">
                    <p class="text-center">Aucun produit disponible pour le moment.</p>
                </div>
                <?php endif; ?>
            </div></div>
            <!-- <div class="th-pagination text-center pt-50">
                <ul>
                    <li><a href="blog.html"><i class="fa-regular fa-angle-left"></i></a></li>
                    <li><a href="blog.html">1</a></li>
                    <li><a href="blog.html">2</a></li>
                    <li><a href="blog.html">3</a></li>
                    <li><a href="blog.html"><i class="fa-regular fa-angle-right"></i></a></li>
                </ul>
            </div> -->
        </div>
    </section>
    <!--==============================
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