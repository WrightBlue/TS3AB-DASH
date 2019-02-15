<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/*
	 *
	 * Created by 'Wright.' for tsforum.pl.
	 *
	 * Contact:
	 *   > Teamspeak: ts3.black
	 *   > Mail: wright@ogarnij.se
	 *   > Github: WrightProjects
	 *
	 * Copyright (C) 2019 WrightProjects
	 *
	 */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>TS3AB DASHBOARD by Wright.</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
		  rel="stylesheet"/>
	<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet"/>
	<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/toaster/toastr.min.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/nprogress/nprogress.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/ladda/ladda.min.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
	<link href="<?= base_url(); ?>assets/css/sleek.css" id="sleek-css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/img/favicon.png" rel="shortcut icon"/>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="<?= base_url(); ?>assets/plugins/nprogress/nprogress.js"></script>
</head>
<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
<script>
    NProgress.configure({showSpinner: false});
    NProgress.start();
</script>
<div class="mobile-sticky-body-overlay"></div>
<div class="wrapper">
	<aside class="left-sidebar bg-sidebar">
		<div id="sidebar" class="sidebar sidebar-with-footer">
			<div class="app-brand">
				<a href="#">
					<svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
						 height="33" viewBox="0 0 30 33">
						<g fill="none" fill-rule="evenodd">
							<path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z"/>
							<path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
						</g>
					</svg>
					<span class="brand-name">TS3AB DASHBOARD</span>
				</a>
			</div>
			<div class="sidebar-scrollbar">
				<ul class="nav sidebar-inner" id="sidebar-menu">
					<li class="has-sub active expand">
						<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
						   data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
							<i class="mdi mdi-view-dashboard-outline"></i>
							<span class="nav-text">Dashboard</span>
							<b class="caret"></b>
						</a>
						<ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
							<div class="sub-menu">
								<li <?= strtolower($this->uri->segment(1)) == 'bots' ? 'class="active"' : ''; ?>>
									<a class="sidenav-item-link" href="<?= base_url('bots'); ?>"> <span class="nav-text"><?= $this->lang->line('header')[0]; ?></span></a>
								</li>
								<li <?= strtolower($this->uri->segment(1)) == 'create' ? 'class="active"' : ''; ?>>
									<a class="sidenav-item-link" href="<?= base_url('create'); ?>"> <span class="nav-text"><?= $this->lang->line('header')[1]; ?></span></a>
								</li>
							</div>
						</ul>
					</li>
					<li>
						<a class="sidenav-item-link" href="<?= base_url('logout'); ?>">
							<i class="mdi mdi-power-settings"></i>
							<span class="nav-text"><?= $this->lang->line('header')[2]; ?></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</aside>
	<div class="page-wrapper">
		<header class="main-header" id="header">
			<nav class="navbar navbar-static-top navbar-expand-lg">
				<button id="sidebar-toggler" class="sidebar-toggle">
					<span class="sr-only">Toggle navigation</span>
				</button>
			</nav>
		</header>