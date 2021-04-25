@extends('layouts.master')
@section('title', 'Home')

@section('content')
    @php
    $lang = app()->getLocale();
    @endphp
    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
        <div class="container">

            <div class="row align-items-center position-relative">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <article class="card">
                            <div class="card-body p-3">
                                <h2 class="py-3">Payment Getway</h2>
                                <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                            <i class="fa fa-credit-card"></i> Credit Card</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                            <i class="fa fa-university"></i> Bank Transfer</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-tab-card">
                                        <p class="alert alert-success">Some text success or error</p>
                                        <form role="form">
                                            <div class="form-group mb-3">
                                                <label for="email">Account</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="free1soft@gmail.com" required readonly>
                                            </div> <!-- form-group.// -->
                                            <div class="form-group mb-3">
                                                <label for="bundle">Bundle</label>
                                                <select name="bundle" id="bundle" class="form-control">
                                                    <option value="36">36 Months</option>
                                                    <option value="24" selected>24 Months</option>
                                                    <option value="12">12 Months</option>
                                                    <option value="6">6 Months</option>
                                                    <option value="3">3 Months</option>
                                                </select>
                                            </div> <!-- form-group.// -->
                                            <div class="form-group mb-3">
                                                <label for="username">Full name (on the card)</label>
                                                <input type="text" class="form-control" name="username" placeholder=""
                                                    required="">
                                            </div> <!-- form-group.// -->

                                            <div class="form-group mb-3">
                                                <label for="cardNumber">Card number</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="cardNumber"
                                                        placeholder="">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text text-muted">
                                                            <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>

                                                            <i class="fab fa-cc-mastercard"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <!-- form-group.// -->

                                            <div class="row mb-3">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label><span class="hidden-xs">Expiration</span> </label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control mx-1" placeholder="MM"
                                                                name="">
                                                            <input type="number" class="form-control" placeholder="YY"
                                                                name="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label data-toggle="tooltip" title=""
                                                            data-original-title="3 digits code on back side of the card">CVV
                                                            <i class="fa fa-question-circle"></i></label>
                                                        <input type="number" class="form-control" required="">
                                                    </div> <!-- form-group.// -->
                                                </div>
                                            </div> <!-- row.// -->
                                            <button class="subscribe btn btn-primary btn-block" type="button"> Confirm
                                            </button>
                                        </form>
                                    </div> <!-- tab-pane.// -->

                                    <div class="tab-pane fade" id="nav-tab-bank">
                                        <p>Bank accaunt details</p>
                                        <dl class="param">
                                            <dt>BANK: </dt>
                                            <dd> THE WORLD BANK</dd>
                                        </dl>
                                        <dl class="param">
                                            <dt>Accaunt number: </dt>
                                            <dd> 12345678912345</dd>
                                        </dl>
                                        <dl class="param">
                                            <dt>IBAN: </dt>
                                            <dd> 123456789</dd>
                                        </dl>
                                        <p><strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                    </div> <!-- tab-pane.// -->
                                </div> <!-- tab-content .// -->

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
