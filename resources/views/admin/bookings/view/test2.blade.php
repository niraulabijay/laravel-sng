<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Invoice Application</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('cork/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('cork/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/apps/invoice.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body class="alt-menu sidebar-noneoverflow">
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="index.html"><img alt="logo" src="assets/img/90x90.jpg"> <span class="navbar-brand-name">CORK</span></a>
            </div>

            <ul class="navbar-item flex-row mr-auto">
                <li class="nav-item align-self-center search-animated">
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </li>
            </ul>

            <ul class="navbar-item flex-row nav-dropdowns">
                <li class="nav-item dropdown language-dropdown more-dropdown">
                    <div class="dropdown custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/img/ca.png" class="flag-width" alt="flag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="de" data-value="de" href="javascript:void(0);"><img src="assets/img/de.png" class="flag-width" alt="flag"> German</a>
                            <a class="dropdown-item" data-img-value="jp" data-value="jp" href="javascript:void(0);"><img src="assets/img/jp.png" class="flag-width" alt="flag"> Japanese</a>
                            <a class="dropdown-item" data-img-value="fr" data-value="fr" href="javascript:void(0);"><img src="assets/img/fr.png" class="flag-width" alt="flag"> French</a>
                            <a class="dropdown-item" data-img-value="ca" data-value="en" href="javascript:void(0);"><img src="assets/img/ca.png" class="flag-width" alt="flag"> English</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu p-0 position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">
                            <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">KY</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Kara Young</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="">
                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">DA</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Daisy Anderson</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">OG</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Oscar Garner</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">

                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>    <link rel="stylesheet" type="text/css"  href="{{asset('cork/assets/css/apps/invoice.css')}}"/>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <img src="assets/img/90x90.jpg" class="img-fluid" alt="admin-profile">
                            <div class="media-body align-self-center">
                                <h6><span>Hi,</span> Alan</h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> My Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> Inbox</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Lock Screen</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> CORK </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="topAccordion">

                    <li class="menu single-menu">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle autodroprown">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#topAccordion">
                            <li>
                                <a href="index.html"> Analytics </a>
                            </li>
                            <li>
                                <a href="index2.html"> Sales </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu active">
                        <a href="#app" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Apps</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                            <li>
                                <a href="apps_chat.html"> Chat </a>
                            </li>
                            <li>
                                <a href="apps_mailbox.html"> Mailbox </a>
                            </li>
                            <li>
                                <a href="apps_todoList.html"> Todo List </a>
                            </li>
                            <li>
                                <a href="apps_notes.html">Notes</a>
                            </li>
                            <li>
                                <a href="apps_scrumboard.html">Task Board</a>
                            </li>
                            <li>
                                <a href="apps_contacts.html">Contacts</a>
                            </li>
                            <li class="active">
                                <a href="apps_invoice.html">Invoice List</a>
                            </li>
                            <li>
                                <a href="apps_calendar.html"> Calendar</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu single-menu">
                        <a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Components</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="components" data-parent="#topAccordion">
                            <li>
                                <a href="component_tabs.html"> Tabs </a>
                            </li>
                            <li>
                                <a href="component_accordion.html"> Accordions  </a>
                            </li>
                            <li>
                                <a href="component_modal.html"> Modals </a>
                            </li>                            
                            <li>
                                <a href="component_cards.html"> Cards </a>
                            </li>
                            <li>
                                <a href="component_bootstrap_carousel.html">Carousel</a>
                            </li>
                            <li>
                                <a href="component_blockui.html"> Block UI </a>
                            </li>
                            <li>
                                <a href="component_countdown.html"> Countdown </a>
                            </li>
                            <li>
                                <a href="component_counter.html"> Counter </a>
                            </li>
                            <li>
                                <a href="component_sweetalert.html"> Sweet Alerts </a>
                            </li>
                            <li>
                                <a href="component_timeline.html"> Timeline </a>
                            </li>
                            <li>
                                <a href="component_snackbar.html"> Notifications </a>
                            </li>
                            <li>
                                <a href="component_session_timeout.html"> Session Timeout </a>
                            </li>
                            <li>
                                <a href="component_media_object.html"> Media Object </a>
                            </li>
                            <li>
                                <a href="component_list_group.html"> List Group </a>
                            </li>
                            <li>
                                <a href="component_pricing_table.html"> Pricing Tables </a>
                            </li>
                            <li>
                                <a href="component_lightbox.html"> Lightbox </a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu single-menu">
                        <a href="#uiKit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>UI Kit</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="uiKit" data-parent="#topAccordion">
                            <li>
                                <a href="ui_alerts.html"> Alerts </a>
                            </li>
                            <li>
                                <a href="ui_avatar.html"> Avatar </a>
                            </li>
                            <li>
                                <a href="ui_badges.html"> Badges </a>
                            </li>
                            <li>
                                <a href="ui_breadcrumbs.html"> Breadcrumbs </a>
                            </li>                            
                            <li>
                                <a href="ui_buttons.html"> Buttons </a>
                            </li>
                            <li>
                                <a href="ui_buttons_group.html"> Button Groups </a>
                            </li>
                            <li>
                                <a href="ui_color_library.html"> Color Library </a>
                            </li>
                            <li>
                                <a href="ui_dropdown.html"> Dropdown </a>
                            </li>
                            <li>
                                <a href="ui_infobox.html"> Infobox </a>
                            </li>
                            <li>
                                <a href="ui_jumbotron.html"> Jumbotron </a>
                            </li>
                            <li>
                                <a href="ui_loader.html"> Loader </a>
                            </li>
                            <li>
                                <a href="ui_pagination.html"> Pagination </a>
                            </li>
                            <li>
                                <a href="ui_popovers.html"> Popovers </a>
                            </li>
                            <li>
                                <a href="ui_progress_bar.html"> Progress Bar </a>
                            </li>
                            <li>
                                <a href="ui_search.html"> Search </a>
                            </li>
                            <li>
                                <a href="ui_tooltips.html"> Tooltips </a>
                            </li>
                            <li>
                                <a href="ui_treeview.html"> Treeview </a>
                            </li>
                            <li>
                                <a href="ui_typography.html"> Typography </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu">
                        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                                <span>Tables</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="tables"  data-parent="#topAccordion">
                            <li>
                                <a href="table_basic.html"> Basic </a>
                            </li>
                            <li class="sub-sub-submenu-list">
                                <a href="#datatable" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> DataTables <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="datatable" data-parent="#datatable">
                                    <li>
                                        <a href="table_dt_basic.html"> Basic </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_basic-dark.html"> Dark </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_ordering_sorting.html"> Order Sorting </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_multi-column_ordering.html"> Multi-Column </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_multiple_tables.html"> Multiple Tables</a>
                                    </li>
                                    <li>
                                        <a href="table_dt_alternative_pagination.html"> Alt. Pagination</a>
                                    </li>
                                    <li>
                                        <a href="table_dt_custom.html"> Custom </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_range_search.html"> Range Search </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_html5.html"> HTML5 Export </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_live_dom_ordering.html"> Live DOM ordering </a>
                                    </li>
                                    <li>
                                        <a href="table_dt_miscellaneous.html"> Miscellaneous </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu">
                        <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                <span>Forms</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="forms"  data-parent="#topAccordion">
                            <li>
                                <a href="form_bootstrap_basic.html"> Basic </a>
                            </li>
                            <li>
                                <a href="form_input_group_basic.html"> Input Group </a>
                            </li>
                            <li>
                                <a href="form_layouts.html"> Layouts </a>
                            </li>
                            <li>
                                <a href="form_validation.html"> Validation </a>
                            </li>
                            <li>
                                <a href="form_input_mask.html"> Input Mask </a>
                            </li>
                            <li>
                                <a href="form_bootstrap_select.html"> Bootstrap Select </a>
                            </li>
                            <li>
                                <a href="form_select2.html"> Select2 </a>
                            </li>
                            <li>
                                <a href="form_bootstrap_touchspin.html"> TouchSpin </a>
                            </li>
                            <li>
                                <a href="form_maxlength.html"> Maxlength </a>
                            </li>
                            <li>
                                <a href="form_checkbox_radio.html"> Checkbox &amp; Radio </a>
                            </li>
                            <li>
                                <a href="form_switches.html"> Switches </a>
                            </li>
                            <li>
                                <a href="form_wizard.html"> Wizards </a>
                            </li>
                            <li>
                                <a href="form_fileupload.html"> File Upload </a>
                            </li>
                            <li>
                                <a href="form_quill.html"> Quill Editor </a>
                            </li>
                            <li>
                                <a href="form_markdown.html"> Markdown Editor </a>
                            </li>
                            <li>
                                <a href="form_date_range_picker.html"> Date &amp; Range Picker </a>
                            </li>
                            <li>
                                <a href="form_clipboard.html"> Clipboard </a>
                            </li>
                            <li>
                                <a href="form_typeahead.html"> Typeahead </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu">
                        <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Pages</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="page"  data-parent="#topAccordion">
                            <li>
                                <a href="pages_helpdesk.html"> Helpdesk </a>
                            </li>
                            <li>
                                <a href="pages_contact_us.html"> Contact Form </a>
                            </li>
                            <li>
                                <a href="pages_faq.html"> FAQ </a>
                            </li>
                            <li>
                                <a href="pages_faq2.html"> FAQ 2 </a>
                            </li>
                            <li>
                                <a href="pages_privacy.html"> Privacy Policy </a>
                            </li>
                            <li>
                                <a href="pages_coming_soon.html"> Coming Soon </a>
                            </li>
                            <li>
                                <a href="user_profile.html"> Profile </a>
                            </li>
                            <li>
                                <a href="user_account_setting.html"> Account Settings </a>
                            </li>
                            <li class="sub-sub-submenu-list">
                                <a href="#pages-error" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Error <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="pages-error" data-parent="#more"> 
                                    <li>
                                        <a href="pages_error404.html"> 404 </a>
                                    </li>
                                    <li>
                                        <a href="pages_error500.html"> 500 </a>
                                    </li>
                                    <li>
                                        <a href="pages_error503.html"> 503 </a>
                                    </li>
                                    <li>
                                        <a href="pages_maintenence.html"> Maintanence </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-sub-submenu-list">
                                <a href="#user-login" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Login <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="user-login" data-parent="#page"> 
                                    <li>
                                        <a href="auth_login.html"> Login </a>
                                    </li>
                                    <li>
                                        <a href="auth_login_boxed.html"> Login Boxed </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-sub-submenu-list">
                                <a href="#user-register" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Register <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="user-register" data-parent="#page"> 
                                    <li>
                                        <a href="auth_register.html"> Register </a>
                                    </li>
                                    <li>
                                        <a href="auth_register_boxed.html"> Register Boxed </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-sub-submenu-list">
                                <a href="#user-passRecovery" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Password Recovery <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="user-passRecovery" data-parent="#page"> 
                                    <li>
                                        <a href="auth_pass_recovery.html"> Recover ID </a>
                                    </li>
                                    <li>
                                        <a href="auth_pass_recovery_boxed.html"> Recover ID Boxed </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-sub-submenu-list">
                                <a href="#user-lockscreen" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Lockscreen <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu" id="user-lockscreen" data-parent="#page"> 
                                    <li>
                                        <a href="auth_lockscreen.html"> Unlock </a>
                                    </li>
                                    <li>
                                        <a href="auth_lockscreen_boxed.html"> Unlock Boxed </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menu single-menu">
                        <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                <span>More</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                            <li>
                                <a href="dragndrop_dragula.html"> Drag and Drop</a>
                            </li>
                            <li>
                                <a href="widgets.html"> Widgets </a>
                            </li>
                            <li>
                                <a href="map_jvector.html"> Vector Maps</a>
                            </li>
                            <li>
                                <a href="charts_apex.html"> Charts </a>
                            </li>
                            <li>
                                <a href="fonticons.html"> Font Icons </a>
                            </li>
                            <li class="sub-sub-submenu-list">
                                <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Starter Kit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp" id="starter-kit" data-parent="#more">
                                    <li>
                                        <a href="starter_kit_blank_page.html"> Blank Page </a>
                                    </li>
                                    <li>
                                        <a href="starter_kit_breadcrumb.html"> Breadcrumb </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="../../documentation/index.html"> Documentation </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row invoice layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="app-hamburger-container">
                            <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                        </div>
                        <div class="doc-container">
                            <div class="tab-title">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="search">
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                        <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00001</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Jesse Cory</p>
                                                            <p class="invoice-generated-date">Date: 12 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00002" data-invoice-id="00002">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00002</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Linda Nelson</p>
                                                            <p class="invoice-generated-date">Date: 13 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00003" data-invoice-id="00003">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00003</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Andy King</p>
                                                            <p class="invoice-generated-date">Date: 13 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00004" data-invoice-id="00004">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00004</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Luke Ivory</p>
                                                            <p class="invoice-generated-date">Date: 13 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00005" data-invoice-id="00005">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00005</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Susan Phillips</p>
                                                            <p class="invoice-generated-date">Date: 14 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00006" data-invoice-id="00006">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00006</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Thomas Granger</p>
                                                            <p class="invoice-generated-date">Date: 15 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00007" data-invoice-id="00007">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00007</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Donna Rogers</p>
                                                            <p class="invoice-generated-date">Date: 16 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00008" data-invoice-id="00008">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00008</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Angie Lamb</p>
                                                            <p class="invoice-generated-date">Date: 17 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00009" data-invoice-id="00009">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00009</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Mary Mcdonald</p>
                                                            <p class="invoice-generated-date">Date: 17 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00010" data-invoice-id="00010">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00010</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Thomas Granger</p>
                                                            <p class="invoice-generated-date">Date: 18 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00011" data-invoice-id="00011">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00011</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Sonia Shaw</p>
                                                            <p class="invoice-generated-date">Date: 19 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00012" data-invoice-id="00012">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00012</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Laurie Fox</p>
                                                            <p class="invoice-generated-date">Date: 19 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00013" data-invoice-id="00013">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00013</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Ryan McKillop</p>
                                                            <p class="invoice-generated-date">Date: 19 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00014" data-invoice-id="00014">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00014</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Jimmy Turner</p>
                                                            <p class="invoice-generated-date">Date: 20 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-00015" data-invoice-id="00015">
                                                    <div class="f-m-body">
                                                        <div class="f-head">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number">Invoice #00015</p>
                                                            <p class="invoice-customer-name"><span>To:</span> Roxanne</p>
                                                            <p class="invoice-generated-date">Date: 20 Apr 2019</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-container">
                                <div class="invoice-inbox">

                                    <div class="inv-not-selected">
                                        <p>Open an invoice from the list.</p>
                                    </div>

                                    <div class="invoice-header-section">
                                        <h4 class="inv-number"></h4>
                                        <div class="invoice-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="Reply"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                        </div>
                                    </div>
                                    
                                    <div id="ct" class="">
                                        
                                        <div class="invoice-00001">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Jesse Cory</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> 

                                        <div class="invoice-00002">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Linda Nelson</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00003">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Andy King</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00004">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Luke Ivory</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00005">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Susan Phillips</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00006">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Thomas Granger</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00007">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Donna Rogers</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00008">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Angie Lamb</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00009">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Mary Mcdonald</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00010">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Thomas Granger</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00011">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Sonia Shaw</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00012">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Laurie Fox</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00013">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Ryan McKillop</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00014">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Jimmy Turner</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="invoice-00015">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">INVOICE</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hexagon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                                                            <h5 class="inv-brand-name">CORK</h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row inv--detail-section">

                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-to">Invoice To</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                        <p class="inv-detail-title">From : XYZ Company</p>
                                                    </div>
                                                    
                                                    <div class="col-sm-7 align-self-center">
                                                        <p class="inv-customer-name">Roxanne</p>
                                                        <p class="inv-street-addr">405 Mulberry Rd. Mc Grady, NC, 28649</p>
                                                        <p class="inv-email-address">redq@company.com</p>
                                                    </div>
                                                    <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                        <p class="inv-list-number"><span class="inv-title">Invoice Number : </span> <span class="inv-number">[invoice number]</span></p>
                                                        <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Aug 2019</span></p>
                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Aug 2019</span></p>
                                                    </div>
                                                </div>

                                                <div class="row inv--product-table-section">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Items</th>
                                                                        <th class="text-right" scope="col">Qty</th>
                                                                        <th class="text-right" scope="col">Unit Price</th>
                                                                        <th class="text-right" scope="col">Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Electric Shaver</td>
                                                                        <td class="text-right">20</td>
                                                                        <td class="text-right">$300</td>
                                                                        <td class="text-right">$2800</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Earphones</td>
                                                                        <td class="text-right">49</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$7000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Wireless Router</td>
                                                                        <td class="text-right">30</td>
                                                                        <td class="text-right">$500</td>
                                                                        <td class="text-right">$3500</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        <div class="inv--payment-info">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">Payment Info:</h6>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Bank Name: </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">Bank of America</p>
                                                                </div>
                                                                <div class="col-sm-4 col-12">
                                                                    <p class=" inv-subtitle">Account Number : </p>
                                                                </div>
                                                                <div class="col-sm-8 col-12">
                                                                    <p class="">1234567890</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                        <div class="inv--total-amounts text-sm-right">
                                                            <div class="row">
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Sub Total: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$13300</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class="">Tax Amount: </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7">
                                                                    <p class=" discount-rate">Discount : <span class="discount-percentage">5%</span> </p>
                                                                </div>
                                                                <div class="col-sm-4 col-5">
                                                                    <p class="">$700</p>
                                                                </div>
                                                                <div class="col-sm-8 col-7 grand-total-title">
                                                                    <h4 class="">Grand Total : </h4>
                                                                </div>
                                                                <div class="col-sm-4 col-5 grand-total-amount">
                                                                    <h4 class="">$14000</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="inv--thankYou">
                                    <div class="row">
                                        <div class="col-sm-12 col-12">
                                            <p class="">Thank you for doing Business with us.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>

                    </div>
                </div>
                </div>
        <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('cork/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('cork/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('cork/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('cork/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('cork/assets/js/app.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('cork/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('cork/assets/js/apps/invoice.js')}}"></script>
</body>
</html>