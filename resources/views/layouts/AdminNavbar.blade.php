<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>					
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                @else
                {{ Auth::user()->name }}
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                <h4 class="mb-0 text-center"><strong>{{ Auth::user()->name }}</strong></h4>
                <div class="dropdown-divider"></div>
                <!-- Account Management -->
                <a class="dropdown-item" href="{{ route('profile.show') }}">
                    <i class="fas fa-user-cog mr-2"></i> {{ __('Manage Account') }}
                </a>

                <div class="dropdown-divider"></div>	
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                        <button class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                        </button>
                </form>					
            </div>
        </li>
    </ul>
</nav>