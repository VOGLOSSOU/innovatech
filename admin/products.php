<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits - Admin Innovatech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #ff6b35, #f7931e); min-height: 100vh; }
        .admin-container { max-width: 1400px; margin: 0 auto; padding: 20px; }
        .admin-card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .btn-admin { background-color: #ff6b35; border-color: #ff6b35; color: white; }
        .btn-admin:hover { background-color: #e55a2b; border-color: #e55a2b; }
        .product-img { width: 80px; height: 80px; object-fit: cover; border-radius: 5px; }
        .table-responsive { overflow-x: auto; }
        .table th, .table td { vertical-align: middle; white-space: nowrap; }
        .description-cell { max-width: 200px; overflow: hidden; text-overflow: ellipsis; }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Gestion des Produits</h1>
            <a href="dashboard.php" class="btn btn-light">Retour Dashboard</a>
        </div>

        <div class="admin-card">
            <h3>Ajouter un Produit</h3>
            <form id="addProductForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="nom" class="form-control mb-3" placeholder="Nom du produit" required>
                        <select id="category_id" class="form-control mb-3" required>
                            <option value="">Sélectionner une catégorie</option>
                        </select>
                        <input type="number" id="prix" class="form-control mb-3" placeholder="Prix" step="0.01" required>
                        <input type="number" id="quantity" class="form-control mb-3" placeholder="Quantité" required>
                    </div>
                    <div class="col-md-6">
                        <textarea id="description" class="form-control mb-3" placeholder="Description" rows="4"></textarea>
                        <input type="file" id="image" class="form-control mb-3" accept="image/*">
                        <button type="submit" class="btn btn-admin" id="addBtn">
                            <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                            Ajouter Produit
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="admin-card">
            <h3>Liste des Produits</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsList">
                        <!-- Products will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" enctype="multipart/form-data">
                        <input type="hidden" id="editId">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="editNom" class="form-control mb-3" required>
                                <select id="editCategoryId" class="form-control mb-3" required></select>
                                <input type="number" id="editPrix" class="form-control mb-3" step="0.01" required>
                                <input type="number" id="editQuantity" class="form-control mb-3" required>
                            </div>
                            <div class="col-md-6">
                                <textarea id="editDescription" class="form-control mb-3" rows="4"></textarea>
                                <input type="file" id="editImage" class="form-control mb-3" accept="image/*">
                                <button type="submit" class="btn btn-admin">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let categories = [];

        async function loadCategories() {
            try {
                const response = await fetch('../backend/routes/category/read.php', {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    categories = data.categories;
                    const select = document.getElementById('category_id');
                    const editSelect = document.getElementById('editCategoryId');
                    select.innerHTML = '<option value="">Sélectionner une catégorie</option>';
                    editSelect.innerHTML = '<option value="">Sélectionner une catégorie</option>';
                    data.categories.forEach(cat => {
                        select.innerHTML += `<option value="${cat.id}">${cat.nom}</option>`;
                        editSelect.innerHTML += `<option value="${cat.id}">${cat.nom}</option>`;
                    });
                }
            } catch (error) {
                console.error('Error loading categories:', error);
            }
        }

        async function loadProducts() {
            try {
                const response = await fetch('../backend/routes/product/read.php', {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    const html = data.products.map(prod => `
                        <tr>
                            <td><img src="/${prod.image || 'assets/img/placeholder.jpg'}" alt="${prod.nom}" class="product-img"></td>
                            <td>
                                <strong>${prod.nom}</strong><br>
                                <small class="text-muted">${prod.category_name}</small>
                            </td>
                            <td class="description-cell" title="${prod.description || 'Pas de description'}">${prod.description || 'Pas de description'}</td>
                            <td>${prod.prix}€</td>
                            <td>${prod.quantity}</td>
                            <td>${prod.available ? 'Disponible' : 'Indisponible'}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-2" onclick="editProduct(${prod.id})">Modifier</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteProduct(${prod.id})">Supprimer</button>
                            </td>
                        </tr>
                    `).join('');
                    document.getElementById('productsList').innerHTML = html;
                }
            } catch (error) {
                console.error('Error loading products:', error);
            }
        }

        document.getElementById('addProductForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const addBtn = document.getElementById('addBtn');
            const spinner = addBtn.querySelector('.spinner-border');

            // Show loading
            spinner.classList.remove('d-none');
            addBtn.disabled = true;
            addBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Ajout en cours...';

            const formData = new FormData();
            formData.append('category_id', document.getElementById('category_id').value);
            formData.append('nom', document.getElementById('nom').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('prix', document.getElementById('prix').value);
            formData.append('quantity', document.getElementById('quantity').value);
            if (document.getElementById('image').files[0]) {
                formData.append('image', document.getElementById('image').files[0]);
            }

            try {
                const response = await fetch('../backend/routes/product/create.php', {
                    method: 'POST',
                    body: formData,
                    credentials: 'include'
                });
                const result = await response.json();
                if (result.success) {
                    loadProducts();
                    this.reset();
                } else {
                    alert(result.error);
                }
            } catch (error) {
                console.error('Error adding product:', error);
            } finally {
                // Hide loading
                addBtn.disabled = false;
                addBtn.innerHTML = '<span class="spinner-border spinner-border-sm d-none" role="status"></span> Ajouter Produit';
            }
        });

        async function editProduct(id) {
            try {
                const response = await fetch(`../backend/routes/product/read.php?id=${id}`, {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    const prod = data.product;
                    document.getElementById('editId').value = prod.id;
                    document.getElementById('editNom').value = prod.nom;
                    document.getElementById('editCategoryId').value = prod.category_id;
                    document.getElementById('editPrix').value = prod.prix;
                    document.getElementById('editQuantity').value = prod.quantity;
                    document.getElementById('editDescription').value = prod.description;
                    new bootstrap.Modal(document.getElementById('editModal')).show();
                }
            } catch (error) {
                console.error('Error loading product:', error);
            }
        }

        document.getElementById('editProductForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData();
            formData.append('id', document.getElementById('editId').value);
            formData.append('category_id', document.getElementById('editCategoryId').value);
            formData.append('nom', document.getElementById('editNom').value);
            formData.append('description', document.getElementById('editDescription').value);
            formData.append('prix', document.getElementById('editPrix').value);
            formData.append('quantity', document.getElementById('editQuantity').value);
            if (document.getElementById('editImage').files[0]) {
                formData.append('image', document.getElementById('editImage').files[0]);
            }

            try {
                const response = await fetch('../backend/routes/product/update.php', {
                    method: 'POST',
                    body: formData,
                    credentials: 'include'
                });
                const result = await response.json();
                if (result.success) {
                    loadProducts();
                    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                } else {
                    alert(result.error);
                }
            } catch (error) {
                console.error('Error updating product:', error);
            }
        });

        async function deleteProduct(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
                try {
                    const response = await fetch(`../backend/routes/product/delete.php?id=${id}`, {
                        method: 'DELETE',
                        credentials: 'include'
                    });
                    const result = await response.json();
                    if (result.success) {
                        loadProducts();
                    } else {
                        alert(result.error);
                    }
                } catch (error) {
                    console.error('Error deleting product:', error);
                }
            }
        }

        loadCategories();
        loadProducts();
    </script>
</body>
</html>