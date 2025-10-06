<?php
session_start();
require 'db.php';

// Fetch stories
$stories = $conn->query("SELECT * FROM stories ORDER BY created_at DESC");

// Grab messages from session
$login_errors  = $_SESSION['login_errors'] ?? [];
$signup_errors = $_SESSION['signup_errors'] ?? [];
$signup_success = $_SESSION['signup_success'] ?? "";

// Clear messages after showing them
unset($_SESSION['login_errors'], $_SESSION['signup_errors'], $_SESSION['signup_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Patient Stories - Care Hospital</title>
  <!-- style -->
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
 
</head>
<body>
<?php include "navbar.php"; ?>

 
    <!-- Hero -->
  <section class="hero py-5 text-center">
    <div class="blob"></div>
    <div class="container position-relative">
      <h1 class="display-4 fw-bold mt-3">Inspiring Patient Stories</h1>
      <p class="sub mx-auto mt-3">
       Read about the journeys of our patients and how our dedicated healthcare team made a difference in their lives.
      </p>
    </div>
  </section>

<div class="container">
  <div class="filters">
    <button class="filter-btn active" data-filter="all">All Stories</button>
    <button class="filter-btn" data-filter="recovery">Recovery Stories</button>
    <button class="filter-btn" data-filter="surgery">Surgery Success</button>
    <button class="filter-btn" data-filter="pediatrics">Pediatrics</button>
    <button class="filter-btn" data-filter="cardiology">Cardiology</button>
  </div>
</div>

<div class="container">
  <div class="stories-grid" id="stories-container">
    <?php while($s=$stories->fetch_assoc()): ?>
      <div class="story-card" data-category="<?= $s['category'] ?>">
        <div class="story-image">
          <img src="<?= htmlspecialchars($s['image']) ?>" alt="">
        </div>
        <div class="story-content">
          <span class="story-tag"><?= ucfirst($s['category']) ?></span>
          <h3 class="story-title"><?= htmlspecialchars($s['title']) ?></h3>
          <p class="story-excerpt"><?= htmlspecialchars($s['excerpt']) ?></p>
          
        </div>
      </div>
    <?php endwhile; ?>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const filterButtons = document.querySelectorAll(".filter-btn");
const stories = document.querySelectorAll(".story-card");
filterButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    filterButtons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    const filter = btn.dataset.filter;
    stories.forEach(story => {
      story.style.display = (filter === "all" || story.dataset.category === filter) ? "block" : "none";
    });
  });
});
</script>
</body>
</html>






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