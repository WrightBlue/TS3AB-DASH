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
				<div class="card">
					<div class="card-body">
						<?php if (checkApi($this->config->item('ts3ab')['host'], $this->config->item('ts3ab')['port'])): ?>
							<input type="text" class="form-control" id="bot-name"
								   placeholder="<?= $this->lang->line('bot')[0]; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-server"
								   placeholder="<?= $this->lang->line('bot')[1]; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-channel_id"
								   placeholder="<?= $this->lang->line('bot')[2]; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-group_id"
								   placeholder="<?= $this->lang->line('bot')[3]; ?>">
							<hr>
							<button class="btn btn-info btn-block" id="ajax-bot-create"><?= $this->lang->line('bot')[4]; ?></button>
						<?php else: ?>
							<div class="alert alert-danger alert-highlighted text-center" role="alert"><?= $this->lang->line('main')[1]; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>