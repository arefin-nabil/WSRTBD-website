<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - WSRTBD</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link
    href="https://fonts.maateen.me/solaiman-lipi/font.css"
    rel="stylesheet" />

  <link rel="icon" type="image/png" href="/wsrtbd.png">


  <style>
    /* Custom Styles */
    body {
      font-family: "SolaimanLipi", sans-serif;
      padding-top: 66px;
    }

    .navbar-custom {
      background: linear-gradient(135deg, #006400 0%, #005600 100%);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
      color: white !important;
    }

    .dropdown-item:active,
    .dropdown-item:focus {
      background-color: #b8cfb5 !important;
      color: inherit !important;
    }

    .hero-about {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("https://files.binarybardbd.com/Snakesbd/imgs/mid/2_GreenCatsnake3.jpg");
      background-size: cover;
      background-position: center;
      padding: 120px 0;
      color: white;
      text-align: center;
    }

    .mission-card {
      border: none;
      border-radius: 15px;
      padding: 30px;
      height: 100%;
      transition: transform 0.3s;
    }

    .mission-card:hover {
      transform: translateY(-5px);
    }

    .timeline {
      position: relative;
      padding: 20px 0;
    }

    .timeline::before {
      content: "";
      position: absolute;
      left: 50%;
      top: 0;
      bottom: 0;
      width: 2px;
      background: #2a5298;
    }

    .timeline-item {
      margin-bottom: 50px;
      position: relative;
    }

    .timeline-content {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    footer {
      background: #1a1a2e;
    }

    footer h5 {
      color: #fff;
      font-weight: bold;
      margin-bottom: 20px;
    }

    footer a {
      color: #adb5bd;
      text-decoration: none;
      transition: color 0.3s;
    }

    footer a:hover {
      color: #fff;
    }

    @media (max-width: 768px) {
      .timeline::before {
        left: 20px;
      }
    }

    #loginError {
      background: #ffe3e3;
      border-left: 5px solid #ff4d4d;
      padding: 10px 14px;
      border-radius: 6px;
      font-weight: 500;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-6px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .stat-number {
      transition: all 0.3s ease;
    }
  </style>
</head>

<body>
  <!-- HERO SECTION -->
  <section class="hero-about">
    <div class="container">
      <h1 class="display-4 fw-bold">WSRTBD - সম্পর্কে</h1>
      <p class="lead">
        বন্যপ্রাণী সুরক্ষা, সংরক্ষন, সমৃদ্ধি - আমাদের মূলনীতি
      </p>
    </div>
  </section>

  <!-- WHO WE ARE -->
  <section class="py-5" style="background-color: #fff5ee">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4">
          <img
            src="wsrtbd.jpg"
            class="img-fluid rounded shadow"
            alt="wsrtbd-logo" />
        </div>
        <div class="col-lg-6">
          <h2 class="fw-bold mb-4">WSRTBD কী?</h2>
          <p class="text-muted">
            <b>ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেসকিউ টিম বাংলাদেশ (WSRTBD)</b> হলো
            বাংলাদেশের সবচেয়ে বড় সাপ ও বন্যপ্রাণী উদ্ধার সংস্থা। বন্যপ্রাণী ও
            মানুষের সহাবস্থান রক্ষা করার উদ্দেশ্যে প্রতিষ্ঠিত এই সংগঠন দেশের
            সব বিভাগে কাজ করে যাচ্ছে।
          </p>
          <p class="text-muted">
            আমাদের দলে রয়েছেন প্রশিক্ষিত ও সার্টিফাইড রেসকিউয়াররা, যারা ২৪
            ঘণ্টা কাজ করে জরুরি কল গ্রহণ করেন, মানুষের বসত এলাকা থেকে সাপ ও
            অন্যান্য বন্যপ্রাণী উদ্ধার করে নিরাপদে তাদের প্রাকৃতিক আবাসে
            ফিরিয়ে দেন।
          </p>
          <p class="text-muted">
            আমরা সহাবস্থানে বিশ্বাস করি এবং মানুষকে বন্যপ্রাণী সংরক্ষণ ও
            নিরাপদ আচরণ সম্পর্কে সচেতন করতে নিরলসভাবে কাজ করে যাচ্ছি
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION, VISION, VALUES -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">আমাদের মিশন, ভিশন ও মূল্যবোধ</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div
            class="mission-card shadow-sm"
            style="background-color: #daeaff">
            <div class="text-center mb-3">
              <i
                class="bi bi-bullseye text-primary"
                style="font-size: 3rem"></i>
            </div>
            <h4 class="text-center mb-3">আমাদের মিশন</h4>
            <p class="text-muted text-center">
              উদ্ধার, পুনর্বাসন এবং সচেতনতামূলক কাজের মাধ্যমে বন্যপ্রাণীকে
              রক্ষা করা এবং মানুষ ও প্রাণীর নিরাপদ সহাবস্থান নিশ্চিত করা।
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div
            class="mission-card shadow-sm"
            style="background-color: #d9ffdc">
            <div class="text-center mb-3">
              <i class="bi bi-eye text-success" style="font-size: 3rem"></i>
            </div>
            <h4 class="text-center mb-3">আমাদের ভিশন</h4>
            <p class="text-muted text-center">
              একটি বাংলাদেশ, যেখানে মানুষ ও বন্যপ্রাণী একসাথে শান্তিতে বসবাস
              করবে — প্রতিটি প্রাণী হবে মূল্যবান ও সুরক্ষিত।
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div
            class="mission-card shadow-sm"
            style="background-color: #ffdbdb">
            <div class="text-center mb-3">
              <i class="bi bi-heart text-danger" style="font-size: 3rem"></i>
            </div>
            <h4 class="text-center mb-3">আমাদের মূল্যবোধ</h4>
            <p class="text-muted text-center">
              সহানুভূতি, পেশাদারিত্ব, সমাজসেবা, সংরক্ষণ, এবং বন্যপ্রাণী ও
              মানুষের নিরাপত্তার প্রতি অঙ্গীকার।
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STATISTICS -->
  <section class="py-5 bg-success text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-3 mb-4">
          <h2 class="display-4 fw-bold stat-number" id="statRescuers">
            <div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </h2>
          <p>Certified Rescuers</p>
        </div>
        <div class="col-md-3 mb-4">
          <h2 class="display-4 fw-bold stat-number" id="statRescues">
            <div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </h2>
          <p>Rescues Completed</p>
        </div>
        <div class="col-md-3 mb-4">
          <h2 class="display-4 fw-bold stat-number" id="statDistricts">
            <div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </h2>
          <p>Districts Covered</p>
        </div>
        <div class="col-md-3 mb-4">
          <h2 class="display-4 fw-bold">24/7</h2>
          <p>Emergency Service</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>Contact Us</h5>
          <p><i class="bi bi-telephone"></i> Phone: +880 1722 938276</p>
          <p><i class="bi bi-envelope"></i> Email: wsrtbd@gmail.com</p>
          <p><i class="bi bi-geo-alt"></i> Address: Dhaka, Bangladesh</p>
        </div>
        <div class="col-md-4 mb-4">
          <h5>Follow Us</h5>
          <p>
            <a
              href="https://www.facebook.com/wsrtbd"
              class="text-light me-3"
              target="_blank"><i class="bi bi-facebook"></i> Facebook Page</a>
          </p>
          <p>
            <a
              href="https://www.facebook.com/groups/www.wsrtbd.epizy.co"
              class="text-light"
              target="_blank"><i class="bi bi-facebook"></i> Facebook Group</a>
          </p>
        </div>
        <div class="col-md-4 mb-4">
          <h5>Get Our App</h5>
          <a
            href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
            class="btn btn-success mb-2"
            target="_blank">Download App</a>
          <p class="small mt-2">Available on Android now.</p>
        </div>
      </div>
      <hr class="bg-light" />
      <div class="text-center small">
        &copy; 2025 Wildlife and Snake Rescue Team in Bangladesh (WSRTBD). All
        rights reserved.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Login Modal -->
  <div
    class="modal fade"
    id="loginModal"
    tabindex="-1"
    aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="loginModalLabel">Rescuer Login</h5>
          <button
            type="button"
            class="btn-close btn-close-white"
            data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body p-4">
          <p id="loginError" class="text-danger text-center mb-2" style="display: none;"></p>

          <form id="loginForm">
            <div class="mb-3">
              <label class="form-label fw-semibold">Email</label>
              <input
                type="text"
                id="loginIdentifier"
                name="email"
                class="form-control"
                placeholder="Enter email address"
                required />
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Password</label>
              <input
                type="password"
                id="loginPassword"
                name="password"
                class="form-control"
                placeholder="Enter password"
                required />
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" />
                <label class="form-check-label small" for="remember">
                  Remember me
                </label>
              </div>
              <a href="#" class="small text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>

            <p class="text-center mt-3 small">
              Don't have an account?
              <a href="signup.php" class="fw-semibold text-decoration-none">
                Register Now
              </a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- AJAX LOGIN SCRIPT -->
  <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("rescuer_login.php", {
          method: "POST",
          body: formData
        })
        .then(res => res.text())
        .then(response => {
          const errorBox = document.getElementById("loginError");
          response = response.trim();

          if (response === "success") {
            window.location.href = "profile.php";
          } else if (response === "invalid") {
            errorBox.style.display = "block";
            errorBox.textContent = "Wrong password!";
          } else if (response === "not_found") {
            errorBox.style.display = "block";
            errorBox.textContent = "Email not found!";
          } else {
            errorBox.style.display = "block";
            errorBox.textContent = "Unexpected error!";
          }
        });
    });
  </script>

  <!-- LOAD STATISTICS SCRIPT -->
  <script>
    function loadStats() {
      fetch('stats.php')
        .then(res => {
          if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
          }
          return res.json();
        })
        .then(data => {
          if (!data.success) {
            throw new Error(data.error || 'Failed to load statistics');
          }

          // Animate number counting
          function animateValue(element, start, end, duration, addPlus = true) {
            let startTimestamp = null;
            const step = (timestamp) => {
              if (!startTimestamp) startTimestamp = timestamp;
              const progress = Math.min((timestamp - startTimestamp) / duration, 1);
              const value = Math.floor(progress * (end - start) + start);
              element.textContent = addPlus ? value + '+' : value;
              if (progress < 1) {
                window.requestAnimationFrame(step);
              }
            };
            window.requestAnimationFrame(step);
          }

          // Update rescuers count with '+'
          const rescuersEl = document.getElementById('statRescuers');
          animateValue(rescuersEl, 0, data.total_rescuers, 1500);

          // Update rescues count with '+'
          const rescuesEl = document.getElementById('statRescues');
          animateValue(rescuesEl, 0, data.total_rescues, 1500);

          // Update districts count WITHOUT '+'
          const districtsEl = document.getElementById('statDistricts');
          animateValue(districtsEl, 0, 64, 1500, false);


        })
        .catch(err => {
          console.error('Error loading statistics:', err);
          // Show fallback values
          document.getElementById('statRescuers').textContent = '120+';
          document.getElementById('statRescues').textContent = '1.2K+';
          document.getElementById('statDistricts').textContent = '64';
        });
    }

    // Load stats on page load
    loadStats();
  </script>
</body>

</html>