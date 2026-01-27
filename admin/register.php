<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Admin - Innovatech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <style>
        body { background: linear-gradient(135deg, #ff6b35, #f7931e); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .register-form { max-width: 400px; width: 100%; padding: 30px; background: white; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .btn-primary { background-color: #ff6b35; border-color: #ff6b35; }
        .btn-primary:hover { background-color: #e55a2b; border-color: #e55a2b; }
        .form-control:focus { border-color: #ff6b35; box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25); }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="text-white">Admin Innovatech</h1>
            <p class="text-white">Panneau d'administration</p>
        </div>
        <div class="register-form">
            <h2 class="text-center mb-4">Inscription Admin</h2>
            <form id="registerForm">
                <div class="mb-3">
                    <label for="nom_complet" class="form-label">Nom Complet</label>
                    <input type="text" class="form-control" id="nom_complet" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de Passe</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="mot_de_passe" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    S'inscrire
                </button>
            </form>
            <div id="message" class="mt-3"></div>
            <div class="text-center mt-3">
                <a href="login.php">Déjà inscrit ? Se connecter</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('mot_de_passe');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const spinner = submitBtn.querySelector('.spinner-border');
            const btnText = submitBtn.querySelector('span:not(.spinner-border)');

            // Show loader
            spinner.classList.remove('d-none');
            submitBtn.disabled = true;
            btnText.textContent = 'Inscription en cours...';

            const data = {
                nom_complet: document.getElementById('nom_complet').value,
                email: document.getElementById('email').value,
                mot_de_passe: document.getElementById('mot_de_passe').value
            };

            try {
                const response = await fetch('../backend/routes/admin/register.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                const messageDiv = document.getElementById('message');

                if (response.ok) {
                    messageDiv.innerHTML = '<div class="alert alert-success">' + result.success + '</div>';
                    setTimeout(() => window.location.href = 'login.php', 2000);
                } else {
                    messageDiv.innerHTML = '<div class="alert alert-danger">' + result.error + '</div>';
                }
            } catch (error) {
                document.getElementById('message').innerHTML = '<div class="alert alert-danger">Erreur de connexion</div>';
            } finally {
                // Hide loader
                spinner.classList.add('d-none');
                submitBtn.disabled = false;
                btnText.textContent = 'S\'inscrire';
            }
        });
    </script>
</body>
</html>