@extends('layouts.master')
@section('title', 'Home')

@section('content')
    @php
    $lang = Session::get('lang') ?? 'en';
    app()->setLocale($lang);
    @endphp
    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">{{ __('front.HERO.TITLE') }}</h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            {{ __('front.HERO.DESC') }}
                        </p>
                        <a href="{{ route('lead.demo') }}" class="main-btn border-btn btn-hover wow fadeInUp"
                            data-wow-delay=".6s">{{ __('front.HERO.BTN') }}</a>
                        <a href="#features" class="scroll-bottom"> <i class="lni lni-arrow-down"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="{{ asset('layout/img/hero/hero-img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= hero-section end ========================= -->
    <!-- ========================= feature-section start ========================= -->
    <section id="features" class="feature-section pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon">
                            <i class="lni lni-bootstrap"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('front.FEATURES.0.TITLE') }}</h3>
                            <p>{{ __('front.FEATURES.0.DESC') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('front.FEATURES.1.TITLE') }}</h3>
                            <p>{{ __('front.FEATURES.1.DESC') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon">
                            <i class="lni lni-coffee-cup"></i>
                        </div>
                        <div class="content">
                            <h3>{{ __('front.FEATURES.2.TITLE') }}</h3>
                            <p>{{ __('front.FEATURES.2.DESC') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= feature-section end ========================= -->
    <!-- ========================= about-section start ========================= -->
    <section id="about" class="about-section pt-150">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img">
                        <img src="layout/img/about/about-1.png" alt="" class="w-100">
                        <!-- PHP PHP PHP -->

                        <img src="layout/img/about/about-left-shape{{ $lang == 'ar' ? '-rtl' : '' }}.svg" alt=""
                            class="shape shape-1">

                        <img src="layout/img/about/{{ $lang == 'ar' ? 'right' : 'left' }}-dots.svg" alt=""
                            class="shape shape-2">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">{{ __('front.HOW1.TITLE') }}
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".4s">{{ __('front.HOW1.DESC') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about-section end ========================= -->
    <!-- ========================= about2-section start ========================= -->
    <section id="about2" class="about-section pt-150">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">{{ __('front.HOW2.TITLE') }}
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay=".4s">
                                {{ __('front.HOW2.DESC') }}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 order-first order-lg-last">
                    <div class="about-img-2">
                        <img src="layout/img/about/about-2.png" alt="" class="w-100">
                        <img src="layout/img/about/about-right-shape{{ $lang == 'ar' ? '-rtl' : '' }}.svg" alt=""
                            class="shape shape-1">
                        <img src="layout/img/about/{{ $lang == 'ar' ? 'left' : 'right' }}-dots.svg" alt=""
                            class="shape shape-2">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about2-section end ========================= -->
    <!-- ========================= feature-section start ========================= -->
    <section id="why" class="feature-extended-section pt-100">
        <div class="feature-extended-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-9">
                        <div class="section-title text-center mb-60">
                            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">{{ __('front.WHY.TITLE') }}</h1>
                            <p class="wow fadeInUp" data-wow-delay=".4s">{{ __('front.WHY.DESC') }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature-extended">
                            <div class="icon">
                                <i class="lni lni-display"></i>
                            </div>
                            <div class="content">
                                <h3>{{ __('front.WHY.ITEMS.0.TITLE') }}</h3>
                                <p>{{ __('front.WHY.ITEMS.0.DESC') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature-extended">
                            <div class="icon">
                                <i class="lni lni-leaf"></i>
                            </div>
                            <div class="content">
                                <h3>{{ __('front.WHY.ITEMS.1.TITLE') }}</h3>
                                <p>{{ __('front.WHY.ITEMS.1.DESC') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature-extended">
                            <div class="icon">
                                <i class="lni lni-grid-alt"></i>
                            </div>
                            <div class="content">
                                <h3>{{ __('front.WHY.ITEMS.2.TITLE') }}</h3>
                                <p>{{ __('front.WHY.ITEMS.2.DESC') }}</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- ========================= feature-section end ========================= -->
    <!-- ========================= pricing-section end ========================= -->
    <section id="pricing" class="pricing-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6 col-lg-8 col-md-9">
                    <div class="section-title text-center mb-35">
                        <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">{{ __('front.PRICING.TITLE') }}</h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">{{ __('front.PRICING.DESC') }}</p>
                    </div>
                </div>
            </div>


            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-month" role="tabpanel" aria-labelledby="pills-month-tab">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-8 col-sm-10">
                            <div class="single-pricing">
                                <div class="pricing-header">
                                    <h1 class="price">{{ __('front.PRICING.ITEMS.0.PRICE') }}</h1>
                                    <h3 class="package-name">{{ __('front.PRICING.ITEMS.0.TITLE') }}</h3>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.0.LIST.0.TYPE') }} active"></i>
                                            {{ __('front.PRICING.ITEMS.0.LIST.0.TITLE') }}</li>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.0.LIST.1.TYPE') }}"></i>
                                            {{ __('front.PRICING.ITEMS.0.LIST.1.TITLE') }}</li>

                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{ route('lead.demo') }}"
                                        class="main-btn btn-hover border-btn">{{ __('front.PRICING.BTN') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8 col-sm-10">
                            <div class="single-pricing">
                                <div class="pricing-header">
                                    <h1 class="price">{{ __('front.PRICING.ITEMS.1.PRICE') }}</h1>
                                    <h3 class="package-name">{{ __('front.PRICING.ITEMS.1.TITLE') }}</h3>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.1.LIST.0.TYPE') }} active"></i>
                                            {{ __('front.PRICING.ITEMS.1.LIST.0.TITLE') }}</li>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.1.LIST.1.TYPE') }}"></i>
                                            {{ __('front.PRICING.ITEMS.1.LIST.1.TITLE') }}</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{ route('lead.demo') }}"
                                        class="main-btn btn-hover">{{ __('front.PRICING.BTN') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8 col-sm-10">
                            <div class="single-pricing">
                                <div class="pricing-header">
                                    <h1 class="price">{{ __('front.PRICING.ITEMS.2.PRICE') }}</h1>
                                    <h3 class="package-name">{{ __('front.PRICING.ITEMS.2.TITLE') }}</h3>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.2.LIST.0.TYPE') }} active"></i>
                                            {{ __('front.PRICING.ITEMS.2.LIST.0.TITLE') }}</li>
                                        <li> <i class="lni {{ __('front.PRICING.ITEMS.2.LIST.1.TYPE') }}"></i>
                                            {{ __('front.PRICING.ITEMS.2.LIST.1.TITLE') }}</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{ route('lead.demo') }}"
                                        class="main-btn btn-hover border-btn">{{ __('front.PRICING.BTN') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ========================= pricing-section end ========================= -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@stop
