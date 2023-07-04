<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./tailwind/output.css">
    <title>Whale VPN</title>
</head>

<body dir="rtl" class="relative bg-[#03091D]">
<img src="./assets/images/background1.png" class="absolute top-0 right-0 z-[-1] md:w-[50%] w-full">
<img src="./assets/images/background2.svg"
     class="absolute md:top-0 top-[30rem] md:left-0 left-7 z-[-1] md:w-[80%] w-full">
<img src="./assets/images/background5.png" class="absolute bottom-0 right-0 z-[-1] w-full">
<header class="py-8">
    <div class="container md:flex hidden justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="./assets/images/logo.svg" class="lg:w-12 md:w-10 lg:h-12 md:h-10">
            <h3 class="font-gilroy-black text-white 2xl:text-4xl lg:text-3xl md:text-2xl">WHALE VPN</h3>
        </div>
        <nav class="flex flex-wrap justify-center lg:gap-9 gap-5 lg:w-auto md:w-[50%] font-yekanbakh text-white 2xl:text-lg md:text-base text-sm"></nav>
        @if(auth()->check())
           @if(auth()->user()->level == 'admin')
                <a href="{{route('admin.index')}}" class="flex items-center gap-2 px-6 py-3 bg-[#2D51DF] font-yekanbakh text-white rounded-lg">
                    <span class="2xl:text-xl md:text-lg text-base font-semibold">پنل مدیریت</span>
                    <img src="./assets/icons/user.svg" class="lg:w-6 md:w-5 lg:h-6 md:h-5">
                </a>
            @else
                <a href="{{route('panel.index')}}" class="flex items-center gap-2 px-6 py-3 bg-[#2D51DF] font-yekanbakh text-white rounded-lg">
                    <span class="2xl:text-xl md:text-lg text-base font-semibold">پنل کاربری</span>
                    <img src="./assets/icons/user.svg" class="lg:w-6 md:w-5 lg:h-6 md:h-5">
                </a>
            @endif
        @else
            <a href="{{route('auth.login.index')}}" class="flex items-center gap-2 px-6 py-3 bg-[#2D51DF] font-yekanbakh text-white rounded-lg">
                <span class="2xl:text-xl md:text-lg text-base font-semibold">ورود</span>
                <img src="./assets/icons/user.svg" class="lg:w-6 md:w-5 lg:h-6 md:h-5">
            </a>
        @endif

    </div>
