<div class="sidenav-menu">
    <a href="index.html" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="assets/images/logo.png" alt="logo"></span>
            <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="assets/images/logo-dark.png" alt="dark logo"></span>
            <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
        </span>
    </a>

    <button class="button-close-fullsidebar">
        <i class="ri-close-line align-middle"></i>
    </button>

    <div data-simplebar>


        @role('superadministrator')

        <ul class="side-nav">

            <li class="side-nav-title">{{__('messages.Navigation')}}</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-archive-2-line"></i></span>
                    <span class="menu-text"> {{__('messages.Dashboard')}} </span>
                </a>
            </li>

            <li class="side-nav-title">{{__('messages.Manage Users')}}</li>

            <li class="side-nav-item">
                <a href="{{ route('users.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-user-line"></i></span>
                    <span class="menu-text"> {{__('messages.Users')}} </span>
                </a>
            </li>

            <li class="side-nav-title">{{__('messages.Manage Branches')}}</li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-map-pin-2-line"></i></span>
                    <span class="menu-text"> {{__('messages.Branches')}} </span>
                </a>
            </li>

            <li class="side-nav-title">{{__('messages.Menu')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarHR" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-book-read-line"></i></span>
                    <span class="menu-text">{{__('messages.Menu')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarHR">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('messages.Categories')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('messages.Meals')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('messages.Extras')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>






            <li class="side-nav-title">{{__('messages.Manage Content')}}</li>

            <li class="side-nav-item">
                <a href="{{route('banners.index')}}" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-image-2-line"></i></span>
                    <span class="menu-text"> {{__('messages.Banners')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-contacts-book-line"></i></span>
                    <span class="menu-text"> {{__('messages.Contacts')}} </span>
                </a>
            </li>
            @endrole
        </ul>
    </div>

    <div class="clearfix"></div>
</div>