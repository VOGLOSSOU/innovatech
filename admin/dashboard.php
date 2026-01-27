<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Innovatech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <style>
        body { background: linear-gradient(135deg, #ff6b35, #f7931e); min-height: 100vh; }
        .dashboard-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .stats-card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .btn-admin { background-color: #ff6b35; border-color: #ff6b35; color: white; }
        .btn-admin:hover { background-color: #e55a2b; border-color: #e55a2b; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="text-center mb-4">
            <h1 class="text-white">Dashboard Admin</h1>
            <p class="text-white">Bienvenue, <span id="adminName">Admin</span></p>
            <a href="logout.php" class="btn btn-light">Déconnexion</a>
        </div>

        <div class="row" id="statsContainer">
            <!-- Stats will be loaded here -->
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="stats-card">
                    <h3>Gestion des Catégories</h3>
                    <a href="categories.php" class="btn btn-admin btn-block">Voir Catégories</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <h3>Gestion des Produits</h3>
                    <a href="products.php" class="btn btn-admin btn-block">Voir Produits</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <h3>Avis Clients</h3>
                    <a href="reviews.php" class="btn btn-admin btn-block">Voir Avis</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load dashboard stats
        async function loadDashboard() {
            try {
                const response = await fetch('../backend/routes/admin/dashboard.php', {
                    method: 'GET',
                    credentials: 'include'
                });

                if (response.ok) {
                    const data = await response.json();
                    document.getElementById('adminName').textContent = data.admin.name;

                    const statsHtml = `
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h4>${data.stats.products}</h4>
                                <p>Produits</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h4>${data.stats.categories}</h4>
                                <p>Catégories</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h4>${data.stats.reviews}</h4>
                                <p>Avis</p>
                            </div>
                        </div>
                    `;
                    document.getElementById('statsContainer').innerHTML = statsHtml;
                } else {
                    window.location.href = 'login.php';
                }
            } catch (error) {
                console.error('Error loading dashboard:', error);
                window.location.href = 'login.php';
            }
        }

        loadDashboard();
    </script>
</body>
</html>