</header>
<section>
    <div class="container flex md:flex-row flex-col justify-between py-4">
        <div class="flex flex-col justify-center lg:w-auto md:w-[50%] w-full">
            <div class="flex items-center gap-3 mb-3">
                <span class="w-12 h-1.5 bg-[#2D51DF] rounded-full"></span>
                <h2 class="w-fit font-yekanbakh text-white 2xl:text-4xl lg:text-3xl md:text-2xl text-xl">
                   دسترسی به دنیای آزاد
                </h2>
            </div>
            <h1 class="w-fit mb-5 from-slate-500 via-[#ffffff] to-slate-400 from-0% via-60% to-100% bg-gradient-to-r bg-clip-text font-gilroy-black text-transparent 2xl:text-9xl lg:text-8xl sm:text-6xl text-5xl">
                WHALE VPN
            </h1>
            <ul
                class="flex flex-col gap-2 xl:mb-8 mb-6 font-yekanbakh text-[#B2BFEE] 2xl:text-lg lg:text-base text-sm">
                <li class="flex items-center gap-2">
                    <img src="./assets/icons/verify.svg">
                    <span class="mt-0.5">
                        قابلیت استفاده در تمامی سیستم عامل ها
                    </span>
                </li>
                <li class="flex items-center gap-2">
                    <img src="./assets/icons/verify.svg">
                    <span class="mt-0.5">
                        عدم محدودیت در تعداد کاربر
                    </span>
                </li>
                <li class="flex items-center gap-2">
                    <img src="./assets/icons/verify.svg">
                    <span class="mt-0.5">
                        سرعت ، امنیت و پایداری بسیار بالا
                    </span>
                </li>
                <li class="flex items-center gap-2">
                    <img src="./assets/icons/verify.svg">
                    <span class="mt-0.5">بر طرف کردن محدودیت های اینترنت ملی</span>
                </li>
                <li class="flex items-center gap-2">
                    <img src="./assets/icons/verify.svg">
                    <span class="mt-0.5">حذف تمامی تبلیغات</span>
                </li>
            </ul>
            <button
                class="flex items-center gap-2 w-fit px-5 py-3  xl:mb-0 md:mb-5 mb-0 bg-[#2D51DF] font-yekanbakh text-white rounded-lg">
                <span class="2xl:text-xl lg:text-lg text-base font-semibold">خرید اشتراک</span>
                <img src="./assets/icons/arrow-left.svg" class="lg:w-6 w-5 lg:h-6 h-5">
            </button>
        </div>
        <div
            class="flex md:flex-row flex-col justify-between items-center md:gap-0 gap-3 lg:w-auto md:w-[50%] w-full md:py-0 py-16">
            <img src="./assets/images/rocket.webp" class="lg:w-[80%] w-[70%] h-fit">
            <div
                class="flex md:flex-col flex-row justify-between md:w-auto w-[90%] h-[60%] font-yekanbakh text-white">
                <div class="flex flex-col items-center">
                    <h4 class="font-yekanbakh-semibold 2xl:text-4xl lg:text-3xl text-2xl font-bold">۲۳+</h4>
                    <span class="2xl:text-lg lg:text-base sm:text-sm  text-[13px]">سرور پرسرعت</span>
                </div>
                <div class="flex flex-col items-center">
                    <h4 class="font-yekanbakh-semibold 2xl:text-4xl lg:text-3xl text-2xl font-bold">۱۰+</h4>
                    <span class="2xl:text-lg lg:text-base sm:text-sm  text-[13px]">کشور مختلف</span>
                </div>
                <div class="flex flex-col items-center">
                    <h4 class="font-yekanbakh-semibold 2xl:text-4xl lg:text-3xl text-2xl font-bold">∞</h4>
                    <span class="2xl:text-lg lg:text-base sm:text-sm  text-[13px]">سرعت نامحدود</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-40">
    <div class="container flex justify-center">
        <div
            class="relative flex xl:flex-row flex-col justify-between items-center gap-y-12 xl:w-full sm:w-fit w-full sm:p-12 p-8 bg-[#2D51DF] rounded-3xl">
            <div class="absolute inset-0 xl:block hidden bg-[#294CD9] rounded-3xl"
                 style="mask-image: url('./assets/images/sircle1.svg'); mask-size: cover; mask-position: top;"></div>
            <div class="absolute inset-0 xl:hidden block bg-[#294CD9] rounded-3xl"
                 style="mask-image: url('./assets/images/sircle2.svg'); mask-size: cover; mask-position: top;"></div>
            <img src="./assets/images/wave1.svg" class="absolute right-[50%] translate-x-[50%] sm:bottom-[-4.3rem] bottom-[-10vw] sm:w-auto w-[80%]">
            <img src="./assets/icons/arrow-down.svg" class="absolute right-[50%] translate-x-[50%] sm:bottom-[-2rem] bottom-[-5vw] sm:w-10 w-8 sm:h-10 h-8">
            <h3
                class="z-[1] flex flex-col items-center gap-3 font-yekanbakh-black 2xl:text-5xl xl:text-4xl text-3xl text-white">
                <span>یـــــــک اشـــــــتراک</span>
                <span>بینهایت دستگاه</span>
            </h3>
            <div class="z-[1] flex flex-wrap justify-center md:gap-10 gap-8 font-poppins text-white text-lg">
                <div class="flex items-center gap-1.5">
                    <span class="2xl:text-lg md:text-base text-sm">Android</span>
                    <img src="./assets/icons/android.svg" class="2xl:w-12 md:w-10 w-9 2xl:h-12 md:h-10 h-9">
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="2xl:text-lg md:text-base text-sm">Apple</span>
                    <img src="./assets/icons/apple.svg" class="2xl:w-12 md:w-10 w-9 2xl:h-12 md:h-10 h-9">
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="2xl:text-lg md:text-base text-sm">Windows</span>
                    <img src="./assets/icons/windows.svg" class="2xl:w-12 md:w-10 w-9 2xl:h-12 md:h-10 h-9">
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="2xl:text-lg md:text-base text-sm">Linux</span>
                    <img src="./assets/icons/linux.svg" class="2xl:w-12 md:w-10 w-9 2xl:h-12 md:h-10 h-9">
                </div>
            </div>
            <p
                class="z-[1] w-56 font-yekanbakh-semibold 2xl:text-xl text-base text-white xl:text-justify text-center leading-6">
                با یک اشتراک، تمام دستگاه‌های شما را به وی پی ان ‌های پرسرعت و مطمئن مجهز می‌کنیم</p>
        </div>
    </div>
