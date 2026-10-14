<?php

namespace RT\Techly\Helpers;

class Constants {

	const TECHLY_VERSION = '1.0.0';

	public static function get_version() {
		return WP_DEBUG ? time() : self::TECHLY_VERSION;
	}
}

