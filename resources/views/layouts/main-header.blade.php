<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo_new_vision.png') }}" alt=""></a>
    </div>

    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml--1 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
    </ul>

    <div class="btn-group mb-1">
        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            @if (App::getLocale() == 'fr')
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('assets/images/flags/FR.png') }}" alt="">
            @else
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
            @endif
        </button>
        <div class="dropdown-menu">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            @endforeach
        </div>
    </div>
    
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{ asset('assets/images/User_Icon.PNG') }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                @if (auth('student')->check())
                    <form method="GET" action="{{ route('logout', 'student') }}">
                    @elseif(auth('teacher')->check())
                        <form method="GET" action="{{ route('logout', 'teacher') }}">
                        @else
                            <form method="GET" action="{{ route('logout', 'web') }}">
                @endif

                @csrf
                <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="text-danger ti-direction"></i>Logout</a>
                </form>
            </div>
        </li>
    </ul>
</nav>