</section>
<section class="relative mb-24">
    <img src="./assets/images/circle.svg" class="absolute left-[10%] top-[-20%]">
    <img src="./assets/images/circle.svg" class="absolute right-[20%] top-[32%]">
    <div class="relative sm:container flex flex-col items-center">
        <h2
            class="2xl:mb-7 md:mb-6 sm:mb-5 mb-4 text-center font-yekanbakh-black 2xl:text-6xl md:text-5xl sm:text-4xl text-3xl text-white leading-[2.7rem]">
            لیست موقعیت سرورها</h2>
        <p
            class="md:mb-20 sm:mb-16 mb-12 text-center font-yekanbakh 2xl:text-xl md:text-lg sm:text-base text-sm text-white">
            تمامی سرور‌ها برای همه اشتراک‌ها فعال و قابل
            استفاده هستند</p>
        <div class="swiper swiper1 md:w-[80%] w-full pb-[40px]" dir="ltr">
            <div class="swiper-wrapper flex justify-center">
                @foreach($locations as $key=>$location)
                    @if($location->availablePorts() > 0)
                    <div data-first="{{$key}}"   data-location="{{$location->id}}"
                        class="flags swiper-slide group relative flex flex-col items-center gap-4 h-fit sm:p-8 p-6 hover:bg-[#0F1D4E] rounded-xl cursor-pointer transition">
                        <img src="{{asset($location->image)}}"
                             class="sm:w-28 w-24 sm:h-28 h-fit bg-white sm:border-4 border-[3px] border-white rounded-full">
                        <span class="font-yekanbakh text-white sm:text-base text-sm">{{$location->title}}</span>
                        <img src="./assets/images/countries-hover-effect.svg"
                             class="absolute -bottom-8 z-[-1] group-hover:visible invisible group-hover:opacity-100 opacity-0 transition">
                    </div>
                        @endif
                @endforeach

            </div>
            <div class="swiper-scrollbar !h-0"></div>
        </div>
        <div
            class="swiper-button-prev swiper-button-prev1 after:hidden absolute !right-2 !top-[50%] translate-y-[100%] md:flex hidden w-14 h-14 bg-[#0F1D4E] rounded-full">
            <img src="./assets/icons/arrow-right.svg" class="w-7">
        </div>
        <div
            class="swiper-button-next swiper-button-next1 after:hidden absolute right-auto !left-2 !top-[50%] translate-y-[100%] md:flex hidden w-14 h-14 bg-[#0F1D4E] rounded-full">
            <img src="./assets/icons/arrow-left.svg" class="w-7">
        </div>
    </div>
