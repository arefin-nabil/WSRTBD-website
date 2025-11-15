  <?php include 'header.php'; ?>
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

    <!-- EXECUTIVE BOARD -->
    <section class="py-5" style="background-color: #fffff0">
      <div class="container">
        <h2 class="text-center fw-bold mb-5">পরিচালক পরিষদ</h2>
        <div class="row g-4 justify-content-center">
          <!-- President -->
          <div class="col-lg-4 col-md-6">
            <div class="member-card shadow">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/mdshahjahan.jpg"
                class="member-img"
                alt="President" />
              <div class="card-body text-center p-4">
                <h4 class="fw-bold mb-2">মোঃ শাহজাহান মিয়া</h4>
                <span class="role-badge">পরিচালক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Vice President -->
          <div class="col-lg-4 col-md-6">
            <div class="member-card shadow">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/ismailfeni.jpg"
                class="member-img"
                alt="Vice President" />
              <div class="card-body text-center p-4">
                <h4 class="fw-bold mb-2">মোঃ ইসমাইল হোসাইন</h4>
                <span class="role-badge">পরিচালক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BOARD MEMBERS -->
    <section class="py-5" style="background-color: #fcf5e5">
      <div class="container">
        <h2 class="text-center fw-bold mb-5">কার্যনির্বাহী পরিষদ</h2>
        <div class="row g-4">
          <!-- Treasurer -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/ferdousalam.jpg"
                class="member-img"
                alt="Treasurer" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">ফেরদৌস আলম</h5>
                <span class="role-badge">সভাপতি </span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Training Director -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/dedarulalam.jpg"
                class="member-img"
                alt="Training Director" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মোঃ দিদারুল আলম</h5>
                <span class="role-badge">সহ-সভাপতি</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Communications Director -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/lejanahmedpranto.jpg"
                class="member-img"
                alt="Communications" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">লিজেন আহমেদ প্ৰান্ত</h5>
                <span class="role-badge">সহ-সভাপতি</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Technical Director -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/nazrulislamfeni.jpg"
                class="member-img"
                alt="Technical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নজরুল ইসলাম</h5>
                <span class="role-badge">সাধারণ সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Regional Coordinator - Dhaka -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/naimulislamniloy.jpg"
                class="member-img"
                alt="Regional" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নাইমুল ইসলাম নিলয়</h5>
                <span class="role-badge">যুগ্ম সাধারণ সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Regional Coordinator - Chittagong -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/nabidaljubayer.jpg"
                class="member-img"
                alt="Regional" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">সাজিদুল ইসলাম</h5>
                <span class="role-badge">সাংগঠনিক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Legal Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Legal" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">আবু বক্কর সিদ্দিক</h5>
                <span class="role-badge">সহ- সাংগঠনিক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মোঃ ইমরান মিয়া</h5>
                <span class="role-badge">অর্থ সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/zayedhossaintamim.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">যায়েদ হোসেন তামিম</h5>
                <span class="role-badge">সহ - অর্থ সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/ahmedshakilrangpur.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">শাকিল খান</h5>
                <span class="role-badge">দপ্তর সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/raselalam.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">রাসেল আলম</h5>
                <span class="role-badge">সহ দপ্তর সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/mahmudulhasanshohel.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মাহমুদুল হাসান সোহেল</h5>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <p class="text-muted mt-3 small">
                  Veterinary expert for wildlife health and safety.
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">সাদেকুল কবির</h5>
                <span class="role-badge">প্রচার ও প্রকাশনা বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/rejaulkarimrakib.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">রেজাউল করমি রাকিব</h5>
                <span class="role-badge">সমাজ কল্যাণ সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/nahidaljubayer.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নাহিদ আল জুবায়ের</h5>
                <span class="role-badge">শিক্ষা বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/adnanmim.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মাহী আদনান মিম</h5>
                <span class="role-badge">আইন বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/nafiulislampeyas.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নাফিউল ইসলাম পিয়াস</h5>
                <span class="role-badge">তথ্য ও গবেষণা সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মোঃ জাহিদুল ইসলাম</h5>
                <span class="role-badge">স্বাস্থ্য ও চিকিৎসা বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/womanx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">দিলারা চৌধুরী</h5>
                <span class="role-badge">মহিলা ও শিশু বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/womanx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">সাঈদা বিনতে হোসাইন</h5>
                <span class="role-badge">মহিলা ও শিশু বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/nasibabdullah.jpg"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নাসিব আব্দুল্লাহ</h5>
                <span class="role-badge">পরিবেশ বিষয়ক সম্পাদক</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মোঃ হাবিবুল বাশার</h5>
                <span class="role-badge">নির্বাহী সদস্য</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">মোঃ মাকসুদুর রহমান</h5>
                <span class="role-badge">নির্বাহী সদস্য</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Medical Advisor -->
          <div class="col-lg-3 col-md-6">
            <div class="member-card shadow-sm">
              <img
                src="https://files.binarybardbd.com/Snakesbd/imgs/rescuer/manx.png"
                class="member-img"
                alt="Medical" />
              <div class="card-body text-center p-3">
                <h5 class="fw-bold mb-2">নোমান হোসাইন</h5>
                <span class="role-badge">নির্বাহী সদস্য</span>
                <p class="text-muted mt-3 small">
                  ওয়াইল্ডলাইফ অ্যান্ড স্নেক রেস্কিউ টিম ইন বাংলাদেশ
                </p>
                <div class="social-links">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-envelope-fill"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ADVISORY COUNCIL -->
    <section class="py-5" style="background-color: #eeeff9">
      <div class="container">
        <h2 class="text-center fw-bold mb-4">উপদেষ্টা মন্ডলী</h2>
        <div class="row g-4 justify-content-center">
          <!-- ------------ -->
          <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center p-4">
                <div class="mb-3">
                  <i
                    class="bi bi-person-badge text-primary"
                    style="font-size: 3rem"></i>
                </div>
                <h5 class="fw-bold">রথিন্দ্র বিশ্বাস</h5>
                <p class="text-muted small">
                  বন্যপ্রাণী ও জীব বৈচিত্র সংরক্ষণ কর্মকর্তা, ঢাকা।
                </p>
              </div>
            </div>
          </div>
          <!-- ------------ -->
          <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center p-4">
                <div class="mb-3">
                  <i
                    class="bi bi-person-badge text-success"
                    style="font-size: 3rem"></i>
                </div>
                <h5 class="fw-bold">সোহেল রানা সৈকত</h5>
                <p class="text-muted small">
                  হারপেটোলজিস্ট ওয়াইল্ডলাইফ সেন্টার, গাজীপুর।
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center p-4">
                <div class="mb-3">
                  <i
                    class="bi bi-person-badge text-info"
                    style="font-size: 3rem"></i>
                </div>
                <h5 class="fw-bold">অধ্যাপক ড. আবুল হোসেন মন্ডল</h5>
                <p class="text-muted small">
                  বিভাগীয় প্রধান, প্রাণীবিদ্যা বিভাগ<br />কারমাইকেল কলেজ, রংপুর।
                </p>
              </div>
            </div>
          </div>
          <!-- ------------ -->
          <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center p-4">
                <div class="mb-3">
                  <i
                    class="bi bi-person-badge text-center"
                    style="font-size: 3rem"></i>
                </div>
                <h5 class="fw-bold">রাজিউর রহমান রাজু</h5>
                <p class="text-muted small">পঞ্চগড় প্রতিনিধি, প্রথম আলো।</p>
              </div>
            </div>
          </div>
          <!-- ------------ -->
          <!-- ------------ -->
          <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
              <div class="card-body text-center p-4">
                <div class="mb-3">
                  <i
                    class="bi bi-person-badge text-muted"
                    style="font-size: 3rem"></i>
                </div>
                <h5 class="fw-bold">নিশাত ইসলাম</h5>
                <p class="text-muted small">রংপুর ব্যুরো চিফ, সময় টিভি।</p>
              </div>
            </div>
          </div>
          <!-- ------------ -->
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
            <!-- UPDATED FORM -->
            <form id="loginForm" method="POST" action="rescuer_login.php">
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

              <div
                class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember" />
                  <label class="form-check-label small" for="remember">
                    Remember me
                  </label>
                </div>
                <a href="#" class="small text-decoration-none">Forgot Password?</a>
              </div>

              <button type="submit" class="btn btn-success w-100">Login</button>

              <p class="text-center mt-3 small">
                Don’t have an account?
                <a href="signup.html" class="fw-semibold text-decoration-none">
                  Register Now
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>