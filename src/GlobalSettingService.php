<?php

namespace ScriptingBeating\GlobalSetting;

use Illuminate\Support\Facades\Cache;
use ScriptingBeating\GlobalSetting\Models\GlobalSetting;

class GlobalSettingService
{
	public function all()
	{
		return $this->getAllSettings()->pluck('value', 'key')->toArray();
	}

	public function get(string $key, $default = null)
	{
		$setting = $this->getAllSettings()->where('key', $key)->first();

		if (!$setting) {
			return $default;
		}

		return $this->castTo($setting->value, $setting->type);
	}

	public function set(string $key, string $value, $type = null)
	{
		$setting = $this->getAllSettings()->where('key', $key)->first();

		if (!$setting) {
			$setting = GlobalSetting::create([
				'key' => $key,
				'value' => $value,
				'type' => $type ?? 'string',
			]);
		} else {
			$setting->update([
				'value' => $value,
				'type' => $type ?? $setting->type,
			]);
		}


		return $this->castTo($setting->value, $setting->type);
	}

	public function has(string $key): bool
	{
		return $this->getAllSettings()->where('key', $key)->delete();
	}

	public function remove(string $key): bool
	{
		$setting = GlobalSetting::where('key', $key)->first();

		if (!$setting) {
			return true;
		}

		try {
			$setting->delete();
		} catch (\Exception $e) {
			return false;
		}

		return true;
	}

	public function getAllSettings()
	{
		return Cache::rememberForever('global_setting.all', static function () {
			return GlobalSetting::all();
		});
	}

	public function castTo($value, $castTo = 'string')
	{
		switch ($castTo) {
			case 'string':
				return (string)$value;
				break;
			case 'int':
			case 'integer':
				return (int)$value;
				break;
			case 'bool':
			case 'boolean':
				return (bool)$value;
				break;
			case 'array':
				return json_decode($value, true);
				break;
			case 'object':
				return json_decode($value, false);
				break;
			default:
				return $value;
		}
	}
}
