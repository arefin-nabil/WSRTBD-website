<?php include 'header.php';
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Governing Board - WSRTBD</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link
    href="https://fonts.maateen.me/solaiman-lipi/font.css"
    rel="stylesheet" />
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

    .hero-board {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url("https://www.indiafilings.com/learn/wp-content/uploads/2018/12/Association-of-Persons.jpg");
      background-size: cover;
      background-position: center;
      padding: 120px 0;
      color: white;
      text-align: center;
    }

    .member-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
      background: white;
    }

    .member-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .member-img {
      height: 300px;
      width: 100%;
      object-fit: cover;
    }

    .role-badge {
      background: linear-gradient(135deg, #10b410 0%, #013d01 100%);
      color: white;
      padding: 8px 20px;
      border-radius: 50px;
      font-size: 0.9rem;
      display: inline-block;
      margin-top: 10px;
    }

    .social-links a {
      color: #2a5298;
      margin: 0 10px;
      font-size: 1.3rem;
      transition: color 0.3s;
    }

    .social-links a:hover {
      color: #1e3c72;
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

    .loading-container {
      text-align: center;
      padding: 60px 20px;
    }

    .spinner-border {
      width: 3rem;
      height: 3rem;
    }
  </style>
</head>

<body>

  <!-- HERO SECTION -->
  <section class="hero-board">
    <div class="container">
      <h1 class="display-4 fw-bold">WSRTBD কমিটি</h1>
      <p class="lead">
        WSRTBD সংগঠনের ২০২৫ সালের জন্য নির্বাচিত কমিটির উপদেষ্টা, পরিচালক ও
        কার্যনির্বাহী পরিষদের সদস্য বৃন্দ।
      </p>
    </div>
  </section>

  <!-- BOARD MEMBERS SECTION -->
  <section class="py-5" style="background-color: #fcf5e5">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">কমিটির সদস্যবৃন্দ</h2>

      <!-- Loading State -->
      <div id="loadingContainer" class="loading-container">
        <div class="spinner-border text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-3 text-muted">Loading board members...</p>
      </div>

      <!-- Members Container -->
      <div id="membersContainer" class="row g-4" style="display: none;"></div>

      <!-- Error Container -->
      <div id="errorContainer" class="text-center" style="display: none;">
        <i class="bi bi-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
        <p class="mt-3 text-danger" id="errorMessage"></p>
        <button class="btn btn-primary" onclick="loadMembers()">Try Again</button>
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
            class="btn btn-primary mb-2"
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
                placeholder="Enter email or phone"
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

  <!-- LOAD BOARD MEMBERS SCRIPT -->
  <script>
    function loadMembers() {
      const loadingContainer = document.getElementById('loadingContainer');
      const membersContainer = document.getElementById('membersContainer');
      const errorContainer = document.getElementById('errorContainer');

      // Show loading
      loadingContainer.style.display = 'block';
      membersContainer.style.display = 'none';
      errorContainer.style.display = 'none';

      fetch('governing_body_data.php')
        .then(res => {
          if (!res.ok) {
            throw new Error(`HTTP error! status: ${res.status}`);
          }
          return res.json();
        })
        .then(data => {
          if (!data.success) {
            throw new Error(data.error || 'Unknown error');
          }

          loadingContainer.style.display = 'none';
          membersContainer.style.display = 'flex';

          if (data.members.length === 0) {
            membersContainer.innerHTML = `
              <div class="col-12 text-center py-5">
                <i class="bi bi-people" style="font-size: 3rem; color: #ccc;"></i>
                <p class="mt-3 text-muted">No board members found</p>
              </div>
            `;
            return;
          }

          // Populate members
          membersContainer.innerHTML = '';
          data.members.forEach(member => {
            const col = document.createElement('div');
            col.className = 'col-lg-3 col-md-6';

            const photoUrl = member.photo || 'https://via.placeholder.com/300x300?text=' + encodeURIComponent(member.name);
            const detail = member.detail || 'ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ';

            col.innerHTML = `
              <div class="member-card shadow-sm">
                <img
                  src="${photoUrl}"
                  class="member-img"
                  onerror="this.src='https://via.placeholder.com/300x300?text=${encodeURIComponent(member.name)}'"
                  alt="${member.name}" />
                <div class="card-body text-center p-3">
                  <h5 class="fw-bold mb-2">${member.name}</h5>
                  ${member.designation ? `<span class="role-badge">${member.designation}</span>` : ''}
                  <p class="text-muted mt-3 small">${detail}</p>
                  <div class="social-links">
                    ${member.fblink ? `<a href="${member.fblink}" target="_blank"><i class="bi bi-facebook"></i></a>` : ''}
                    ${member.email ? `<a href="mailto:${member.email}"><i class="bi bi-envelope-fill"></i></a>` : ''}
                  </div>
                </div>
              </div>
            `;

            membersContainer.appendChild(col);
          });
        })
        .catch(err => {
          console.error('Error loading board members:', err);
          loadingContainer.style.display = 'none';
          errorContainer.style.display = 'block';
          document.getElementById('errorMessage').textContent =
            'Error loading board members: ' + err.message;
        });
    }

    // Load members on page load
    loadMembers();
  </script>

</body>

</html>