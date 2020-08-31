<?php

if (!function_exists('global_setting')) {
	function global_setting(string $key = null, $default = null) {
		$setting = app('global-setting');

		if (is_null($key)) {
			return $setting;
		}

		return $setting->get($key, $default);
	}
}