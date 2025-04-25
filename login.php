<?php 
session_start(); 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - POS Bumdes</title>
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
      /* Container untuk watermark grid */
    /* Watermark Grid (sekali di satu layar) */
    .watermark-layer {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 0;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-template-rows: repeat(auto-fit, 80px);
  opacity: 0.05;
  transform: rotate(-30deg);
  pointer-events: none;
  user-select: none;
}

.watermark-layer span {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 32px;
  font-weight: bold;
  color: white;
}
@keyframes floating {
  0% { transform: translateY(0px) rotate(-30deg); }
  50% { transform: translateY(10px) rotate(-30deg); }
  100% { transform: translateY(0px) rotate(-30deg); }
}

.watermark-layer {
  animation: floating 8s ease-in-out infinite;
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
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--end::Fonts-->
  </head>
  <body>

  <?php
  if (isset($_GET['timeout'])) {
    echo '<script>Swal.fire({
                      title: "Your session has expired. Please log in again!",
                      text: "You clicked the button!",
                      icon: "error"
                    });</script>';
  }?>
  <!-- start:text watermark -->
 <!-- Watermark satu layar -->

 <div class="watermark-layer">
  <?php for ($i = 0; $i < 75; $i++): ?>
    <span>POS SYSTEM</span>
  <?php endfor; ?>
</div>


  <!-- end:text Watermark -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card p-4">
            <div class="text-center mb-4">
              <h3 class="text-primary">POS BUMDES</h3>
              <small class="text-muted">Welcome!, Please Login First.</small>
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger text-center"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="proses_login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username<span style="color: red; font-size:20px" >*</span></label>
                <input type="text" name="username" class="form-control" required autofocus>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password<span style="color: red; font-size:20px" >*</span></label>
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
          <p class="text-white text-center mt-4 small">© 2025 POS Bumdes</p>
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
