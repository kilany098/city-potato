<!-- Topbar Start -->
<header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <a href="{{ $localizedUrls[$currentLocale] ?? '/' }}" class="logo text-light"><strong class="fs-18">{{ __('messages.City Potato') }}</strong></a>

            <button class="sidenav-toggle-button px-2">
                <i class="ri-menu-2-line fs-24"></i>
            </button>

            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-2-line fs-24"></i>
            </button>
        </div>

        <div class="d-flex align-items-center gap-2">

            <!-- Button Trigger Customizer Offcanvas -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                    type="button">
                    <i class="ri-settings-line fs-22"></i>
                </button>
            </div>
            <div class="language-switcher">
                @foreach($supportedLocales as $localeCode => $properties)
                @if($localeCode === $currentLocale)
                <!-- Current Language (inactive, just showing) -->
                <span class="btn btn-sm btn-outline-primary active">
                    {{ strtoupper($properties['native']) }}
                </span>
                @else
                <!-- Switch to other language -->
                <a href="{{ $localizedUrls[$localeCode] }}"
                    class="btn btn-sm btn-outline-primary active">
                    {{ strtoupper($properties['native']) }}
                </a>
                @endif
                @endforeach
            </div>
            <!-- Light/Dark Mode Button -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i class="ri-moon-line light-mode-icon fs-22"></i>
                    <i class="ri-sun-line dark-mode-icon fs-22"></i>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                        data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <span class="fw-semibold">{{ auth()->user()->name }}</span>
                        </span>
                        <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('messages.Welcome') }} !</h6>
                        </div>

                        <!-- item-->
                        <a href="#" class="dropdown-item">
                            <i class="ri-account-circle-line me-1 fs-16 align-middle"></i>
                            <span class="align-middle">{{ __('messages.My Account') }}</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <form method="POST" action="#">
                            @csrf
                            <a class="dropdown-item fw-semibold text-danger" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-logout-box-line me-1 fs-16 align-middle"></i>
                                <span class="align-middle">{{ __('messages.Sign Out') }}</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-transparent">
            <form>
                <div class="card mb-1">
                    <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">
                        <i class="ri-search-line fs-22"></i>
                        <input type="search" class="form-control border-0" id="search-modal-input"
                            placeholder="Search for actions, people,">
                        <button type="submit" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">[esc]</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>