</section>
<section class="relative mb-28">
    <img src="./assets/images/background3.svg"
         class="absolute inset-0 xl:top-[-50%] lg:top-[-40%] sm:top-[-15%] top-[-12%] z-[-1] w-full">
    <div class="container flex flex-col items-center">
        <div class="flex lg:flex-row flex-col 2xl:gap-6 gap-4 w-full md:mb-12 mb-10">
            @foreach( $locations as $location)
                @foreach( $periods as $period)
                    @if($plans->where('location_id', $location->id)->where('period_id', $period->id)->count() > 0)
                        <div class="w-full p-5 bg-[#091231] rounded-2xl plan-box box-{{$location->id}}">
                            <div class="relative w-full p-10 mb-14 2xl:bg-[#294CD9] bg-[#2D51DF] text-center rounded-2xl">
                                <div class="absolute inset-0 2xl:bg-[#2D51DF] bg-[#294CD9] rounded-3xl"
                                     style="mask-image: url('./assets/images/sircle2.svg'); mask-size: cover; mask-position: top;">
                                </div>
                                <img src="./assets/images/wave2.svg" class="absolute right-[50%] translate-x-[50%] sm:bottom-[-2rem] bottom-[-7vw] sm:w-auto w-[50%]">
                                <span class="relative z-[1] block mb-3 font-yekanbakh text-white text-lg"> {{$location->title  }}</span>
                                <h3 class="relative z-[1] font-yekanbakh-black text-white lg:text-5xl md:text-4xl text-5xl"> {{$period->title }}</h3>
                            </div>
                            <div class="flex flex-col items-center gap-4 mb-8">
                        <span
                            class="text-center font-yekanbakh text-[#B2BFEE] 2xl:text-lg md:text-base text-sm">پشتیبانی
                            آنلاین</span>
                                <span class="text-center font-yekanbakh text-[#B2BFEE] 2xl:text-lg md:text-base text-sm">سازگار
                            با تمامی
                            اپراتور ها</span>
                                <span class="text-center font-yekanbakh text-[#B2BFEE] 2xl:text-lg md:text-base text-sm">قابلیت
                            اتصال روی
                            ویندوز ، لینوکس ، آیفون ، مک</span>
                            </div>
                            <div class="flex flex-col items-center gap-3 font-yekanbakh-semibold text-[#B2BFEE] ">
                                @foreach                            ($plans->where('location_id', $location->id)->where('period_id', $period->id) as $plan        )
                                    <div
                                        class="flex justify-between items-center w-full bg-[#0F1A40] xl:p-5 xl:pr-6 md:p-4 md:pr-5 p-3 pr-4 rounded-xl">
                                        <span class="xl:text-lg text-base">{{$plan->traffic->title }}</span>
                                        <div class="flex flex-col items-center gap-2">
                                            @if    ($plan->rrp_price != null  )
                                                <span class="xl:text-sm text-xs line-through">{{$plan->rrp_price()}} تومان</span>
                                                    @endif
                                            <span class="xl:text-base text-sm">{{$plan->price() }} تومان </span>
                                        </div>
                                        <a href="{{route('buy', ['plan' => $plan])}}" class="group p-2 hover:bg-[#00C2FF] rounded-md transition">
                                            <img src="./assets/icons/arrow-left2.svg" class="group-hover:hidden block xl:w-10 w-7">
                                            <img src="./assets/icons/arrow-left3.svg" class="group-hover:block hidden xl:w-10 w-7">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
        <button class="flex items-center gap-2 w-fit px-5 py-3 bg-[#2D51DF] font-yekanbakh text-white rounded-lg">
            <span class="2xl:text-xl lg:text-lg text-base font-semibold">بارگزاری بیشتر</span>
            <img src="./assets/icons/loading.svg" class="lg:w-7 w-6 lg:h-6 h-5">
        </button>
    </div>
</section>
<section class="relative mb-24">
    <img src="./assets/images/background4.svg"
         class="absolute md:-top-80 -top-48 right-[50%] translate-x-[50%] z-[-1] md:w-[50%]">
    <img src="./assets/images/circle.svg" class="absolute left-[10%] md:top-[10%] top-[25%]  w-8">
    <img src="./assets/images/circle.svg" class="absolute right-[20%] top-[-12%]">
    <img src="./assets/images/background3.svg" class="absolute inset-0 xl:top-[45%] top-[40%] z-[-1] w-full">
    <div class="relative container flex flex-col items-center">
        <h2
            class="2xl:mb-7 md:mb-6 sm:mb-5 mb-4 text-center font-yekanbakh-black 2xl:text-6xl md:text-5xl sm:text-4xl text-3xl text-white leading-[2.7rem]">
            کاربران درباره Whale Vpn چه می گویند ؟</h2>
        <p
            class="md:mb-20 sm:mb-16 mb-12 text-center font-yekanbakh 2xl:text-xl md:text-lg sm:text-base text-sm text-white">
            کیفیت خدمات VPN و فیلتر شکن فیت نت از زبان مشتریان ، شما هم نظر خود را ثبت کنید.</p>
        <div class="swiper swiper2 w-[80%] py-10" dir="ltr">
            <div class="swiper-wrapper flex">
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user1.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        سارا سلطانی</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user2.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        علی محمدپور</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user3.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        محمد میرزایی</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user1.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        سارا سلطانی</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user2.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        علی محمدپور</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
                <div class="swiper-slide relative flex flex-col items-center bg-[#091231] p-6 rounded-2xl">
                    <img src="./assets/images/wave3.svg" class="absolute right-[50%] translate-x-[50%] top-[-2.1rem] w-auto">
                    <img src="./assets/images/user3.png" class="z-[1] md:mb-3 mb-2 mt-[-40px]">
                    <h5 class="md:mb-1.5 mb-1 font-yekanbakh-semibold 2xl:text-xl md:text-lg text-base text-white">
                        محمد میرزایی</h5>
                    <span class="md:mb-5 mb-4 font-yekanbakh 2xl:text-base md:text-sm text-xs text-white">اشتراک یک
                            ماهه آمریکا</span>
                    <p class="2xl:p-7 md:p-6 p-5 md:mb-8 mb-6 bg-[#0F1A40] text-right font-yekanbakh 2xl:text-base text-sm text-white 2xl:leading-7 leading-6 rounded-xl"
                       dir="rtl">
                        من یه راننده‌ی اسنپ هستم و تقریبا ۱۰ ساعت از روز رو برای مسیریابی از وی پی ان استفاده
                        می‌کنم. دمتون گرم فقط همین !
                    </p>
                    <img src="./assets/images/fiveStar.svg" class="md:w-28 w-24">
                </div>
            </div>
        </div>
        <div
            class="swiper-button-prev swiper-button-prev2 after:hidden absolute sm:!right-2 !right-[30%] sm:!top-[50%] !top-[90%] translate-y-[100%] w-14 h-14 bg-[#0F1D4E] rounded-full">
            <img src="./assets/icons/arrow-right.svg" class="w-7">
        </div>
        <div
            class="swiper-button-next swiper-button-next2 after:hidden absolute right-auto sm:!left-2 !left-[30%] sm:!top-[50%] !top-[90%] translate-y-[100%] w-14 h-14 bg-[#0F1D4E] rounded-full">
            <img src="./assets/icons/arrow-left.svg" class="w-7">
        </div>
    </div>
