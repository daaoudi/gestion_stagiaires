<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
      <!-- Favicons -->
  <link href="../../img/favicon.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../vendor/aos/aos.css" rel="stylesheet">
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../css/style.css" rel="stylesheet">


</head>
<body>
    @include('base.header')
<div class="container-md my-5">
 @yield('content')   
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('base.footer')


<!-- Vendor JS Files -->
<script src="../../vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../../vendor/aos/aos.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../../js/main.js"></script>

</body>
</html>