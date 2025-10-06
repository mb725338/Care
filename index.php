<?php
session_start();
include "db.php";

// If already logged in, redirect to dashboards
if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if ($role === 'patient') {
        header("Location: patient/patient_dashboard.php");
    } elseif ($role === 'doctor') {
        header("Location: doctor/doctor_dashboard.php");
    } elseif ($role === 'admin') {
        header("Location: Admin/admin_dashboard.php");
    }
    exit();
}

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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CARE — Compassionate Health, Modern Tech</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  <!-- NAV + HERO + CONTENT stays the same -->
   <?php include "navbar.php"; ?>

<!-- HERO -->
  <header class="hero position-relative py-5 py-lg-6">
    <div class="blob" aria-hidden="true"></div>
    <div class="container position-relative">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <span class="hero-badge mb-3" data-aos="zoom-in" data-aos-delay="50">
            <i class="bi bi-shield-check me-1"></i> Trusted care, human touch
          </span>
          <h1 class="display-4 fw-bold mb-3">
            Compassion meets <span class="text-success">innovation</span> for better health
          </h1>
          <p class="sub mb-4">
            Book appointments, manage records, and chat with verified doctors — all in one serene, secure place.
          </p>
          <div class="btn-group" data-aos="fade-up" data-aos-delay="200">
            <a class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#authModal">Create your account</a>
            <a href="#features" class="btn btn-ghost btn-lg">Explore features</a>
          </div>
          <div class="d-flex align-items-center gap-3 mt-4" data-aos="fade-up" data-aos-delay="300">
            <div class="d-flex">
              <img class="avatar" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop" alt="User 1"/>
              <img class="avatar ms-n2" src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=200&auto=format&fit=crop" alt="User 2"/>
              <img class="avatar ms-n2" src="https://images.unsplash.com/photo-1546525848-3ce03ca516f6?q=80&w=200&auto=format&fit=crop" alt="User 3"/>
            </div>
            <small class="text-muted">10k+ patients onboarded</small>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="position-relative">
            <img class="img-fluid rounded-4 shadow" src="photo1.avif" alt="Doctor consulting patient" />
            <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill text-bg-light p-3 glass" style="--bs-bg-opacity:.9;">
              <i class="bi bi-activity me-2 text-success"></i>
              <span class="fw-semibold">Real-time vitals</span>
            </div>
            <div class="position-absolute bottom-0 end-0 translate-middle badge rounded-pill text-bg-light p-3 glass">
              <i class="bi bi-chat-dots me-2 text-info"></i>
              <span class="fw-semibold">24/7 chat</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

<section id="search-doctors" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Find a Doctor</h2>
    <form action="search.php" method="GET" class="row g-3 justify-content-center">
      <div class="col-md-4">
        <input type="text" name="specialization" class="form-control" placeholder="Specialization (e.g. Cardiologist)" required>
      </div>
      <div class="col-md-4">
        <input type="text" name="city" class="form-control" placeholder="City (e.g. Karachi)" required>
      </div>
      <div class="col-md-2">
        <button type="submit" id="ab" class="btn btn-primary w-100">Search</button>
      </div>
    </form>
  </div>
</section>

