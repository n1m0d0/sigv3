<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> SIG<span class="font-medium">v3</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        @role('admin')
        <li>
            <a href="{{ route('welcome') }}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="side-menu-dark-dashboard-overview-1.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-dark-dashboard-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-dark-dashboard-overview-3.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
            </ul>
        </li>
        @endrole
        <li>
            <a href="{{ route('page.dashboard') }}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                </div>
            </a>
        </li>
        @role('persona')
        <li>
            <a href="{{ route('data.person') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Registro </div>
            </a>
        </li>
        @endrole
        @role('empresa')
        <li>
            <a href="{{ route('data.institution') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                <div class="side-menu__title"> Registro </div>
            </a>
        </li>
        <li>
            <a href="{{ route('vacancy.institution') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                <div class="side-menu__title"> Vacancias </div>
            </a>
        </li>
        @endrole
    </ul>
</nav>
