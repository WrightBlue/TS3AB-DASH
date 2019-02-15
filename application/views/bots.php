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
<div class="content-wrapper">
	<div class="content">
		<div class="row">
			<div class="col-12">
				<?php if (checkApi($this->config->item('ts3ab')['host'], $this->config->item('ts3ab')['port'])): ?>
					<div class="card card-table-border-none" id="recent-orders">
						<div class="card-body pt-0 pb-5">
							<table class="table card-table table-responsive table-responsive-large text-center">
								<thead>
								<tr>
									<th><?= $this->lang->line('bots')[0]; ?></th>
									<th><?= $this->lang->line('bots')[1]; ?></th>
									<th><?= $this->lang->line('bots')[2]; ?></th>
									<th><?= $this->lang->line('bots')[3]; ?></th>
								</tr>
								</thead>
								<tbody id="list">
								</tbody>
							</table>
						</div>
					</div>
				<?php else: ?>
					<div class="alert alert-danger alert-highlighted text-center" role="alert"><?= $this->lang->line('main')[1]; ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>