<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Avis - Admin Innovatech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <style>
        body { background: linear-gradient(135deg, #ff6b35, #f7931e); min-height: 100vh; }
        .admin-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .admin-card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .btn-admin { background-color: #ff6b35; border-color: #ff6b35; color: white; }
        .btn-admin:hover { background-color: #e55a2b; border-color: #e55a2b; }
        .rating { color: #ffc107; }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Gestion des Avis Clients</h1>
            <a href="dashboard.php" class="btn btn-light">Retour Dashboard</a>
        </div>

        <div class="admin-card">
            <h3>Liste des Avis</h3>
            <div id="reviewsList">
                <!-- Reviews will be loaded here -->
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails de l'Avis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="reviewDetails">
                    <!-- Review details will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        async function loadReviews() {
            try {
                const response = await fetch('../backend/routes/user_review/read.php', {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    const html = data.reviews.map(review => `
                        <div class="border-bottom py-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5>${review.name}</h5>
                                    <p class="mb-1">${review.product_name}</p>
                                    <div class="rating mb-2">
                                        ${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}
                                    </div>
                                    <p class="mb-1">${review.message}</p>
                                    <small class="text-muted">${new Date(review.created_at).toLocaleDateString()}</small>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-outline-info me-2" onclick="viewReview(${review.id})">Voir</button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteReview(${review.id})">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    `).join('');
                    document.getElementById('reviewsList').innerHTML = html;
                }
            } catch (error) {
                console.error('Error loading reviews:', error);
            }
        }

        async function viewReview(id) {
            try {
                const response = await fetch(`../backend/routes/user_review/read.php?id=${id}`, {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    const review = data.review;
                    const details = `
                        <p><strong>Nom:</strong> ${review.name}</p>
                        <p><strong>Email:</strong> ${review.email || 'Non fourni'}</p>
                        <p><strong>Produit:</strong> ${review.product_id}</p>
                        <p><strong>Note:</strong> ${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</p>
                        <p><strong>Message:</strong> ${review.message}</p>
                        <p><strong>Date:</strong> ${new Date(review.created_at).toLocaleString()}</p>
                    `;
                    document.getElementById('reviewDetails').innerHTML = details;
                    new bootstrap.Modal(document.getElementById('viewModal')).show();
                }
            } catch (error) {
                console.error('Error loading review:', error);
            }
        }

        async function deleteReview(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')) {
                try {
                    const response = await fetch(`../backend/routes/user_review/delete.php?id=${id}`, {
                        method: 'DELETE',
                        credentials: 'include'
                    });
                    const result = await response.json();
                    if (result.success) {
                        loadReviews();
                    } else {
                        alert(result.error);
                    }
                } catch (error) {
                    console.error('Error deleting review:', error);
                }
            }
        }

        loadReviews();
    </script>
</body>
</html>