<!doctype html>
<html class="no-js">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--jQuery -->
    <script src="<?php echo MeansJS; ?>jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>bootstrap.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>main.css">
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansImages"); ?>splashy/splashy.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>smoke/themes/gebo.css">
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>jquery.gritter.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>metis_menu.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . $this->config->item("TemplateMeansCSS"); ?>chosen.css"/>
    <!-- DataTables stylesheet -->
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datatables/extras/TableTools/media/css/TableTools.css"/>
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datatables/css/jquery.dataTables.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet"
          href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>smoke/themes/gebo.css">

    <!--[if lt IE 9]>
    <script src="<?php echo base_url().$this->config->item('TemplateMeansLib');?>html5shiv/html5shiv.js"></script>
    <script src="<?php echo base_url().$this->config->item('TemplateMeansLib');?>respond/respond.min.js"></script>
    <![endif]-->
    <!--Modernizr-->
    <script
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>modernizr/modernizr.min.js"></script>
</head>
<body class="  ">
<div class="bg-dark dk" id="wrap">

    <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">

                <!-- Brand and toggle get grouped for better mobile display -->
                <header class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo $this->url; ?>" class="navbar-brand">
                        <?php echo $this->lang->line('login_header') ?>
                    </a>
                </header>
                <div class="topnav">
                    <div class="btn-group">
                        <a href="<?php echo $this->url . 'signin/logout' ?>" data-toggle="tooltip"
                           data-original-title="<?php echo $this->lang->line('logout'); ?>" data-placement="bottom"
                           class="btn btn-metis-1 btn-sm">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a data-placement="bottom" data-original-title="<?php echo $this->lang->line("full_screen") ?>"
                           data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <div class="btn-group">

                        <a data-placement="bottom" data-original-title="<?php echo $this->lang->line("messages") ?>"
                           href=javascript:void(0)" data-toggle="tooltip" class="btn btn-default btn-sm">
                            <i class="fa fa-comments"></i>
                            <span class="label label-success"></span>
                        </a>
                        <a data-placement="bottom" data-original-title="<?php echo $this->lang->line("new_events") ?>"
                           href="javascript:void(0)" data-toggle="tooltip" class="btn btn-default btn-sm">
                            <i class="fa fa-bell"></i>
                            <span class="label label-warning"></span>
                        </a>
                        <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                           class="btn btn-default btn-sm" href="#helpModal">
                            <i class="fa fa-question"></i>
                        </a>
                    </div>


                    <div class="btn-group">
                        <a data-placement="bottom"
                           data-original-title="<?php echo $this->lang->line("show-hide-menu") ?>" data-toggle="tooltip"
                           class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a data-placement="bottom"
                           data-original-title="<?php echo $this->lang->line("show-hide-menu") ?>" data-toggle="tooltip"
                           class="btn btn-default btn-sm toggle-right"> <span
                                class="glyphicon glyphicon-comment"></span> </a>
                    </div>


                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">

                    <!-- .nav -->
                    <ul class="nav navbar-nav">

                    </ul><!-- /.nav -->
                </div>
            </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
            <div class="search-bar">
                <form class="main-search" action="">
                    <div class="input-group">
                        <input type="text" class="form-control"
                               placeholder="<?php echo $this->lang->line('search') . "..."; ?>">
                <span class="input-group-btn">
            <button class="btn btn-primary btn-sm text-muted" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span>
                    </div>
                </form><!-- /.main-search -->
            </div><!-- /.search-bar -->
            <div class="main-bar">
                <h3>
                    <?php echo $title ?>
                </h3>
            </div><!-- /.main-bar -->
        </header><!-- /.head -->
    </div><!-- /#top -->
    <div id="left">
        <div class="media user-media bg-dark dker">
            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>
            </div>
            <div class="user-wrapper bg-dark">
                <a class="user-link" href="">
                    <img class="media-object img-thumbnail user-img" alt="User Picture"
                         src="<?php echo base_url() . $this->config->item('uploads_path') ?>images/users/admin.png">
                    <!--<span class="label label-danger user-label">16</span>-->
                </a>
                <div class="media-body">
                    <h5 class="media-heading">مدیر کل</h5>
                    <ul class="list-unstyled user-info">
                        <li> نام گروه : کاربر ارشد</li>
                        <li>سمت : مدیر سیستم
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
            <li>
                <a href="<?php echo base_url()."panel/Dashboard"; ?>">
                    <span class="menu_icon">
                         <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/dashboard.png">
                    </span>
                    <span class="link-title"><?php echo lang("dashboard"); ?></span>
                </a>
            </li>
            <li class="active">
                <a href="javascript:void(0)">
                            <span class="menu_icon">
                                 <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/products.png">
                            </span>
                    <span class="link-title"><?php echo lang("products"); ?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse in" aria-expanded="false">
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Manufacturers">
                            <span class="menu_icon">
                                <img
                                    src="<?php echo base_url() . config("uploads_path"); ?>images/menus/manufacturers.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_manufacturers"); ?></span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Product_Groups">
                            <span class="menu_icon">
                                <img
                                    src="<?php echo base_url() . config("uploads_path"); ?>images/menus/product_groups.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_product_groups"); ?></span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Products">
                            <span class="menu_icon">
                                <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/products.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_products"); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Product_Pictures">
                            <span class="menu_icon">
                                <img
                                    src="<?php echo base_url() . config("uploads_path"); ?>images/menus/product_pictures.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_product_pictures"); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Suggested_Products">
                            <span class="menu_icon">
                                <img
                                    src="<?php echo base_url() . config("uploads_path"); ?>images/menus/suggestion.png">
                            </span>
                            <span class="link-title"><?php echo lang("suggested_products"); ?></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <span class="menu_icon">
                         <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/orders.png">
                    </span>
                    <span class="link-title"><?php echo lang("manage_orders"); ?></span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="collapse in" aria-expanded="true">
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Shipping_Methods">
                            <span class="menu_icon">
                                <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/shipping.png">
                            </span>
                            <span class="link-title"><?php echo lang("shipping_methods"); ?></span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Orders_Status">
                            <span class="menu_icon">
                                <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/orders.png">
                            </span>
                            <span class="link-title"><?php echo lang("orders_status"); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Orders">
                            <span class="menu_icon">
                                <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/orders.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_orders"); ?></span></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>panel/Manage_Customers">
                            <span class="menu_icon">
                                <img src="<?php echo base_url() . config("uploads_path"); ?>images/menus/customers.png">
                            </span>
                            <span class="link-title"><?php echo lang("manage_customers"); ?></span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul><!-- /#menu -->
    </div>
    <div id="content">
        <div class="outer">
            <div class="inner bg-light lter">
                <?php
                // This is the main content partial
                echo $this->template->content;
                ?>
            </div><!-- /.inner -->
        </div><!-- /.outer -->
    </div><!-- /#content -->