<!-- FEATURES -->
  <section id="features" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <div class="eyebrow" data-aos="fade-up">Core features</div>
        <h2 class="display-6 fw-bold" data-aos="fade-up" data-aos-delay="50">Everything your care journey needs</h2>
        <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Fast, secure, and thoughtfully designed for patients and providers.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
          <div class="p-4 feature-card h-100">
            <div class="icon-pill mb-3"><i class="bi bi-calendar2-check fs-5"></i></div>
            <h5 class="fw-bold">One-tap bookings</h5>
            <p class="text-muted">Schedule, reschedule, and get smart reminders without the back-and-forth.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 feature-card h-100">
            <div class="icon-pill mb-3"><i class="bi bi-file-earmark-medical fs-5"></i></div>
            <h5 class="fw-bold">Digital records</h5>
            <p class="text-muted">Your prescriptions, reports, and history — encrypted and always available.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
          <div class="p-4 feature-card h-100">
            <div class="icon-pill mb-3"><i class="bi bi-shield-lock fs-5"></i></div>
            <h5 class="fw-bold">Privacy-first</h5>
            <p class="text-muted">We follow strict security standards to keep your data safe.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
          <div class="p-4 feature-card h-100">
            <div class="icon-pill mb-3"><i class="bi bi-heart-pulse fs-5"></i></div>
            <h5 class="fw-bold">Smart insights</h5>
            <p class="text-muted">Visualize trends in vitals and habits to stay ahead of issues.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section id="how" class="py-5">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6 order-lg-2" data-aos="fade-left">
          <img class="img-fluid rounded-4 shadow" src="photo2.webp" alt="Using app" />
        </div>
        <div class="col-lg-6">
          <div class="eyebrow mb-2" data-aos="fade-up">In 3 simple steps</div>
          <h3 class="fw-bold display-6 mb-4" data-aos="fade-up" data-aos-delay="50">From sign-up to check-up in minutes</h3>

          <div class="step mb-4" data-step="1" data-aos="fade-up" data-aos-delay="100">
            <h5 class="fw-bold mb-1">Create your profile</h5>
            <p class="text-muted mb-0">Tell us about you and your preferences. We’ll personalize your care dashboard.</p>
          </div>
          <div class="step mb-4" data-step="2" data-aos="fade-up" data-aos-delay="150">
            <h5 class="fw-bold mb-1">Book an appointment</h5>
            <p class="text-muted mb-0">Pick a specialist, time, and mode — in-person or online.</p>
          </div>
          <div class="step" data-step="3" data-aos="fade-up" data-aos-delay="200">
            <h5 class="fw-bold mb-1">Stay on track</h5>
            <p class="text-muted mb-0">Smart reminders and insights keep your health routine consistent.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- STATS / PROOF -->
<section class="py-5" id="stats">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="p-4 stat text-center">
          <div class="display-5 fw-extrabold" data-target="98.7" data-suffix="%">98.8%</div>
          <div class="text-muted">Appointment satisfaction</div>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="p-4 stat text-center">
          <div class="display-5 fw-extrabold" data-target="10000" data-suffix="+">10k+</div>
          <div class="text-muted">Active patients</div>
        </div>
      </div>
      <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="p-4 stat text-center">
          <div class="display-5 fw-extrabold" data-target="1200" data-suffix="+">1,200+</div>
          <div class="text-muted">Verified doctors</div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- TESTIMONIALS -->
  <section id="testimonials" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <div class="eyebrow">Real stories</div>
        <h2 class="display-6 fw-bold">People love CARE</h2>
      </div>

      <div class="row g-4">
        <div class="col-md-6" data-aos="fade-up">
          <div class="p-4 feature-card h-100">
            <div class="d-flex align-items-center gap-3 mb-3">
              <img class="avatar" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop" alt="Ayesha" />
              <div>
                <div class="fw-bold">Ayesha K.</div>
                <small class="text-muted">Karachi</small>
              </div>
            </div>
            <p class="quote mb-0">“Booking a gynecologist took 30 seconds. Loved the reminders and clean UI!”</p>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="p-4 feature-card h-100">
            <div class="d-flex align-items-center gap-3 mb-3">
              <img class="avatar" src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=200&auto=format&fit=crop" alt="Ahmed" />
              <div>
                <div class="fw-bold">Ahmed R.</div>
                <small class="text-muted">Lahore</small>
              </div>
            </div>
            <p class="quote mb-0">“Finally all my lab reports and prescriptions are in one place. Super secure.”</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="cta" class="py-5">
    <div class="container">
      <div class="p-5 p-md-6 feature-card">
        <div class="row align-items-center g-4">
          <div class="col-lg-8">
            <h3 class="fw-bold mb-2">Start your CARE journey today</h3>
            <p class="text-muted mb-0">Early users get priority support and a welcome pack.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="#contact" class="btn btn-brand btn-lg">Join the waitlist</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- CONTACT -->
