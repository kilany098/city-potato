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
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-archive-2-line"></i></span>
                    <span class="menu-text"> {{__('messages.Dashboard')}} </span>
                </a>
            </li>

            <li class="side-nav-title">{{__('messages.Manage Users')}}</li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-user-line"></i></span>
                    <span class="menu-text"> {{__('messages.Users')}} </span>
                </a>
            </li>


            <li class="side-nav-title">{{__('Manage HR')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarHR" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-briefcase-line"></i></span>
                    <span class="menu-text">{{__('HR')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarHR">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Sectors')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Contracts')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Monthly Salaries')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Allowances')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="side-nav-title">{{__('Manage Inventory')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarInventory" aria-expanded="false" aria-controls="sidebarInventory"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-archive-line"></i></span>
                    <span class="menu-text">{{__('Inventory')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInventory">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Stock')}}</span>
                                <span class="badge bg-danger rounded"> {{__('Stock Alert')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Requests')}}</span>
                                <span class="badge bg-danger rounded"> {{__('Requests')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Transactions')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Warehouses')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Categories')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Items')}}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="side-nav-title">{{__('Manage Sales')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSales" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-line-chart-line"></i></span>
                    <span class="menu-text">{{__('Sales')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSales">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Clients')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Contracts')}}</span>
                                <span class="badge bg-danger rounded"> {{__('New')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="side-nav-title">{{__('Manage Operations')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarOperations" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-pulse-line"></i></span>
                    <span class="menu-text">{{__('Operations')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarOperations">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Pending Orders')}}</span>
                                <span class="badge bg-danger rounded"> {{__('order')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Attributions')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Work Orders')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Urgent Orders')}}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="side-nav-title">{{__('Financial Management')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarFinancial" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-pie-chart-line"></i></span>
                    <span class="menu-text">{{__('Financial')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarFinancial">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Dashboard')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Chart of Accounts')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Journal Entries')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Invoices')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Reports')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Profit & Loss')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Balance Sheet')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Trial Balance')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @endrole
            @role('technician')
            <li class="side-nav-title">{{__('Technical Assignments')}}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTechnical" aria-expanded="false" aria-controls="sidebarOperations"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ri-clipboard-line"></i></span>
                    <span class="menu-text">{{__('Assignments')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTechnical">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Monthly Assignments')}}</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('Daily Assignments')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-archive-line"></i></span>
                    <span class="menu-text"> {{__('My Inventory')}} </span>
                </a>
            </li>

            @endrole
            @role('superadmin')
            <li class="side-nav-title">{{__('Settings')}}</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings" class="side-nav-link">
                    <span class="menu-icon"><i class="ri-settings-line"></i></span>
                    <span class="menu-text">{{__('Settings')}}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">{{__('SMTP Settings')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endrole
        </ul>
    </div>

    <div class="clearfix"></div>
</div>