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
                        <article class="card">
                            <div class="card-body p-3">
                                <h2 class="py-3">{{ __('front.LEAD.DEMO') }}</h2>

                                @if ($message = Session::get('SUCCESS'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">{{ __('front.LEAD.SUCCESS.TITLE') }}</h4>
                                        {{ __('front.LEAD.SUCCESS.BODY') }}
                                    </div>
                                @endif
                                <form role="form" method="post" action="/request/demo">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name">{{ __('front.LEAD.NAME') }}</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="{{ __('front.LEAD.NAME') }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">{{ __('front.LEAD.EMAIL') }}</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="{{ __('front.LEAD.EMAIL') }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">{{ __('front.LEAD.PHONE') }}</label>
                                        <input type="text" class="form-control" name="phone" placeholder="+1xxx.." required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="package">{{ __('front.LEAD.PACKAGE') }}</label>
                                        <select name="package" id="package" class="form-control">
                                            <option value="B">{{ __('front.LEAD.PACKAGES.BASIC') }}</option>
                                            <option value="S" selected>{{ __('front.LEAD.PACKAGES.STANDARD') }}</option>
                                            <option value="P">{{ __('front.LEAD.PACKAGES.PROFESSIONAL') }}</option>

                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bundle">{{ __('front.LEAD.BUNDLE') }}</label>
                                        <select name="bundle" id="bundle" class="form-control">
                                            <option value="36">36 {{ __('front.LEAD.MONTHS') }}</option>
                                            <option value="24" selected>24 {{ __('front.LEAD.MONTHS') }}</option>
                                            <option value="12">12 {{ __('front.LEAD.MONTHS') }}</option>
                                            <option value="6">6 {{ __('front.LEAD.MONTHS') }}</option>
                                            <option value="3">3 {{ __('front.LEAD.MONTHS') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="note">{{ __('front.LEAD.NOTE') }}</label>
                                        <textarea class="form-control" name="note"
                                            placeholder="{{ __('front.LEAD.NOTE') }}" required>
                                                </textarea>
                                    </div>

                                    <button class="btn btn-lg btn-success btn-block" type="submit">
                                        {{ __('front.LEAD.GET_STARTED') }}
                                    </button>
                                </form>


                            </div> <!-- card-body.// -->
                        </article> <!-- card.// -->
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


@stop

@section('css')
    <style>
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .checkbox.pull-right {
            margin: 0;
        }

        .pl-ziro {
            padding-left: 0px;
        }

    </style>
@stop
