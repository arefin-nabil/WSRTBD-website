<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Our Rescuers - WSRTBD</title>
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

    .hero-rescuers {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url("https://files.binarybardbd.com/Snakesbd/imgs/non/1_ratsnake1.jpg");
      background-size: cover;
      background-position: center;
      padding: 120px 0;
      color: white;
      text-align: center;
    }

    .search-box {
      max-width: 600px;
      margin: 0 auto;
    }

    .table-responsive {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .table thead {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white;
    }

    .table thead th {
      text-align: center;
      border: none;
      font-weight: 600;
      padding: 15px;
    }

    .table tbody tr {
      transition: background-color 0.3s;
    }

    .table tbody tr:hover {
      background-color: #f8f9fa;
    }

    .table td {
      vertical-align: middle;
      text-align: center;
      padding: 15px;
    }

    .rescuer-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #005600;
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

    .pagination {
      justify-content: center;
      margin-top: 20px;
    }

    .loading {
      text-align: center;
      padding: 40px;
    }

    .no-results {
      text-align: center;
      padding: 40px;
      color: #6c757d;
    }
  </style>
</head>

<body>
  <!-- HERO SECTION -->
  <section class="hero-rescuers">
    <div class="container">
      <h1 class="display-4 fw-bold">আমাদের সার্টিফাইড রেস্কিউয়ারগণ</h1>
      <p class="lead mb-4">
        সমগ্র দেশ ব্যাপী আমাদের যেসকল প্রশিক্ষিত ও সার্টিফাইড হিরো গন নিরলস
        ভাবে প্রাণ ও প্রকৃতির সুরক্ষায় কাজ করে যাচ্ছেন তাদের তালিকা
      </p>
      <div class="search-box">
        <div class="input-group input-group-lg">
          <input
            type="text"
            id="searchInput"
            class="form-control"
            placeholder="Search by name, district or phone..." />
          <button class="btn btn-success" type="button" id="searchBtn">
            <i class="bi bi-search"></i> Search
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- FILTER SECTION -->
  <section class="py-5" style="background-color: #f5f5dc">
    <div class="container">
      <!-- RESCUERS TABLE -->
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th></th>
              <th>নাম</th>
              <th>ঠিকানা</th>
              <th>মোবাইল</th>
            </tr>
          </thead>
          <tbody id="rescuerTableBody">
            <tr>
              <td colspan="4" class="loading">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading rescuers...</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <nav id="paginationContainer" style="display: none;">
        <ul class="pagination" id="pagination"></ul>
      </nav>

      <!-- Per Page Selector -->
      <div class="text-center mt-3">
        <label for="perPageSelect" class="me-2">Show per page:</label>
        <select id="perPageSelect" class="form-select d-inline-block w-auto">
          <option value="5">5</option>
          <option value="10" selected>10</option>
          <option value="25">25</option>
          <option value="50">50</option>
        </select>
      </div>

      <!-- Stats Section -->
      <div class="row g-4 mt-4">
        <div class="col-md-3">
          <div class="text-center p-3 bg-primary text-white rounded">
            <h3 class="fw-bold mb-0" id="totalRescuers">0</h3>
            <p class="mb-0">Total Rescuers</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-3 bg-success text-white rounded">
            <h3 class="fw-bold mb-0">64</h3>
            <p class="mb-0">Districts Covered</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-3 bg-warning text-white rounded">
            <h3 class="fw-bold mb-0">24/7</h3>
            <p class="mb-0">Emergency Service</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-3 bg-danger text-white rounded">
            <h3 class="fw-bold mb-0">1.2K+</h3>
            <p class="mb-0">Rescues Done</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BECOME A RESCUER CTA -->
  <section class="py-5 bg-success text-white text-center">
    <div class="container">
      <h2 class="fw-bold mb-3">আমাদের টিমে যুক্ত হতে চান?</h2>
      <p class="lead mb-4">
        দীর্ঘ মেয়াদী শিক্ষা ও হাতে কলমে প্রশিক্ষিত হয়ে ও সার্টিফাইড সদস্য
        হিসাবে আপনার এলাকার জীববৈচিত্র রক্ষায় কাজ করতে চাইলে এখনি নিচের বাটনে
        ক্লিক করুন
      </p>
      <a href="signup.html" class="btn btn-light btn-lg">Apply Now</a>
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

          <!-- ERROR MESSAGE (Initially hidden) -->
          <p id="loginError" class="text-danger text-center mb-2" style="display: none;"></p>

          <!-- Login Form -->
          <form id="loginForm">
            <div class="mb-3">
              <label class="form-label fw-semibold">Email or Phone Number</label>
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
              <a href="signup.html" class="fw-semibold text-decoration-none">
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

  <!-- RESCUER DATA LOADING SCRIPT -->
  <script>
    let currentPage = 1;
    let currentPerPage = 10;
    let currentSearch = '';

    function loadRescuers(page = 1, perPage = 10, search = '') {
      const tbody = document.getElementById('rescuerTableBody');
      const pagination = document.getElementById('pagination');
      const paginationContainer = document.getElementById('paginationContainer');

      // Show loading
      tbody.innerHTML = `
        <tr>
          <td colspan="4" class="loading">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Loading rescuers...</p>
          </td>
        </tr>
      `;

      fetch(`rescuer_data.php?page=${page}&per_page=${perPage}&q=${encodeURIComponent(search)}`)
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

          tbody.innerHTML = '';

          if (data.rows.length === 0) {
            tbody.innerHTML = `
              <tr>
                <td colspan="4" class="no-results">
                  <i class="bi bi-search" style="font-size: 3rem; color: #ccc;"></i>
                  <p class="mt-2">No rescuers found</p>
                </td>
              </tr>
            `;
            paginationContainer.style.display = 'none';
            return;
          }

          // Populate table
          data.rows.forEach(rescuer => {
            const row = document.createElement('tr');
            row.innerHTML = `
              <td>
                <img src="${rescuer.photo || 'https://via.placeholder.com/50'}" 
                     class="rescuer-img" 
                     onerror="this.src='https://via.placeholder.com/50'" />
              </td>
              <td><strong>${rescuer.full_name}</strong></td>
              <td>${rescuer.district}</td>
              <td>${rescuer.phone}</td>
            `;
            tbody.appendChild(row);
          });

          // Update total count
          document.getElementById('totalRescuers').textContent = data.total;

          // Generate pagination
          pagination.innerHTML = '';
          if (data.total_pages > 1) {
            paginationContainer.style.display = 'block';

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${data.page === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" data-page="${data.page - 1}">Previous</a>`;
            pagination.appendChild(prevLi);

            // Page numbers
            for (let i = 1; i <= data.total_pages; i++) {
              if (
                i === 1 ||
                i === data.total_pages ||
                (i >= data.page - 2 && i <= data.page + 2)
              ) {
                const li = document.createElement('li');
                li.className = `page-item ${i === data.page ? 'active' : ''}`;
                li.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
                pagination.appendChild(li);
              } else if (
                i === data.page - 3 ||
                i === data.page + 3
              ) {
                const li = document.createElement('li');
                li.className = 'page-item disabled';
                li.innerHTML = `<span class="page-link">...</span>`;
                pagination.appendChild(li);
              }
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${data.page === data.total_pages ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" data-page="${data.page + 1}">Next</a>`;
            pagination.appendChild(nextLi);
          } else {
            paginationContainer.style.display = 'none';
          }
        })
        .catch(err => {
          console.error('Error loading rescuers:', err);
          tbody.innerHTML = `
            <tr>
              <td colspan="4" class="text-center text-danger p-4">
                <i class="bi bi-exclamation-triangle" style="font-size: 2rem;"></i>
                <p class="mt-2"><strong>Error loading rescuers:</strong></p>
                <p class="small">${err.message}</p>
                <button class="btn btn-sm btn-primary mt-2" onclick="loadRescuers(${currentPage}, ${currentPerPage}, '${currentSearch}')">
                  Try Again
                </button>
              </td>
            </tr>
          `;
        });
    }

    // Event listeners
    document.getElementById('pagination').addEventListener('click', function(e) {
      e.preventDefault();
      if (e.target.tagName === 'A' && e.target.dataset.page) {
        const page = parseInt(e.target.dataset.page);
        if (page > 0) {
          currentPage = page;
          loadRescuers(currentPage, currentPerPage, currentSearch);
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }
      }
    });

    document.getElementById('perPageSelect').addEventListener('change', function() {
      currentPerPage = parseInt(this.value);
      currentPage = 1;
      loadRescuers(currentPage, currentPerPage, currentSearch);
    });

    document.getElementById('searchBtn').addEventListener('click', function() {
      currentSearch = document.getElementById('searchInput').value.trim();
      currentPage = 1;
      loadRescuers(currentPage, currentPerPage, currentSearch);
    });

    document.getElementById('searchInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        document.getElementById('searchBtn').click();
      }
    });

    // Load initial data
    loadRescuers();
  </script>

</body>

</html>