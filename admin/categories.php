<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Catégories - Admin Innovatech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <style>
        body { background: linear-gradient(135deg, #ff6b35, #f7931e); min-height: 100vh; }
        .admin-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .admin-card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .btn-admin { background-color: #ff6b35; border-color: #ff6b35; color: white; }
        .btn-admin:hover { background-color: #e55a2b; border-color: #e55a2b; }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white">Gestion des Catégories</h1>
            <a href="dashboard.php" class="btn btn-light">Retour Dashboard</a>
        </div>

        <div class="admin-card">
            <h3>Ajouter une Catégorie</h3>
            <form id="addCategoryForm">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="nom" class="form-control" placeholder="Nom de la catégorie" required>
                    </div>
                    <div class="col-md-6">
                        <textarea id="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-admin mt-3" id="addBtn">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    Ajouter
                </button>
            </form>
        </div>

        <div class="admin-card">
            <h3>Liste des Catégories</h3>
            <div id="categoriesList">
                <!-- Categories will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm">
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="editNom" class="form-label">Nom</label>
                            <input type="text" id="editNom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea id="editDescription" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-admin">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script>
        async function loadCategories() {
            try {
                const response = await fetch('../backend/routes/category/read.php', {
                    credentials: 'include'
                });
                const data = await response.json();
                if (data.success) {
                    const html = data.categories.map(cat => `
                        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                            <div>
                                <h5>${cat.nom}</h5>
                                <p class="mb-0">${cat.description || 'Pas de description'}</p>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-danger" onclick="deleteCategory(${cat.id})">Supprimer</button>
                            </div>
                        </div>
                    `).join('');
                    document.getElementById('categoriesList').innerHTML = html;
                }
            } catch (error) {
                console.error('Error loading categories:', error);
            }
        }

        document.getElementById('addCategoryForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const addBtn = document.getElementById('addBtn');
            const spinner = addBtn.querySelector('.spinner-border');

            // Show loading
            spinner.classList.remove('d-none');
            addBtn.disabled = true;
            addBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Ajout en cours...';

            const data = {
                nom: document.getElementById('nom').value,
                description: document.getElementById('description').value
            };

            try {
                const response = await fetch('../backend/routes/category/create.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                    credentials: 'include'
                });
                const result = await response.json();
                if (result.success) {
                    loadCategories();
                    this.reset();
                } else {
                    alert(result.error);
                }
            } catch (error) {
                console.error('Error adding category:', error);
            } finally {
                // Hide loading
                addBtn.disabled = false;
                addBtn.innerHTML = '<span class="spinner-border spinner-border-sm d-none" role="status"></span> Ajouter';
            }
        });

        function editCategory(id, nom, description) {
            document.getElementById('editId').value = id;
            document.getElementById('editNom').value = nom;
            document.getElementById('editDescription').value = description;
            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        document.getElementById('editCategoryForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const data = {
                id: document.getElementById('editId').value,
                nom: document.getElementById('editNom').value,
                description: document.getElementById('editDescription').value
            };

            try {
                const response = await fetch('../backend/routes/category/update.php', {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                    credentials: 'include'
                });
                const result = await response.json();
                if (result.success) {
                    loadCategories();
                    bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
                } else {
                    alert(result.error);
                }
            } catch (error) {
                console.error('Error updating category:', error);
            }
        });

        async function deleteCategory(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
                try {
                    const response = await fetch(`../backend/routes/category/delete.php?id=${id}`, {
                        method: 'DELETE',
                        credentials: 'include'
                    });
                    const result = await response.json();
                    if (result.success) {
                        loadCategories();
                    } else {
                        alert(result.error);
                    }
                } catch (error) {
                    console.error('Error deleting category:', error);
                }
            }
        }

        loadCategories();
    </script>
</body>
</html>