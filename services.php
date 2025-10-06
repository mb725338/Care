<?php
session_start();
include "db.php";

$res = $conn->query("SELECT * FROM services ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Services | CARE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  
<?php include "navbar.php"; ?>

  <!-- Hero -->
  <section class="hero py-5 text-center">
    <div class="blob"></div>
    <div class="container position-relative">
      <h1 class="display-4 fw-bold mt-3">Trusted Care, Here for You</h1>
      <p class="sub mx-auto mt-3">
     We provide expert, compassionate healthcare from a team you can rely on.
      </p>
    </div>
  </section>

<!-- Services Section -->
<div class="container py-5">
  <div class="row">
    <?php
   
    if ($res && $res->num_rows > 0) {
        while ($srv = $res->fetch_assoc()) {
    ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo $srv['image_url']; ?>" class="card-img-top" alt="<?php echo $srv['title']; ?>">
          <div class="card-body">
            <h5 class="card-title">
              <i class="<?php echo $srv['icon']; ?> read-more me-2"></i>
              <?php echo $srv['title']; ?>
            </h5>
            <p class="card-text"><?php echo $srv['description']; ?></p>
           
          </div>
        </div>
      </div>
    <?php
        }
    } else {
        echo "<p>No services available.</p>";
    }
    ?>
  </div>
</div>

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

 <?php include "footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

</body>
</html>
