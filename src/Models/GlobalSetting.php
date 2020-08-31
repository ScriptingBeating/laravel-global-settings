<?php


namespace ScriptingBeating\GlobalSetting\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class GlobalSetting extends Model
{
	protected $guarded = [];
	public $timestamps = false;

	protected static function boot()
	{
		parent::boot();

		static::deleted(function ($model) {
			Cache::forget('global_setting.all');
		});

		static::created(function ($model) {
			Cache::forget('global_setting.all');
		});

		static::updated(function ($model) {
			Cache::forget('global_setting.all');
		});
	}
}