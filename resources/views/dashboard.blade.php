<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @section('title')
        {{ trans('dashboard.Dashboard') }}
    @stop
    @include('layouts.head')
</head>
<body>
    <div class="wrapper">
        <!--preloader -->
        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/rings.svg') }}" alt="">
        </div>
        @include('layouts.main-header')
        @include('layouts.main-sidebar')
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $words = explode(' ', Auth::user()->name);
                        ?>
                        <h4 class="mb-0">{{ trans('dashboard.Welcome') }} {{ $words[0] }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            {{-- stats --}}
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('dashboard.Total') }}</p>
                                    <h4>{{ $res }}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> {{-- 81% lower
                                growth --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    </div>
    </div>
    @include('layouts.footer-scripts')
</body>
</html>
