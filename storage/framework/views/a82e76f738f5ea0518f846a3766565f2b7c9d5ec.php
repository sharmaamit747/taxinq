
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <meta name="base_url" content="<?php echo e(url('')); ?>">
        <link href="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.css")); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset("assets/plugins/simplebar/css/simplebar.css")); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset("assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css")); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset("assets/plugins/metismenu/css/metisMenu.min.css")); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset("assets/css/pace.min.css")); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset("assets/plugins/notifications/css/lobibox.min.css")); ?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link href="<?php echo e(asset("assets/plugins/datatable/css/dataTables.bootstrap4.min.css")); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset("assets/plugins/datatable/css/buttons.bootstrap4.min.css")); ?>" rel="stylesheet" type="text/css">
        <script src="<?php echo e(asset("assets/js/pace.min.js")); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/bootstrap.min.css")); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/sweetalert.css")); ?>" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/icons.css")); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/app.css")); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/dark-sidebar.css")); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/dark-theme.css")); ?>" />
    </head>
    <body>
        <div class="wrapper">
            <!--sidebar-wrapper-->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div class="">
                        <img src="<?php echo e(url('images/logo.png')); ?>" class="logo-icon-2" alt="" />
                    </div>
                    <div>
                        <h4 class="logo-text">Arif Pharma</h4>
                    </div>
                    <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
                    </a>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="#">
                        <div class="parent-icon icon-color-10">
                            <i class="bx bx-home"></i>
                            </div>
                        <div class="menu-title">Home</div>
                        </a>   
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon icon-color-10"><i class="bx bx-news"></i>
                            </div>
                            <div class="menu-title">Blog</div>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo e(url('admin/blog')); ?>"><i class="bx bx-right-arrow-alt"></i>Blogs</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/blog-categories')); ?>"><i class="bx bx-right-arrow-alt"></i>Categories</a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('admin/blog-tags')); ?>"><i class="bx bx-right-arrow-alt"></i>Tags</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon icon-color-10"><i class="bx bx-book"></i>
                            </div>
                            <div class="menu-title">E-Book</div>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo e(url('admin/ebooks')); ?>"><i class="bx bx-right-arrow-alt"></i>E-Books</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon icon-color-10"><i class="bx bx-shape-polygon"></i>
                            </div>
                            <div class="menu-title">Settings</div>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo e(url('admin/slider')); ?>"><i class="bx bx-right-arrow-alt"></i>Slider</a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar-wrapper-->
            <!--header-->
            <header class="top-header">
                <nav class="navbar navbar-expand">
                    <div class="left-topbar d-flex align-items-center">
                        <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
                        </a>
                    </div>
<!--                    <div class="flex-grow-1 search-bar">
                        <div class="input-group">
                            <button class="btn btn-search-back search-arrow-back" type="button"><i class="bx bx-arrow-back"></i></button>
                            <input type="text" class="form-control" placeholder="search" />
                            <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>-->
                    <div class="right-topbar ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item search-btn-mobile">
                                <a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-lg">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-bs-toggle="dropdown">	<span class="msg-count">6</span>
                                    <i class="bx bx-comment-detail vertical-align-middle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <h6 class="msg-header-title">6 New</h6>
                                            <p class="msg-header-subtitle">Application Messages</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-lg">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-bs-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                                    <span class="msg-count">8</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <h6 class="msg-header-title">8 New</h6>
                                            <p class="msg-header-subtitle">Application Notifications</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-user-profile">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                                    <div class="d-flex user-box align-items-center">
                                        <div class="user-info">
                                            <p class="user-name mb-0">Amit Kumar</p>
                                            <p class="designattion mb-0">Available</p>
                                        </div>
                                        <img src="<?php echo e(url('assets/images/avatars/avatar-1.png')); ?>" class="user-img" alt="user avatar">
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">	
                                    <a class="dropdown-item" href="javascript:;"><i
                                            class="bx bx-user"></i><span>Profile</span></a>
                                    <a class="dropdown-item" href="javascript:;"><i
                                            class="bx bx-cog"></i><span>Settings</span></a>
                                    <a class="dropdown-item" href="javascript:;"><i
                                            class="bx bx-tachometer"></i><span>Dashboard</span></a>
                                    <div class="dropdown-divider mb-0"></div>	
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off"></i><span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!--end header-->
            <!--page-wrapper-->
            <div class="page-wrapper">
                <!--page-content-wrapper-->
                <?php echo $__env->yieldContent('content'); ?>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--footer -->
            <div class="footer">
                <p class="mb-0">Arif Pharma @2023  | Developed By : <a href="https://arifpharma.com" target="_blank">Amit Kumar</a>
                </p>
            </div>
            <!-- end footer -->
        </div>

        <script src="<?php echo e(asset("assets/js/bootstrap.bundle.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/jquery.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/simplebar/js/simplebar.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/metismenu/js/metisMenu.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-in-mill.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/vectormap/jquery-jvectormap-au-mill.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/apexcharts-bundle/js/apexcharts.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/datatable/js/jquery.dataTables.min.js")); ?>"></script>
        <script src="<?php echo e(asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/sweetalert.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/notifications/js/lobibox.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/notifications/js/notifications.min.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/plugins/notifications/js/notification-custom-script.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/smooth-submit.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/index2.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/app.js")); ?>"></script>
        <script src="<?php echo e(asset("assets/js/admin.js")); ?>"></script>
    </body>
</html>

<?php /**PATH E:\xampp\htdocs\pharma\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
