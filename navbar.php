<?php
// Determine current page for active link
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
:root {
  --brand: #10b981;
  --brand-dark: #0ea5e9;
  --bg: #f8fafc;
}

/* Glass effect */
.glass {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 12px;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Brand Icon */
.brand-icon {
  width: 38px;
  height: 38px;
  background: linear-gradient(135deg, rgba(16,185,129,.15), rgba(14,165,233,.15));
  border: 1px solid rgba(2,8,23,.08);
  transition: transform .3s ease, box-shadow .3s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
.brand-icon:hover {
  transform: rotate(12deg) scale(1.1);
  box-shadow: 0 4px 12px rgba(16,185,129,0.25);
}

/* Brand Name Gradient Text */
.brand-name {
  background: linear-gradient(90deg, var(--brand), var(--brand-dark));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Navbar hover underline animation */
.navbar .nav-link {
  position: relative;
  padding-bottom: 2px;
  transition: color .3s;
}
.navbar .nav-link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -4px;
  width: 0;
  height: 2px;
  background: var(--brand);
  transition: width .3s ease;
}
.navbar .nav-link:hover::after,
.navbar .nav-link.active::after {
  width: 100%;
}
</style>
<link rel="stylesheet" href="style2.css">
<nav class="navbar navbar-expand-lg sticky-top glass py-3 shadow-sm">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4" href="index.php">
      <span class="brand-icon">
        <i class="bi bi-heart-pulse-fill text-brand"></i>
      </span>
      <span class="brand-name">CARE</span>
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav" 
      aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list fs-2 text-brand"></i>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-3">
        <li class="nav-item"><a class="nav-link <?= $current_page=='About.php'?'active':'' ?>" href="About.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link <?= $current_page=='how.php'?'active':'' ?>" href="how.php">How it Works</a></li>
        <li class="nav-item"><a class="nav-link <?= $current_page=='story.php'?'active':'' ?>" href="story.php">Stories</a></li>
        <li class="nav-item"><a class="nav-link <?= $current_page=='services.php'?'active':'' ?>" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link <?= $current_page=='contact.php'?'active':'' ?>" href="contact.php">Contact</a></li>

        <!-- CTA Buttons -->
        <li class="nav-item ms-lg-2">
          <a class="btn btn-brand px-4" data-bs-toggle="modal" data-bs-target="#authModal">
            Get Started
          </a>
        </li>
        <li class="nav-item">
          <button class="btn btn-ghost ms-2" data-bs-toggle="modal" data-bs-target="#authModal">
            <i class="bi bi-person-circle fs-5"></i>
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="authModalLabel">Welcome to CARE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="authTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTab" type="button" role="tab">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signupTab" type="button" role="tab">Sign Up</button>
          </li>
        </ul>

        <div class="tab-content mt-3" id="authTabContent">

          <!-- Login Form -->
          <div class="tab-pane fade show active" id="loginTab" role="tabpanel">
            <form action="login.php" method="POST">
              <?php if (!empty($login_errors)): ?>
                <div class="alert alert-danger">
                  <?= implode("<br>", array_map("htmlspecialchars", $login_errors)) ?>
                </div>
              <?php endif; ?>

              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <button type="submit" id="ab" class="btn btn-primary w-100">Login</button>
            </form>
          </div>

          <!-- Signup Form -->
          <div class="tab-pane fade" id="signupTab" role="tabpanel">
            <form action="signup.php" method="POST">
              <?php if (!empty($signup_errors)): ?>
                <div class="alert alert-danger">
                  <?= implode("<br>", array_map("htmlspecialchars", $signup_errors)) ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($signup_success)): ?>
                <div class="alert alert-success">
                  <?= htmlspecialchars($signup_success) ?>
                </div>
              <?php endif; ?>

              <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
              </div>

              <div class="mb-3">
                <label>City</label>
                <select name="city_id" class="form-select" required>
                  <option value="">-- Select City --</option>
                  <option value="1">Karachi</option>
                  <option value="2">Lahore</option>
                  <option value="3">Islamabad</option>
                </select>
              </div>

              <button type="submit" class="btn btn-success w-100">Sign Up</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
