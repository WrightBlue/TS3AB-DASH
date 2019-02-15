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
<html lang="en">
<head>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>TS3AB DASHBOARD by Wright.</title>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
			  rel="stylesheet"/>
		<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/toaster/toastr.min.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/nprogress/nprogress.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/ladda/ladda.min.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/css/sleek.css" id="sleek-css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>assets/img/favicon.png" rel="shortcut icon"/>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?= base_url(); ?>assets/plugins/nprogress/nprogress.js"></script>
	</head>
</head>
<body class="bg-light-gray" id="body">
<div class="container d-flex flex-column justify-content-between vh-100">
	<div class="row justify-content-center mt-5">
		<div class="col-xl-5 col-lg-6 col-md-10">
			<div class="card">
				<div class="card-header bg-primary">
					<div class="app-brand">
						<a href="#">
							<svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
								 width="30" height="33"
								 viewBox="0 0 30 33">
								<g fill="none" fill-rule="evenodd">
									<path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z"/>
									<path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
								</g>
							</svg>
							<span class="brand-name">TS3AB DASHBOARD</span> </a>
					</div>
				</div>
				<div class="card-body p-5">
					<h4 class="text-dark mb-5 text-center"><?= $this->lang->line('auth')[0]; ?></h4>
					<div class="row">
						<div class="form-group col-md-12 mb-4">
							<input type="login" class="form-control input-lg" id="dash-login"
								   placeholder="<?= $this->lang->line('auth')[1]; ?>">
						</div>
						<div class="form-group col-md-12 ">
							<input type="password" class="form-control input-lg" id="dash-password"
								   placeholder="<?= $this->lang->line('auth')[2]; ?>">
						</div>
						<div class="col-md-12">
							<button id="ajax-login" type="submit"
									class="btn btn-lg btn-primary btn-block mb-4"><?= $this->lang->line('auth')[3]; ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright pl-0 text-center">
		<p>
			&copy; <span id="copy-year">2019</span> Front-end by <a
					class="text-primary"
					href="http://www.iamabdus.com/"
					target="_blank">Abdus</a> | Back-end by <a
					class="text-primary"
					href="https://github.com/WrightProjects"
					target="_blank">WrightProjects</a>.
		</p>
	</div>
</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/toaster/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#ajax-login', function () {
            $.ajax({
                url: '<?= base_url('api/home'); ?>',
				type: 'post',
				data: {
                    login: document.getElementById('dash-login').value,
                    password: document.getElementById('dash-password').value
                },
				success: function (data) {
                    printAlert(data.success, data.message);
                    if (data.success) {
                        setInterval(function () {
                            window.location.href = "./bots";
                        }, 1000);
                    }
                }
            });
        });
    });
    function printAlert(type, message)
	{
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "2000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
        if (type) {
            toastr.success(message, "<?= $this->lang->line('main')[0]; ?>");
        } else {
            toastr.error(message, "<?= $this->lang->line('main')[0]; ?>");
        }
	}
</script>
</body>
</html>
