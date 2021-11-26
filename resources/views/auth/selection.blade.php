@extends('layouts.app')
@section('content')
    <div class="split-screen-wrap flex">
        <div class="flex-child child-1">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="" />
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Admin') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login.show', 'admin') }}"><button
                            class="btn-to-login"><span>{{ trans('home_page.Login') }}</span></button></a>
                </div>
            </div>
        </div>
        <div class="flex-child child-2">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="" />
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Teacher') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login.show', 'teacher') }}"><button
                            class="btn-to-login"><span>{{ trans('home_page.Login') }}
                            </span></button></a>
                </div>
            </div>
        </div>
        <div class="flex-child child-3">
            <div class="transbox">
                <div class="content-child">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/x.jpg') }}" alt="" />
                    </div>
                    <h1 class="header_item">{{ trans('home_page.Student') }}</h1>
                    {{-- <h4 class="title_item">Title</h4> --}}
                    <a href="{{ route('login.show', 'student') }}"><button
                            class="btn-to-login"><span>{{ trans('home_page.Login') }}
                            </span></button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
