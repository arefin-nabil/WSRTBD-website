<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WSRTBD - Wildlife and Snake Rescue Team Bangladesh</title>

  <!-- Bootstrap 5 CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <!-- Bootstrap JS (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Icons -->
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
      z-index: 1050;
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

    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("https://files.binarybardbd.com/Snakesbd/imgs/mid/2_GreenCatsnake1.jpg");
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
    }

    .hero-content h1 {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-content p {
      font-size: 1.3rem;
      margin-bottom: 30px;
    }

    .hero-content .btn {
      margin: 5px;
      padding: 12px 30px;
      font-weight: 600;
      border-width: 2px;
    }

    .wildlife-section {
      background: #f8f9fa;
    }

    .wildlife-section h2 {
      font-weight: bold;
      color: #1e3c72;
      margin-bottom: 30px;
    }

    .card {
      border: none;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .toggle-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
      height: 250px;
      object-fit: cover;
    }

    .card-title {
      color: #003b00;
      text-align: center;
    }

    .card-text {
      text-align: justify;
    }

    .services-section {
      padding: 80px 0;
      background: white;
    }

    .services-section h2 {
      color: #1e3c72;
    }

    .service-card {
      background: white;
      border-radius: 15px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      border: 2px solid transparent;
    }

    .service-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
      border-color: #003b00;
    }

    .service-card .icon {
      font-size: 3rem;
      color: #003b00;
      margin-bottom: 20px;
    }

    .service-card h5 {
      font-weight: bold;
      color: #003b00;
      margin-bottom: 15px;
    }

    .faq-section {
      background: #f8f9fa;
    }

    .faq-section h2 {
      color: #1e3c72;
    }

    .accordion-button {
      font-weight: 600;
      color: #003b00;
    }

    .accordion-button:not(.collapsed) {
      background-color: #f8fff7;
      color: #2a7326;
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
      .hero-content h1 {
        font-size: 2rem;
      }

      .hero-content p {
        font-size: 1rem;
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
  </style>
</head>

<body>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Wildlife and Snake Rescue Team in Bangladesh</h1>
      <p style="font-size: 18px">
        বন্যপ্রাণী সুরক্ষা, সংরক্ষন, সমৃদ্ধি - আমাদের মূলনীতি। <br />
        আমরা বিশ্বাস করি, প্রতিটি প্রাণেরই বাঁচার অধিকার আছে।<br />
        বাংলাদেশের সবচেয়ে বড় সাপ ও বন্যপ্রাণী উদ্ধার সংগঠন হিসেবে আমরা
        প্রতিনিয়ত কাজ করছি মানুষ ও বন্যপ্রাণীর নিরাপদ সহাবস্থানের জন্য।
      </p>
      <a href="contact.php" class="btn btn-danger btn-lg">Request for Rescue</a>
      <a href="rescuers.php" class="btn btn-warning btn-lg">Find Rescuer</a>
      <a
        href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
        target="_blank"
        class="btn btn-success btn-lg">Mobile App</a>
    </div>
  </section>

  <!-- Wildlife Section -->
  <section class="wildlife-section py-5" style="background-color: #fffff0">
    <div class="container">
      <h2 class="text-center mb-5">বাংলাদেশের বন্যপ্রাণী</h2>
      <div class="row g-4">
        <!-- Card 1 - Reptiles -->
        <div class="col-md-4">
          <div
            class="card h-100 shadow-sm toggle-card"
            data-bs-toggle="collapse"
            data-bs-target="#reptiles"
            aria-expanded="false"
            style="cursor: pointer; background-color: #e1ffe1">
            <img
              src="https://files.binarybardbd.com/Snakesbd/imgs/non/3_greenratsnake1.jpg"
              class="card-img-top"
              alt="Reptiles" />
            <div class="card-body">
              <h5 class="card-title fw-semibold">সরীসৃপ</h5>
              <p class="card-text text-muted">
                বাংলাদেশে বিভিন্ন ধরনের সরীসৃপ রয়েছে, যার মধ্যে রয়েছে কুমির,
                কচ্ছপ, টিকটিকি এবং সাপ। বাংলাদেশে মোট ১২৬ প্রজাতির সরীসৃপ
                রয়েছে, যার মধ্যে ১০৯টি স্থলজ এবং ১৭টি সামুদ্রিক প্রজাতি।
              </p>
              <div class="collapse" id="reptiles">
                <p class="card-text text-muted">
                  কুমির: বাংলাদেশে দুই ধরনের কুমির রয়েছে। <br />
                  কচ্ছপ ও কাছিম: এই দুই ধরনের মোট ২১টি প্রজাতি রয়েছে। <br />
                  টিকটিকি: ১৮ প্রজাতির টিকটিকি দেখা যায়। <br />
                  সাপ: বাংলাদেশে ৬৭ প্রজাতির সাপ রয়েছে।
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 - Birds -->
        <div class="col-md-4">
          <div
            class="card h-100 shadow-sm toggle-card"
            data-bs-toggle="collapse"
            data-bs-target="#birds"
            aria-expanded="false"
            style="cursor: pointer; background-color: #e0ebff">
            <img
              src="https://www.birdlist.org/images/nature_pictures/birds/oriental_magpie_robin.jpg"
              class="card-img-top"
              alt="Birds" />
            <div class="card-body">
              <h5 class="card-title fw-semibold">পাখি</h5>
              <p class="card-text text-muted">
                বাংলাদেশে অনেক ধরনের পাখি দেখা যায়, যার মধ্যে দোয়েল, কোকিল,
                ময়না, টিয়া, শালিক, চড়ুই, মাছরাঙা, বুলবুলি এবং বাবুই
                উল্লেখযোগ্য। বাংলাদেশে প্রায় ৭৪৪ প্রজাতির পাখি রয়েছে, যদিও
                কিছু প্রজাতি এখন বিলুপ্ত বা বিপন্ন।
              </p>
              <div class="collapse" id="birds">
                <p class="card-text text-muted">
                  দোয়েল: বাংলাদেশের জাতীয় পাখি, যা সুন্দর গানের জন্য পরিচিত।
                  <br />
                  কোকিল: এর সুমধুর ডাকের জন্য পরিচিত। <br />
                  ময়না ও টিয়া: এরা কথা বলতে পারে এবং খুব চটপটে হয়।<br />
                  কাক: এটি একটি বুদ্ধিমান পাখি যা প্রায় সব জায়গায় দেখা
                  যায়।
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 - Mammals -->
        <div class="col-md-4">
          <div
            class="card h-100 shadow-sm toggle-card"
            data-bs-toggle="collapse"
            data-bs-target="#mammals"
            aria-expanded="false"
            style="cursor: pointer; background-color: #fff7d8">
            <img
              src="https://images.pexels.com/photos/162173/panthera-tigris-altaica-tiger-siberian-amurtiger-162173.jpeg?cs=srgb&dl=pexels-pixabay-162173.jpg&fm=jpg"
              class="card-img-top"
              alt="Mammals" />
            <div class="card-body">
              <h5 class="card-title fw-semibold">স্তন্যপায়ী</h5>
              <p class="card-text text-muted">
                বাংলাদেশে বিভিন্ন ধরণের স্তন্যপায়ী প্রাণী রয়েছে, যার মধ্যে
                উল্লেখযোগ্য হলো হাতি, বেঙ্গল টাইগার, এবং বিভিন্ন প্রজাতির
                বানর। এছাড়াও বাদুড়, ইঁদুর, গরিলা, শিম্পাঞ্জি, শুশুক, তিমি
                এবং অন্যান্য প্রাণী এই তালিকায় অন্তর্ভুক্ত।
              </p>
              <div class="collapse" id="mammals">
                <p class="card-text text-muted">
                  হাতি: বাংলাদেশের একটি অন্যতম বড় স্তন্যপায়ী প্রাণী। <br />
                  বেঙ্গল টাইগার: এটি বাংলাদেশের জাতীয় পশু, যা অত্যন্ত বিপন্ন।
                  <br />
                  বাংলা লজ্জাবতী বানর: এটি একটি বিপন্ন প্রজাতির বানর। <br />
                  বাদুড়: বাংলাদেশে ২৯টি প্রজাতির বাদুড় রয়েছে।
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section" style="background-color: #f9f6ee">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold">আমাদের সেবা সমূহ</h2>
      <div class="row g-4 justify-content-center">
        <!-- Service 1 -->
        <div class="col-md-6 col-lg-3 d-flex">
          <div
            class="service-card flex-fill"
            style="background-color: #f3e5ab">
            <div class="icon"><i class="bi bi-exclamation-triangle"></i></div>
            <h5>জরুরি উদ্ধার সেবা</h5>
            <p class="text-muted">
              মানুষ বসবাসকারী এলাকায় সাপ ও অন্যান্য বন্যপ্রাণী দেখলে দ্রুততম
              সময়ে উদ্ধার ব্যবস্থা।
            </p>
          </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-6 col-lg-3 d-flex">
          <div
            class="service-card flex-fill"
            style="background-color: #e9dcc9">
            <div class="icon"><i class="bi bi-megaphone"></i></div>
            <h5>সচেতনতা কার্যক্রম</h5>
            <p class="text-muted">
              স্কুল, কলেজ ও স্থানীয় জনগণের মধ্যে বন্যপ্রাণী সংরক্ষণ বিষয়ে
              সচেতনতা তৈরি করা।
            </p>
          </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-6 col-lg-3 d-flex">
          <div
            class="service-card flex-fill"
            style="background-color: #f3e5ab">
            <div class="icon"><i class="bi bi-people-fill"></i></div>
            <h5>প্রশিক্ষণ সহায়তা</h5>
            <p class="text-muted">
              বন বিভাগের সহয়তায় নতুন স্বেচ্ছাসেবক ও সদস্যদের নিরাপদ উদ্ধার
              প্রশিক্ষণ প্রদান।
            </p>
          </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-6 col-lg-3 d-flex">
          <div
            class="service-card flex-fill"
            style="background-color: #e9dcc9">
            <div class="icon"><i class="bi bi-heart-fill"></i></div>
            <h5>কমিউনিটি-ভিত্তিক সেবা</h5>
            <p class="text-muted">
              গ্রামীণ জনগণের সঙ্গে মিলেমিশে, কুসংস্কার ও অজ্ঞতা দূর করে মানুষ
              ও বন্যপ্রাণীর মধ্যে দ্বন্দ্ব কমাতে কাজ করা।
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq-section py-5" style="background-color: #fffff0">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold">সাধারণ জিজ্ঞাসা</h2>

      <div class="accordion" id="faqAccordion">
        <!-- Question 1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading1">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq1"
              aria-expanded="false"
              aria-controls="faq1">
              বাড়ির আশেপাশে সাপ দেখলে কী করবো?
            </button>
          </h2>
          <div
            id="faq1"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading1"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              ভয় পাবেন না, শান্ত থাকুন। সাপটিকে ধরার বা তাড়ানোর চেষ্টা করবেন
              না। বাচ্চা ও পোষা প্রাণীদের দূরে রাখুন এবং যত দ্রুত সম্ভব আমাদের
              সাথে যোগাযোগ করবেন। আমাদের সার্টিফায়েড রেসকিউয়ারগন আপনাকে
              সাহায্য করার জন্য সদা প্রস্তুত।
            </div>
          </div>
        </div>

        <!-- Question 2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading2">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq2"
              aria-expanded="false"
              aria-controls="faq2">
              বাংলাদেশের সব সাপই কি বিষধর?
            </button>
          </h2>
          <div
            id="faq2"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading2"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              না, বেশিরভাগ সাপই বিষহীন ও নিরীহ। কেবল কিছু সাপ যেমন কোবরা বা
              ক্রেইট বিষধর। সবসময় সকল সাপ থেকে নিরাপদ দূরত্ব বজায় রাখুন এবং
              প্রয়োজনে আমাদের সাথে যোগাযোগ করুন।
            </div>
          </div>
        </div>

        <!-- Question 3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading3">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq3"
              aria-expanded="false"
              aria-controls="faq3">
              আমি কি নিজের হাতে সাপ সরাতে পারি?
            </button>
          </h2>
          <div
            id="faq3"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading3"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              না, একদম না। প্রশিক্ষণ ছাড়া সাপ ধরা খুবই বিপদজনক। সবসময়
              প্রশিক্ষিত রেসকিউয়ারদের খবর দিন, তাঁরাই নিরাপদভাবে সাপ সরাবেন।
            </div>
          </div>
        </div>

        <!-- Question 4 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading4">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq4"
              aria-expanded="false"
              aria-controls="faq4">
              সাপ যেন বাসায় ঢুকতে না পারে, কী করবো?
            </button>
          </h2>
          <div
            id="faq4"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading4"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              বাড়ির চারপাশ পরিষ্কার রাখুন, ঘাস বা ঝোপঝাড় বেশি বড় হতে দেবেন না,
              দেয়াল বা মেঝের ফাঁকফোকর বন্ধ করুন এবং খাবার বা পানির উৎস এমনভাবে
              রাখুন যাতে সাপ আকৃষ্ট না হয়।
            </div>
          </div>
        </div>

        <!-- Question 5 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq5"
              aria-expanded="false"
              aria-controls="faq5">
              আপনারা কি জরুরি সাপ রেসকিউ সেবা দেন?
            </button>
          </h2>
          <div
            id="faq5"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading5"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              হ্যাঁ, আমাদের সার্টিফায়েড সাপ রেসকিউ টিম ২৪ ঘণ্টা কাজ করে। বাসা
              বা আশেপাশে সাপ দেখলে সঙ্গে সঙ্গে আমাদের হেল্পলাইন (+880 1722
              938276) নম্বরে ফোন করুন।
            </div>
          </div>
        </div>

        <!-- Question 6 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading5">
            <button
              class="accordion-button collapsed"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#faq6"
              aria-expanded="false"
              aria-controls="faq6">
              সাপ রেসকিউ জন্য আপনারা কত টাকা ফি নেন?
            </button>
          </h2>
          <div
            id="faq6"
            class="accordion-collapse collapse"
            aria-labelledby="faqHeading6"
            data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              না, আমরা সাপ রেসকিউ জন্য কোনো টাকা নেই না। <br />
              তবে আমাদের অধিকাংশ সার্টিফায়েড সাপ রেসকিউয়ারই বিভিন্ন
              কলেজ/বিশ্ববিদ্যালয়ের ছাত্র। পড়াশোনার পাশাপাশি পরিবেশের সুরক্ষায়
              তারা নিরলস ভাবে কাজ করে থাকেন। <br />
              সেক্ষেত্রে যাতায়াত ভাড়া বহন করলে তাদের জন্য সুবিধা হয়।
            </div>
          </div>
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
              Don’t have an account?
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
</body>

</html>