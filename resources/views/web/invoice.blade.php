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
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet">
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
                <h1 class="my-3">
                    خرید سرویس
                    {{$invoice->plan->location->title}}
                    {{$invoice->plan->period->title}}
                    {{$invoice->plan->traffic->title}}
                </h1>
            </div>
        </div>
        <section class="pricing">
            <div data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-8 px-3">
                        <div class="card">
                            <div class="card-body px-5">
                               <div class="d-flex justify-content-between align-items-center">
                                   <span>تعداد:</span>
                                   <div class="d-flex justify-content-end">
                                       <a class="btn btn-outline-secondary" href="{{route('invoice.increment' , $invoice)}}">+</a>
                                       <input type="number" class="form-control w-50" value="{{$invoice->quantity}}" disabled>
                                       <a class="btn btn-outline-secondary" href="{{route('invoice.decrement' , $invoice)}}">-</a>
                                   </div>
                               </div>
                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <span>کد تخفیف:</span>
                                    <form action="{{route('invoice.discount', $invoice)}}" class="d-flex justify-content-end" method="post">
                                        @csrf
                                        <input type="text" class="form-control  w-75" placeholder=" کد تخفیف" name="discount_code">
                                        <button class="btn btn-success">اعمال</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                نکات مربوط به خرید
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>مدت زمان استفاده از سرویس 5 دقیقه پس بازگشت  موفقیت آمیز از درگاه پرداخت شروع می شود</li>
                                    <li>جهت اتصال به سرویس ها میتوانید به بخش آموزش در پنل کاربری خود مراجعه کنید</li>
                                    <li>در صورت هر گونه سوال یا مشکل میتوانید از طریق ارسال تیکت آن را با پشتیبانی مطرح کنید</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                جزئیات صورت حساب
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mt-1">
                                    <span>تعداد سرویس:</span>
                                    <span>{{ $invoice->quantity}} عدد </span>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <span>قیمت واحد:</span>
                                    <span>{{number_format($invoice->fee())}} تومان</span>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <span>مجموع قیمت:</span>
                                    <span>{{number_format($invoice->sum_without_discount()) }} تومان</span>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <span>میزان تخفیف:</span>
                                    <span>{{number_format($invoice->sum_discount())}} تومان</span>
                                </div>
                            </div>
                            <div class="card-footer text-success">
                                <div class="d-flex justify-content-between mt-3">
                                    <b>مجموع قابل پرداخت:</b>
                                    <b>{{$invoice->payable_price()}} تومان</b>
                                </div>
                            </div>
                        </div>

                        <form action="{{route('callback', $invoice)}}">
                            <button class="btn btn-success w-100 mt-3">پرداخت</button>
                        </form>

                    </div>
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
