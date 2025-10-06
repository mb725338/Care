<?php
require 'db.php';
$id = intval($_GET['id']);
$story = $conn->query("SELECT * FROM stories WHERE id=$id")->fetch_assoc();
if(!$story){ die("Story not found"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($story['title']) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "navbar.php"; ?>
<div class="container py-4">
  <h2><?= htmlspecialchars($story['title']) ?></h2>
  <p><em><?= ucfirst($story['category']) ?></em></p>
  <img src="<?= htmlspecialchars($story['image']) ?>" style="max-width:100%;height:auto;">
  <p><?= nl2br(htmlspecialchars($story['content'])) ?></p>
  <a href="story.php">← Back to Stories</a>


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
</div>
</body>
</html>