</section>
<section class="md:mb-40 mb-32">
    <div class="container lg:flex grid grid-cols-[1fr_1fr] lg:justify-between items-center lg:gap-y-0 gap-y-14">
        <div class="flex flex-col items-center">
            <img src="./assets/images/wallet.png" class="2xl:h-24 md:h-20 h-14 md:mb-7 mb-5">
            <h5 class="md:mb-3 mb-2 text-center text-white font-yekanbakh-black 2xl:text-x2l md:text-xl text-base">
                ضمانت بازگشت وجه</h5>
            <span class="text-center text-[#B2BFEE] font-yekanbakh 2xl:text-base md:text-sm text-xs"> بازگشت وجه تا
                    7 روز (بدون نیاز به ارائه دلیل)</span>
        </div>
        <div class="hidden lg:block w-[1px] h-36 bg-[#091231]"></div>
        <div class="flex flex-col items-center">
            <img src="./assets/images/security.png" class="2xl:h-24 md:h-20 h-14 md:mb-7 mb-5">
            <h5 class="md:mb-3 mb-2 text-center text-white font-yekanbakh-black 2xl:text-x2l md:text-xl text-base">
                نهایت ایمن</h5>
            <span class="text-center text-[#B2BFEE] font-yekanbakh 2xl:text-base md:text-sm text-xs">رمزنگاری
                    اطلاعات شما با تکنولوژی‌های روز دنیا</span>
        </div>
        <div class="hidden lg:block w-[1px] h-36 bg-[#091231]"></div>
        <div class="flex flex-col items-center">
            <img src="./assets/images/flag.png" class="2xl:h-24 md:h-20 h-14 md:mb-7 mb-5">
            <h5 class="md:mb-3 mb-2 text-center text-white font-yekanbakh-black 2xl:text-x2l md:text-xl text-base">
                اتصال به چند کشور</h5>
            <span class="text-center text-[#B2BFEE] font-yekanbakh 2xl:text-base md:text-sm text-xs">قابلیت اتصال
                    VPN به بیش از 10 کشور مختلف</span>
        </div>
        <div class="hidden lg:block w-[1px] h-36 bg-[#091231]"></div>
        <div class="flex flex-col items-center">
            <img src="./assets/images/phone.png" class="2xl:h-24 md:h-20 h-14 md:mb-7 mb-5">
            <h5 class="md:mb-3 mb-2 text-center text-white font-yekanbakh-black 2xl:text-x2l md:text-xl text-base">
                مناسب تمام دستگاه‌ها</h5>
            <span class="text-center text-[#B2BFEE] font-yekanbakh 2xl:text-base md:text-sm text-xs">سازگار با تمام
                    دستگاه‌ها و سیستم‌عامل‌ها</span>
        </div>
    </div>