<section id="contact" class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="eyebrow mb-2">Contact</div>
        <h3 class="fw-bold mb-3">We’re here to help</h3>
        <p class="text-muted">Have questions about features, pricing, or partnerships? Send us a message.</p>

        <!-- Contact Form -->
        <form id="contactForm" class="row g-3" novalidate>
          <div class="col-md-6">
            <label class="form-label">First name</label>
            <input type="text" id="firstName" class="form-control" required pattern="[A-Za-z]+">
            <div class="invalid-feedback">Please enter a valid first name (A-Z only)</div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Last name</label>
            <input type="text" id="lastName" class="form-control" required pattern="[A-Za-z]+">
            <div class="invalid-feedback">Please enter a valid last name (A-Z only)</div>
          </div>
          <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" id="email" class="form-control" required>
            <div class="invalid-feedback">Please enter a valid email</div>
          </div>
          <div class="col-12">
            <label class="form-label">Phone</label>
            <input type="tel" id="phone" class="form-control" required pattern="^03[0-9]{9}$">
            <div class="invalid-feedback">Please enter a valid 11-digit phone number (e.g., 03001234567)</div>
          </div>
          <div class="col-12">
            <label class="form-label">Message</label>
            <textarea id="message" class="form-control" rows="4" required></textarea>
            <div class="invalid-feedback">Please write your message</div>
          </div>
          <div class="col-12">
            <button class="btn btn-brand btn-lg" type="submit">Send message</button>
          </div>
        </form>

        <!-- Custom Alert -->
         
        <div id="successAlert" class="custom-alert d-none">
          <div class="alert-content">
            <br><br>
            <h5 class="fw-bold">✅ Thank you for reaching out!</h5>
            <p>Your message has been successfully sent, and we care about your concerns. Our team will get back to you within 24 hours.</p>
            <button class="btn btn-sm btn-outline-light mt-2" onclick="closeAlert()">Close</button>
          </div>
        </div>
      </div>

            <!-- Right Side -->
        <div class="col-lg-6">
          <div class="p-4 feature-card h-100">
            <h5 class="fw-bold mb-3">Why choose CARE?</h5>
            <ul class="list-unstyled m-0">
              <li class="d-flex align-items-start gap-2 mb-3"><i class="bi bi-check2-circle mt-1"></i> Seamless UX optimized for speed</li>
              <li class="d-flex align-items-start gap-2 mb-3"><i class="bi bi-check2-circle mt-1"></i> Localized for Pakistan (PKR, 24-hour time, Urdu-ready)</li>
              <li class="d-flex align-items-start gap-2 mb-3"><i class="bi bi-check2-circle mt-1"></i> Accessibility-first, keyboard-friendly</li>
              <li class="d-flex align-items-start gap-2 mb-3"><i class="bi bi-check2-circle mt-1"></i> Mobile-first with offline-friendly patterns</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php include "footer.php"; ?>
  </footer>

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

