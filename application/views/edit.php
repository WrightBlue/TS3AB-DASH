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
								   placeholder="<?= $this->lang->line('bot')[0]; ?>" value="<?= $bot['name']; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-server"
								   placeholder="<?= $this->lang->line('bot')[1]; ?>" value="<?= $bot['server']; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-channel_id"
								   placeholder="<?= $this->lang->line('bot')[2]; ?>" value="<?= $bot['channel_id']; ?>">
							<hr>
							<input type="text" class="form-control" id="bot-group_id"
								   placeholder="<?= $this->lang->line('bot')[3]; ?>" value="<?= $bot['group_id']; ?>">
							<hr>
							<button class="btn btn-info btn-block" id="ajax-bot-edit" value="<?= $this->uri->segment(2).':'.$this->uri->segment(3); ?>"><?= $this->lang->line('bot')[9]; ?></button>
						<?php else: ?>
							<div class="alert alert-danger alert-highlighted text-center" role="alert"><?= $this->lang->line('main')[1]; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>