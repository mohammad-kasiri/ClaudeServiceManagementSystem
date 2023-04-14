

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>وان پیج - قالب شرکتی بوت استرپ</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/rtl.css" rel="stylesheet">
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo lalezar"><a href="index.html">وان پیج</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="getstarted" href="">ورود</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center pb-4">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1 class="my-3">دسترسی به دنیای آزاد</h1>
            </div>
        </div>
        <section class="pricing">
            <div data-aos="fade-up">
                <div class="section-title">
                    <h5 class="text-muted mt-4">انتخاب کشور</h5>
                    @foreach($locations as $key=>$location)
                        <img src="{{asset($location->image)}}"
                             class="img-fluid d-inline m-3 flags"
                             width="80px"
                             data-first="{{$key}}"
                             data-location="{{$location->id}}">
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    @foreach( $locations as $location)
                        @foreach( $periods as $period)
                                @if($plans->where('location_id', $location->id)->where('period_id', $period->id)->count() > 0)
                                    <div class="col-lg-4 col-md-6 my-5 mt-md-0 plan-box box-{{$location->id}}" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="box">
                                            <h3>
                                                {{$location->title}}
                                                {{$period->title}}
                                            </h3>
                                            <ul>
                                                <li>پشتیبانی آنلاین</li>
                                                <li>سازگار با تمامی اپراتورها </li>
                                                <li>قابلیت اتصال روی ویندوز، لینوکس، اندروید، آیفون و مک</li>

                                            </ul>
                                            @foreach($plans->where('location_id', $location->id)->where('period_id', $period->id) as $plan)
                                                <div class="btn-wrap ">
                                                    <a href="{{route('buy', ['plan' => $plan])}}" class="btn-buy w-100 d-flex justify-content-between">
                                                        <span>{{$plan->traffic->title}}</span>
                                                        @if($plan->rrp_price != null)
                                                             <s>{{$plan->rrp_price()}} تومان </s>
                                                        @endif
                                                        <span>{{$plan->price()}}تومان</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                               @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
        </section>
        <!-- End Pricing Section -->
    </div>
</section>
<!-- End Hero -->
<!-- ======= Footer ======= -->
<footer id="footer" class="mt-5">
    <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                فارسی سازی شده توسط امین احمدی (فارس کد)
            </div>
            <div class="credits">
                فروش فقط در مارکت <a href="https://www.rtl-theme.com/onepage-html-template/">راست چین</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->


<!-- Vendor JS Files -->
<script
    src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
    crossorigin="anonymous"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    $(document).ready(function(){
        $('.plan-box').hide();
        let defaultActive =$('.flags[data-first]');
        let location= defaultActive.data('location');
        $('.flags[data-first="0"]').addClass('border-bottom border-5')
        $('.box-'+location).show();

        $('.flags').click(function (){
            $('.flags[data-first]').removeClass('border-bottom border-5');
            $(this).addClass('border-bottom border-5');
           let locationIdToSelect= $(this).data('location');
           $('.plan-box').hide();
           $('.box-'+locationIdToSelect).show();
        })
    });
</script>
</body>

</html>
