

<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | CARE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
:root {
  --bg: #f7fafc;
  --surface: #ffffff;
  --ink: #0f172a;
  --muted: #64748b;
  --brand: #10b981;
  --brand-2: #0ea5e9;
  --accent: #06b6d4;
  --ok: #22c55e;
  --warn: #f59e0b;
  --error: #ef4444;
  --ring: rgba(16,185,129,.35);
  --shadow: 0 10px 35px rgba(2, 8, 23, .08);
}

    html, body {
      height: 100%;
      scroll-behavior: smooth;
    }

    body {
      background: radial-gradient(1200px 600px at 10% -10%, rgba(16,185,129,.08), transparent 50%),
                  radial-gradient(1000px 500px at 110% 10%, rgba(14,165,233,.08), transparent 50%),
                  var(--bg);
      color: var(--ink);
      font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
      line-height: 1.6;
    }

    /* Navbar */
    .navbar {
      position: sticky;
      top: 0;
      z-index: 999;
      background: rgba(255,255,255,0.85);
      backdrop-filter: blur(14px);
      border-bottom: 1px solid rgba(15,23,42,0.06);
      transition: all 0.3s ease;
    }

    .navbar.scrolled {
      box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .navbar-brand {
      font-family: 'Plus Jakarta Sans', Inter, sans-serif;
      font-weight: 800;
      letter-spacing: .5px;
    }

    /* Glass style */
    .glass {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(14px);
      box-shadow: var(--shadow);
      border: 1px solid rgba(15,23,42,.06);
    }

    /* Hero Buttons – Small & Simple */
    .hero .btn-brand,
    .hero .btn-ghost {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 140px;
      padding: 0.45rem 1.2rem;
      font-size: 0.95rem;
      border-radius: 25px;
      font-weight: 600;
      text-align: center;
      transition: all 0.2s ease;
    }

    /* Brand button */
    .hero .btn-brand,
    .navbar .btn-brand {
      background: var(--brand);
      border: 1px solid var(--brand);
      color: #fff;
    }

    .hero .btn-brand:hover,
    .navbar .btn-brand:hover {
      background: #0ea371;
      border-color: #0ea371;
    }

    /* Ghost button */
    .hero .btn-ghost {
      border: 1px solid var(--brand);
      color: var(--brand);
      background: transparent;
    }

    .hero .btn-ghost:hover {
      background: rgba(16,185,129,0.1);
    }

    /* Hero */
    .hero {
      position: relative;
      overflow: hidden;
      padding: 6rem 0;
    }

    .hero .content {
      position: relative;
      z-index: 1;
    }

    .blob {
      position: absolute;
      inset: -20% -10% auto auto;
      width: 60vmax;
      height: 60vmax;
      border-radius: 50%;
      background: radial-gradient(circle at 30% 30%, rgba(16,185,129,.2), rgba(14,165,233,.08) 60%, transparent 70%);
      filter: blur(40px);
      z-index: 0;
      animation: blob-animation 15s infinite alternate;
    }

    @keyframes blob-animation {
      0% {
        transform: translate(0%, 0%) scale(1);
      }
      50% {
        transform: translate(5%, 5%) scale(1.1);
      }
      100% {
        transform: translate(-5%, -5%) scale(1);
      }
    }

    .hero-badge {
      display:inline-flex;
      align-items:center;
      gap:.5rem;
      padding:.45rem .75rem;
      border-radius:999px;
      background: #ecfeff;
      color: #0c4a6e;
      font-weight:600;
      border:1px solid #cffafe;
      animation: fadeInDown 1s ease;
    }

    .hero h1 {
      font-family:'Plus Jakarta Sans', Inter, sans-serif;
      font-weight: 900;
      letter-spacing:-.02em;
      color: var(--ink);
      animation: fadeInUp 1s ease;
    }

    .sub { 
      color: var(--muted); 
      max-width: 56ch; 
      animation: fadeInUp 1.2s ease;
    }

    .hero .row, .hero .col-lg-6 { 
      position: relative; 
      z-index: 2; 
    }

    .text-muted { 
      color: #64748b !important; 
    }

    /* Feature cards */
    .feature-card {
      border-radius: 18px;
      border:1px solid rgba(2,8,23,.06);
      background: linear-gradient(180deg, #fff, #fbfeff);
      box-shadow: var(--shadow);
      transition: transform .35s ease, box-shadow .35s ease;
      opacity: 0;
      transform: translateY(20px);
    }

    .feature-card.animate {
      opacity: 1;
      transform: translateY(0);
    }

    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 45px rgba(2,8,23,.12);
    }

    .icon-pill {
      width: 46px;
      height: 46px;
      border-radius: 12px;
      display:grid;
      place-items:center;
      background: linear-gradient(135deg, rgba(16,185,129,.12), rgba(14,165,233,.12));
      border:1px solid rgba(2,8,23,.08);
      transition: transform 0.3s ease;
    }

    .feature-card:hover .icon-pill {
      transform: rotate(10deg) scale(1.1);
    }

    /* Section titles */
    .eyebrow {
      text-transform: uppercase;
      letter-spacing: .14em;
      font-weight: 700;
      color: var(--brand);
      opacity: 0;
      transform: translateY(10px);
      transition: all 0.8s ease;
    }

    .eyebrow.animate {
      opacity: 1;
      transform: translateY(0);
    }

    /* Steps */
    .step {
      position:relative;
      padding-left: 2.5rem;
    }

    .step::before {
      content: attr(data-step);
      position:absolute;
      left:0; top:.15rem;
      width:2rem; height:2rem;
      border-radius:50%;
      background: #ecfdf5;
      color:#064e3b;
      display:grid;
      place-items:center;
      font-weight:700;
      border:1px solid #d1fae5;
    }

    /* Stats */
    .stat {
      border-radius:16px;
      background:#fff;
      border:1px solid rgba(2,8,23,.06);
      box-shadow: var(--shadow);
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.8s ease;
    }

    .stat.animate {
      opacity: 1;
      transform: translateY(0);
    }

    .stat h3 {
      font-size: 2.5rem;
      color: var(--brand);
      transition: all 0.5s ease;
    }

    .stat:hover h3 {
      transform: scale(1.1);
    }
     
        /* Animation for numbers */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .counting {
            animation: countUp 1s ease-out forwards;
        }

  

    /* Focus & forms */
    .form-control:focus, .btn:focus {
      box-shadow: 0 0 0 .25rem var(--ring);
      border-color: var(--brand);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Team section */
    .team-member {
      transition: all 0.3s ease;
      opacity: 0;
      transform: translateY(20px);
    }

    .team-member.animate {
      opacity: 1;
      transform: translateY(0);
    }

    .team-member:hover {
      transform: translateY(-5px);
    }

    .team-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #fff;
      box-shadow: var(--shadow);
    }

    /* Timeline */
    .timeline {
      position: relative;
      padding: 2rem 0;
    }

    .timeline::before {
      content: '';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      width: 2px;
      height: 100%;
      background: var(--brand);
      opacity: 0.3;
    }

    .timeline-item {
      position: relative;
      margin-bottom: 3rem;
      opacity: 0;
      transform: translateX(-20px);
      transition: all 0.8s ease;
    }

    .timeline-item:nth-child(even) {
      transform: translateX(20px);
    }

    .timeline-item.animate {
      opacity: 1;
      transform: translateX(0);
    }

    .timeline-content {
      background: var(--surface);
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: var(--shadow);
      position: relative;
    }

    .timeline-dot {
      position: absolute;
      width: 20px;
      height: 20px;
      background: var(--brand);
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      left: -10px;
    }

    .timeline-item:nth-child(even) .timeline-dot {
      left: auto;
      right: -10px;
    }

    /* Values section */
    .value-card {
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
    }

    .value-card:hover {
      border-left-color: var(--brand);
      transform: translateX(5px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero {
        padding: 4rem 0;
      }
      
      .hero h1 {
        font-size: 2.5rem;
      }
      
      .timeline::before {
        left: 30px;
      }
      
      .timeline-dot {
        left: 20px;
      }
      
      .timeline-item:nth-child(even) .timeline-dot {
        left: 20px;
        right: auto;
      }
      
      .timeline-content {
        margin-left: 50px;
      }
      
      .timeline-item:nth-child(even) {
        transform: translateX(0);
      }
    }

    /* =========================================
   AUTH MODAL (Login / Signup)
   ========================================= */

/* Modal container */
.modal-content {
  border-radius: 1.5rem;
  overflow: hidden;
  box-shadow: 0 10px 35px rgba(2, 8, 23, 0.08);
  background: var(--surface);
  border: none;
}

/* Modal header */
.modal-header {
  border-bottom: 1px solid rgba(2, 8, 23, 0.06);
  padding: 1rem 1.5rem;
}
.modal-title {
  font-family: var(--font-heading);
  font-weight: 700;
  color: var(--ink);
}

/* Close button */
.btn-close {
  background: transparent;
  border: none;
}

/* Tabs */
.nav-tabs {
  border-bottom: 1px solid rgba(2, 8, 23, 0.06);
}
.nav-tabs .nav-link {
  font-weight: 600;
  color: var(--muted);
  border: none;
  border-bottom: 3px solid transparent;
  transition: all 0.3s ease;
}
.nav-tabs .nav-link.active {
  color: var(--brand);
  border-bottom-color: var(--brand);
}

/* Forms */
.form-control,
.form-select,
textarea {
  border-radius: 0.75rem;
  border: 1px solid rgba(2, 8, 23, 0.1);
  padding: 0.75rem 1rem;
  font-family: var(--font-primary);
  transition: all 0.3s ease;
}
.form-control:focus,
.form-select:focus,
textarea:focus {
  border-color: var(--brand);
  box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.35);
  outline: none;
}

/* Labels */
label {
  font-weight: 600;
  margin-bottom: 0.4rem;
  color: var(--ink);
  display: block;
}

/* Buttons */
.modal .btn-primary {
  background-color: var(--brand) !important;
  border-color: var(--brand) !important;
  color: #fff !important;
  border-radius: 25px;
  font-weight: 600;
  transition: all 0.3s ease;
}
.modal .btn-primary:hover {
  background-color: var(--brand-dark) !important;
  border-color: var(--brand-dark) !important;
  box-shadow: 0 4px 12px rgba(16,185,129,0.35) !important;
}
.modal .btn-success {
  background-color: var(--brand-2) !important;
  border-color: var(--brand-2) !important;
  color: #fff !important;
  border-radius: 25px;
  font-weight: 600;
  transition: all 0.3s ease;
}
.modal .btn-success:hover {
  background-color: #0284c7 !important;
  border-color: #0284c7 !important;
  box-shadow: 0 4px 12px rgba(14,165,233,0.35) !important;
}

/* Alerts */
.alert {
  border-radius: 0.75rem;
  padding: 0.75rem 1rem;
  font-size: 0.95rem;
  margin-bottom: 1rem;
}
.alert-danger {
  background: rgba(239, 68, 68, 0.1);
  color: #b91c1c;
  border: 1px solid rgba(239, 68, 68, 0.3);
}
.alert-success {
  background: rgba(16, 185, 129, 0.1);
  color: #047857;
  border: 1px solid rgba(16, 185, 129, 0.3);
}
  </style>
</head>
<body>

 <?php 
 include "navbar.php"; 
 require 'db.php';
 ?>

  <!-- Hero -->
  <section class="hero py-5 text-center">
    <div class="blob"></div>
    <div class="container position-relative">
      <h1 class="display-4 fw-bold mt-3">Your Health, Our Priority</h1>
      <p class="sub mx-auto mt-3">
        CARE combines modern technology with compassionate healthcare, making expert medical services accessible to everyone.
      </p>
    </div>
  </section>

  <!-- Who We Are -->
  <section class="py-5">
    <div class="container text-center">
      <h2 class="eyebrow">Who We Are</h2>
      <p class="lead mt-3">
        At CARE, we believe healthcare should be simple, transparent, and available to all. 
        Our platform connects patients with trusted doctors, enables easy online appointments, 
        and provides reliable information on diseases, prevention, and wellness.
      </p>
      <div class="row mt-5">
        <?php
        $whoRes = $conn->query("SELECT * FROM who_we_are");
        while($row = $whoRes->fetch_assoc()):
        ?>
        <div class="col-md-6 mb-4">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="<?= htmlspecialchars($row['icon']) ?> fs-4"></i></div>
            <h5><?= htmlspecialchars($row['title']) ?></h5>
            <p><?= htmlspecialchars($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4 text-center">
        <?php
        $mvRes = $conn->query("SELECT * FROM mission_vision");
        while($row = $mvRes->fetch_assoc()):
        ?>
        <div class="col-md-6">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="<?= htmlspecialchars($row['icon']) ?> fs-4"></i></div>
            <h5><?= htmlspecialchars($row['title']) ?></h5>
            <p><?= htmlspecialchars($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Our Values -->
  <section class="py-5">
    <div class="container">
      <h2 class="eyebrow text-center">Our Values</h2>
      <div class="row mt-4">
        <?php
        $valuesRes = $conn->query("SELECT * FROM values_section");
        while($row = $valuesRes->fetch_assoc()):
        ?>
        <div class="col-md-6 col-lg-3 mb-4">
          <div class="value-card p-4 h-100">
            <h5><i class="<?= htmlspecialchars($row['icon']) ?> text-danger me-2"></i> <?= htmlspecialchars($row['title']) ?></h5>
            <p><?= htmlspecialchars($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="eyebrow">Why Choose Us</h2>
      <div class="row g-4 mt-3">
        <div class="col-md-3">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="bi bi-person-heart fs-4"></i></div>
            <h6>Experienced Specialists</h6>
            <p>Doctors across multiple specialties with years of trusted experience.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="bi bi-clock-history fs-4"></i></div>
            <h6>24/7 Access</h6>
            <p>Book appointments anytime, anywhere with instant confirmations.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="bi bi-hospital fs-4"></i></div>
            <h6>Modern Facilities</h6>
            <p>Partnered hospitals and digital medical records ensure seamless care.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="feature-card p-4 h-100">
            <div class="icon-pill mb-3"><i class="bi bi-heart-pulse fs-4"></i></div>
            <h6>Patient-Centered Care</h6>
            <p>We focus on compassion, safety, and a personalized care journey.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Journey -->
  <section class="py-5">
    <div class="container">
      <h2 class="eyebrow text-center">Our Journey</h2>
      <div class="timeline">
        <?php
        $journeyRes = $conn->query("SELECT * FROM journey ORDER BY year ASC");
        while($row = $journeyRes->fetch_assoc()):
        ?>
        <div class="timeline-item">
          <div class="timeline-dot"></div>
          <div class="timeline-content">
            <h5><?= htmlspecialchars($row['year']) ?></h5>
            <p><?= htmlspecialchars($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="stat-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Achievements</h2>
            <p>We're proud of the impact we've made in healthcare services across the nation</p>
        </div>
        
        <div class="row g-4">
            <?php
            $statsRes = $conn->query("SELECT * FROM stats");
            while($row = $statsRes->fetch_assoc()):
            ?>
            <div class="col-md-3">
                <div class="stat p-4 text-center">
                    <!-- Show dynamic value instead of 0 -->
                    <h3 class="fw-bold counter" id="stat-<?= $row['id'] ?>"><?= $row['value'] ?></h3>
                    <p><?= htmlspecialchars($row['label']) ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

  <!-- Leadership Team -->
  <section class="py-5">
    <div class="container">
      <h2 class="eyebrow text-center">Leadership Team</h2>
      <div class="row mt-4">
        <?php
        $leaderRes = $conn->query("SELECT * FROM leadership");
        while($row = $leaderRes->fetch_assoc()):
        ?>
        <div class="col-md-4 mb-4">
          <div class="team-member text-center p-4">
            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="team-img mb-3">
            <h5><?= htmlspecialchars($row['name']) ?></h5>
            <p class="text-muted"><?= htmlspecialchars($row['role']) ?></p>
            <p><?= htmlspecialchars($row['description']) ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Auth Modal -->
  <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <!-- Your existing auth modal code -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".counter").forEach(counter => {
    let target = +counter.innerText;
    counter.innerText = "0";
    let count = 0;
    let step = target / 100; // speed

    let updateCounter = () => {
      if(count < target){
        count += step;
        counter.innerText = Math.ceil(count);
        requestAnimationFrame(updateCounter);
      } else {
        counter.innerText = target;
      }
    };
    updateCounter();
  });
});


    // Animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize elements that should animate on scroll
      const animatedElements = document.querySelectorAll('.eyebrow, .feature-card, .stat, .team-member, .timeline-item');
      
      // Create intersection observer
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('animate');
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      });
      
      // Observe all animated elements
      animatedElements.forEach(el => {
        observer.observe(el);
      });
      
      // Stats animation
      const statsRes = <?= json_encode($statsRes->fetch_all(MYSQLI_ASSOC)) ?>;
      statsRes.forEach((stat, index) => {
        const element = document.getElementById(`count${stat.id}`);
        if (element && stat.value !== '24/7') {
          animateCount(element, parseInt(stat.value.replace('+', '')), 2000, stat.value.includes('+'));
        }
      });

      function animateCount(element, target, duration, addPlus = false) {
        if (target === 0 || target === '24/7') {
          element.textContent = "24/7";
          return;
        }
        
        let start = 0;
        const increment = target / (duration / 16);
        
        const updateCount = () => {
          start += increment;
          if (start < target) {
            element.textContent = Math.floor(start).toLocaleString();
            requestAnimationFrame(updateCount);
          } else {
            element.textContent = target.toLocaleString() + (addPlus ? "+" : "");
          }
        };
        
        updateCount();
      }
    });
  </script>
  
  <?php include "footer.php"; ?>
</body>
</html>