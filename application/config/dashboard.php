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


	/*
	 * Languages:
	 *
	 *   > 'polish' by WrightProjects
	 *
	 */
	$config['language'] = 'polish';

	$config['auth'] = array(
		'login' => 'admin',
		'password' => 'foobar'
	);

	$config['ts3ab'] = array(
		'host' => '127.0.0.1',
		'port' => 58913,
		'path' => '/home/TS3AudioBot/',
		'useruid' => 'DBBrFo5v4Z/vANmZKccjAEilfdw=',
		'apitoken' => '5IIz3LyV7mAjDRIsoK04mCOQbBMXeIn6',
		'group_rights' => array(
			'cmd.play',
			'cmd.stop',
			'cmd.list.get',
			'cmd.list.play',
			'cmd.song',
		),
	);