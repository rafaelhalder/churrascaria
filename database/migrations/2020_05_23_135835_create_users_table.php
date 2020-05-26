<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('cpf', 11)->unique()->nullable();
			$table->string('name', 45);
			$table->char('phone', 11);

			$table->string('email', 80)->nullable();
			$table->string('password', 255)->nullable();

			$table->string('status', 20)->default('active');
			$table->char('permission', 45)->default('app.user');

			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {

		});
		Schema::drop('users');
	}
}