</section>
<footer class="mb-8">
    <div class="container">
        <div
            class="relative xl:flex grid grid-cols-2 justify-between xl:gap-y-0 gap-y-12 bg-[#091231] md:p-16 sm:p-10 px-5 py-10 rounded-3xl">
            <img src="./assets/images/wave4.svg" class="absolute right-[50%] translate-x-[50%] md:top-[-4.3rem] top-[-8vw] md:w-auto w-[70%]">
            <img src="./assets/icons/arrow-up.svg" class="absolute right-[50%] translate-x-[50%] md:top-[-2.7rem] top-[-5vw] md:w-10 w-7 md:mt-0 mt-2">
            <div class="sm:col-span-1 col-span-2 flex flex-col items-center">
                <div class="flex items-center gap-4 md:mb-7 mb-5">
                    <img src="./assets/images/logo.svg" class="lg:w-14 w-12 lg:h-14 h-12">
                    <div class="flex flex-col">
                        <h3 class="md:mb-1 mb-0.5 font-gilroy-black text-white 2xl:text-4xl lg:text-3xl text-2xl">
                            WHALE VPN</h3>
                        <span class="font-yekanbakh text-white md:text-base text-sm">دسترسی به دنیای آزاد</span>
                    </div>
                </div>
                <div class="flex gap-1">
                    <a href="#" class="flex justify-center items-center w-8 h-8 bg-[#2D51DF] rounded-full"><img
                            src="./assets/icons/facebook.svg" class="w-2"></a>
                    <a href="#" class="flex justify-center items-center w-8 h-8 bg-[#2D51DF] rounded-full"><img
                            src="./assets/icons/linkedin.svg" class="w-3"></a>
                    <a href="#" class="flex justify-center items-center w-8 h-8 bg-[#2D51DF] rounded-full"><img
                            src="./assets/icons/telegram.svg" class="w-4"></a>
                    <a href="#" class="flex justify-center items-center w-8 h-8 bg-[#2D51DF] rounded-full"><img
                            src="./assets/icons/whatsapp.svg" class="w-4"></a>
                    <a href="#" class="flex justify-center items-center w-8 h-8 bg-[#2D51DF] rounded-full"><img
                            src="./assets/icons/instagram.svg" class="w-4"></a>
                </div>
            </div>
            <div class="sm:col-span-1 col-span-2">
                <h4 class="md:mb-3 mb-2 text-white font-yekanbakh-semibold md:text-xl text-lg">درباره ما</h4>
                <p
                    class="2xl:max-w-lg max-w-md text-[#B2BFEE] font-yekanbakh md:text-base sm:text-sm text-xs sm:leading-6 leading-5">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                    چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                    مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                    درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد
                </p>
            </div>
            <div>
                <h4 class="md:mb-3.5 mb-2 text-white font-yekanbakh-semibold md:text-xl sm:text-lg text-base">دسترسی
                    سریع</h4>
                <ul
                    class="flex flex-col gap-2 text-[#B2BFEE] font-yekanbakh md:text-base sm:text-sm text-xs  list-none">
                    <a href="#">
                        <li>راهنمای استفاده</li>
                    </a>
                    <a href="#">
                        <li>پشتبیانی</li>
                    </a>
                    <a href="#">
                        <li>موقعیت سرورها</li>
                    </a>
                    <a href="#">
                        <li>وبلاگ</li>
                    </a>
                    <a href="#">
                        <li>دربـاره ما</li>
                    </a>
                </ul>
            </div>
            <div>
                <h4 class="md:mb-3.5 mb-2 text-white font-yekanbakh-semibold md:text-xl sm:text-lg text-base">
                    لینک‌های کاربردی</h4>
                <ul
                    class="flex flex-col gap-2 text-[#B2BFEE] font-yekanbakh md:text-base sm:text-sm text-xs  list-none">
                    <a href="#">
                        <li>تمدید اشتراک</li>
                    </a>
                    <a href="#">
                        <li>پنل کـاربـری</li>
                    </a>
                    <a href="#">
                        <li>بازیـابی رمز</li>
                    </a>
                    <a href="#">
                        <li>تغییر رمز عبور</li>
                    </a>
                    <a href="#">
                        <li>سوالات متداول</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper1 = new Swiper(".swiper1", {
        slidesPerView: 3,
        centeredSlides: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-prev1",
            prevEl: ".swiper-button-next1",
        },
        breakpoints: {
            1280: {
                slidesPerView: 4,
            },
        }
    });

    var swipe2 = new Swiper(".swiper2", {
        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-prev2",
            prevEl: ".swiper-button-next2",
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.plan-box').hide();
        let defaultActive =$('.flags[data-first]');
        let location= defaultActive.data('location');
        $('.box-'+location).show();

        $('.flags').click(function (){
            let locationIdToSelect= $(this).data('location');
            $('.plan-box').hide();
            $('.box-'+locationIdToSelect).show();
        })
    });
</script>
</html>
