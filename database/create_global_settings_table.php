<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
	public function up()
	{
		Schema::create('global_settings', function (Blueprint $table) {
			$table->id();
			$table->string('key')->unique();
			$table->string('value')->nullable();
			$table->string('type')->default('string');
		});
	}

	public function down()
	{
		Schema::dropIfExists('global_settings');
	}
}