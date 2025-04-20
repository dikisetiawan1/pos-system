<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - POS Cashier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(135deg, #4f46e5, #3b82f6);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        animation: fadeIn 1s ease;
      }
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
    </style>
     <!--begin::Fonts-->

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
  </head>
  <body>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card p-4">
            <div class="text-center mb-4">
              <h3 class="text-primary">POS SYSTEM BUMDES</h3>
              <small class="text-muted">Welcome!, Please Login First.</small>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger text-center"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="proses_login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required autofocus>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fas fa-eye"></i>
                  </button>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
          <p class="text-white text-center mt-4 small">© 2025 POS System</p>
        </div>
      </div>
    </div>

    <script>
  const toggleBtn = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  toggleBtn.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.innerHTML = type === 'text' ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
  });
</script>

  </body>
</html>
