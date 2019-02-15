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
<footer class="footer mt-auto">
	<div class="copyright bg-white text-center">
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
</footer>
</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/toaster/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/charts/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/ladda/spin.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/ladda/ladda.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jekyll-search.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sleek.js"></script>
<script src="<?= base_url(); ?>assets/js/chart.js"></script>
<script src="<?= base_url(); ?>assets/js/date-range.js"></script>
<script src="<?= base_url(); ?>assets/js/map.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
		<?php if ($this->uri->segment(1) == 'create'): ?>

        $(document).on('click', '#ajax-bot-create', function () {
            $.ajax({
                url: '<?= base_url('api/bot/create'); ?>',
                type: 'post',
                data: {
                    name: document.getElementById('bot-name').value,
                    server: document.getElementById('bot-server').value,
                    channel_id: document.getElementById('bot-channel_id').value,
                    group_id: document.getElementById('bot-group_id').value
                },
                success: function (data) {
                    printAlert(data.success, data.message);
                }
            });
        });
		<?php elseif ($this->uri->segment(1) == 'bots'): ?>

        var load = () => {
            $.ajax({
                url: '<?= base_url('api/bot/list'); ?>',
                type: 'get',
                success: function (data) {
                    $('[data-toggle="tooltip"]').tooltip('hide');
                    $("#list").empty();
                    if ("message" in data) {
                        printAlert(false, data.message);
                        return;
                    }
                    var html = '';
                    $.each(data, function (index, val) {
                        html += `<tr><td>${(index + 1)}</td><td>${val.Name}</td><td>${(val.status ? '<span class="badge badge-success"><?= $this->lang->line("bots")[4]; ?></span>' : '<span class="badge badge-danger"><?= $this->lang->line("bots")[5]; ?></span>')}</td>`;
                        if (val.status) {
                            html += `<td>
									<button class="btn btn-danger btn-sm btn-ladda"
											data-toggle="tooltip" data-placement="top"
											title="<?= $this->lang->line('bots')[6]; ?>" id="ajax-bot-disconnect" value="${val.Id}">
										<span class="ladda-label">
											<i class="fas fa-times-circle"></i>
										</span>
										<span class="ladda-spinner"></span>
									</button>
									<a href="<?= base_url('edit/'); ?>${val.Config}/${val.Id}">
										<button class="btn btn-info btn-sm btn-ladda"
												data-toggle="tooltip" data-placement="top"
												title="<?= $this->lang->line('bots')[8]; ?>">
											<i class="fas fa-edit"></i>
										</button>
									</a>
									<button class="btn btn-warning btn-sm btn-ladda"
											data-toggle="tooltip" data-placement="top"
											title="<?= $this->lang->line('bots')[9]; ?>"  id="ajax-bot-delete" value="${val.Config}">
										<span class="ladda-label">
											<i class="fas fa-trash-alt"></i>
										</span>
										<span class="ladda-spinner"></span>
									</button>
								</td>
							</tr>`;
                        } else {
                            html += `<td>
									<button class="btn btn-success btn-sm btn-ladda"
											data-toggle="tooltip" data-placement="top"
											title="<?= $this->lang->line('bots')[7]; ?>" id="ajax-bot-connect" value="${val.Config}">
										<span class="ladda-label">
											<i class="fas fa-power-off"></i>
										</span>
										<span class="ladda-spinner"></span>
									</button>
									<button class="btn btn-warning btn-sm btn-ladda"
											data-toggle="tooltip" data-placement="top"
											title="<?= $this->lang->line('bots')[9]; ?>" id="ajax-bot-delete" value="${val.Config}">
										<span class="ladda-label">
											<i class="fas fa-trash-alt"></i>
										</span>
										<span class="ladda-spinner"></span>
									</button>
								</td>
							</tr>`;
                        }
                    });
                    $('#list').append(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        };
        load();
        setInterval(() => {
            load();
        }, 1000 * 10);
        $(document).on('click', '#ajax-bot-disconnect', function () {
            $.ajax({
                url: '<?= base_url('api/bot/disconnect'); ?>',
                type: 'post',
                data: {
                    id: $(this).val(),
                },
                success: function (data) {
                    if (data.success) {
                        load();
                    }
                    printAlert(data.success, data.message);
                }
            });
        });
        $(document).on('click', '#ajax-bot-connect', function () {
            $.ajax({
                url: '<?= base_url('api/bot/connect'); ?>',
                type: 'post',
                data: {
                    id: $(this).val(),
                },
                success: function (data) {
                    if (data.success) {
                        load();
                    }
                    printAlert(data.success, data.message);
                }
            });
        });
        $(document).on('click', '#ajax-bot-delete', function () {
            $.ajax({
                url: '<?= base_url('api/bot/delete'); ?>',
                type: 'post',
                data: {
                    id: $(this).val(),
                },
                success: function (data) {
                    if (data.success) {
                        load();
                    }
                    printAlert(data.success, data.message);
                }
            });
        });
		<?php elseif ($this->uri->segment(1) == 'edit'): ?>
        $(document).on('click', '#ajax-bot-edit', function () {
            var bot = $(this).val().split(":");
            $.ajax({
                url: '<?= base_url('api/bot/edit'); ?>',
                type: 'post',
                data: {
                    template: bot[0],
                    id: bot[1],
                    name: document.getElementById('bot-name').value,
                    server: document.getElementById('bot-server').value,
                    channel_id: document.getElementById('bot-channel_id').value,
                    group_id: document.getElementById('bot-group_id').value
                },
                success: function (data) {
                    printAlert(data.success, data.message);
                }
            });
        });
		<?php endif; ?>
    });

    function printAlert(type, message) {
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "300",
            timeOut: "2500",
            extendedTimeOut: "500",
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