<script>
  // ---------------- AOS Initialization ----------------
  AOS.init({ duration: 700, once: true, easing: 'ease-out-cubic' });

  // ---------------- Dynamic Year ----------------
  document.getElementById('y').textContent = new Date().getFullYear();

  // ---------------- Bootstrap Form Validation ----------------
  (() => {
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();

  // ---------------- GSAP Animations ----------------
  window.addEventListener('DOMContentLoaded', () => {
    const tl = gsap.timeline();

    tl.from('.navbar', {y: -40, opacity: 0, duration: 0.6, ease: 'power3.out'})
      .from('.hero h1', {y: 30, opacity: 0, duration: 0.6, ease: 'power3.out'}, '-=0.2')
      .from('.hero .sub', {y: 20, opacity: 0, duration: 0.6, ease: 'power3.out'}, '-=0.35')
      .from('.hero .btn-brand', {y: 20, opacity: 0, duration: 0.5, ease: 'power3.out'}, '-=0.4')
      .from('.hero .btn-ghost', {y: 20, opacity: 0, duration: 0.5, ease: 'power3.out'}, '-=0.45')
      .set('.hero h1, .hero .sub, .hero .btn-brand, .hero .btn-ghost', {opacity: 1});

    // Floating blob animation
    gsap.to('.blob', {
      scale: 1.06,
      xPercent: 2,
      yPercent: -1,
      rotate: 3,
      duration: 10,
      repeat: -1,
      yoyo: true,
      ease: 'sine.inOut'
    });

    // Hero badges
    document.querySelectorAll('.hero .badge').forEach((b, i) => {
      gsap.from(b, {
        y: -20,
        opacity: 0,
        duration: 0.8,
        delay: 0.6 + i * 0.1,
        ease: 'power3.out'
      });
    });

    // Scroll-trigger feature cards
    gsap.utils.toArray('.feature-card').forEach((card, i) => {
      gsap.from(card, {
        scrollTrigger: {
          trigger: card,
          start: 'top 85%',
          toggleActions: 'play none none none'
        },
        y: 30,
        opacity: 0,
        duration: 0.6,
        ease: 'power2.out',
        delay: (i % 4) * 0.03
      });
    });
  });

  // ---------------- Auto-open modal if there are PHP errors ----------------
  <?php if (!empty($login_errors)): ?>
    new bootstrap.Modal(document.getElementById('authModal')).show();
    document.getElementById('login-tab').click();
  <?php elseif (!empty($signup_errors) || !empty($signup_success)): ?>
    new bootstrap.Modal(document.getElementById('authModal')).show();
    document.getElementById('signup-tab').click();
  <?php endif; ?>


  //======================= STATS JS========================//
/* ------------------ Stats counter  ------------------ */
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll("#stats .fw-extrabold");
  if (!counters.length) return;

  const easeOutCubic = t => 1 - Math.pow(1 - t, 3);

  const animateCounter = (el, duration = 2000) => {
    // avoid re-running
    if (el.dataset.animated === "true") return;

    // Read target and suffix
    const rawTarget = el.getAttribute("data-target") ?? el.textContent.replace(/[^0-9.]/g, "");
    const target = parseFloat(String(rawTarget).replace(/,/g, "")) || 0;
    const suffixAttr = el.getAttribute("data-suffix");
    const suffix = suffixAttr !== null ? suffixAttr : (el.textContent.replace(/[\d.,\s-]/g, "") || "");

    const hasDecimal = String(rawTarget).includes(".");
    const start = 0;
    const startTime = performance.now();

    const formatValue = (v) => {
      if (hasDecimal) return v.toFixed(1);
      return Math.floor(v).toLocaleString();
    };

    const tick = (now) => {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeOutCubic(progress);
      const current = start + (target - start) * eased;

      el.textContent = formatValue(current) + suffix;

      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        // Ensure exact final value
        el.textContent = (hasDecimal ? target.toFixed(1) : Math.round(target).toLocaleString()) + suffix;
        el.dataset.animated = "true";
      }
    };

    requestAnimationFrame(tick);
  };

  const statsSection = document.querySelector("#stats");
  if (!statsSection) return;

  const onVisible = () => {
    counters.forEach(c => {
      const dur = parseInt(c.getAttribute("data-duration")) || 2000;
      animateCounter(c, dur);
    });
  };

  // If already visible on load (e.g., short pages), animate immediately
  const rect = statsSection.getBoundingClientRect();
  if (rect.top < window.innerHeight && rect.bottom > 0) {
    onVisible();
    return;
  }

  // Otherwise use IntersectionObserver
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        onVisible();
        obs.disconnect();
      }
    });
  }, { threshold: 0.2 });

  observer.observe(statsSection);
});



// CONTACT US ALERT BOX
    const form = document.getElementById('contactForm');
  const alertBox = document.getElementById('successAlert');

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      return;
    }

    // Show custom alert
    alertBox.classList.remove('d-none');

    // Reset form
    form.reset();
    form.classList.remove('was-validated');
  });

  function closeAlert() {
    alertBox.classList.add('d-none');
  }
</script>
</body>
</html>