</div>

<footer class="Footer bg-dark dker">
    <p>Footer Text</p>
</footer><!-- /#footer -->




<!--Bootstrap -->
<script src="<?php echo MeansJS; ?>bootstrap.min.js"></script>

<!-- MetisMenu -->
<script src="<?php echo MeansJS; ?>metisMenu.min.js"></script>
<script src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>smoke/smoke.js"></script>

<!-- Screenfull -->
<script src="<?php echo MeansJS; ?>screenfull.js"></script>

<!-- Metis core scripts -->
<script src="<?php echo MeansJS; ?>core.min.js"></script>


<!-- Metis demo scripts -->
<script src="<?php echo MeansJS; ?>app.js"></script>
<script src="<?php echo MeansJS; ?>jquery.maskedinput.min.js"></script>
<script src="<?php echo MeansJS; ?>chosen.jquery.min.js"></script>
<script src="<?php echo MeansJS; ?>jquery.gritter.min.js"></script>
<script type='text/javascript'
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>ckeditor/ckeditor.js"></script>

<link rel="stylesheet" type="text/css" media="screen"
      href="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datepicker/skins/aqua/theme.css"/>
<script type="text/javascript"
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datepicker/jalali.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datepicker/calendar.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datepicker/calendar-setup.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() . $this->config->item("TemplateMeansLib"); ?>datepicker/lang/calendar-fa.js"></script>


<!-- common functions -->
<script src="<?php echo base_url() . $this->config->item("MeansJS") ?>common.js"></script>
</body>