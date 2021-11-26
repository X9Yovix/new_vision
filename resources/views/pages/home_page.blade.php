@extends('layouts.app')

@section('content')
    <div class="split-screen-wrap flex">
        <div class="flex-child child-1">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="">
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Admin') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login') }}"><button
                            class="btn-to-login"><span>{{ trans('home_page.Login') }}</span></button></a>
                </div>
            </div>
        </div>
        <div class="flex-child child-2">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="">
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Teacher') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login') }}"><button class="btn-to-login"><span>{{ trans('home_page.Login') }}
                            </span></button></a>
                </div>
            </div>
        </div>
        <div class="flex-child child-3">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="">
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Student') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login') }}"><button class="btn-to-login"><span>{{ trans('home_page.Login') }}
                            </span></button></a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="split-screen-wrap flex">

        <div class="flex-child child-1">
            <div class="transbox">
            </div>
        </div>

        <div class="flex-child child-2">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/logo_new_vision.png') }}" alt="">
                    </div>
                    <h1 class="header_item">New Vision</h1>
                    <h4 class="title_item">
                        Plateforme Numérique d'Enseignement & de Communication à distance.
                    </h4>
                    <a href="{{ route('login')}}"><button class="btn-to-login"><span>Se Connecter</span></button></a>
                </div>
            </div>
        </div>

        <div class="flex-child child-3">
            <div class="transbox">

            </div>
        </div>

    </div> --}}
@endsection
