<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('position', 255);
            $table->string('address', 255);
            $table->string('uid', 200)->unique();
            $table->string('email', 255)->unique();
            $table->string('api_key', 200);
            $table->macAddress('device');
            $table->timestamp('checked_at');
            $table->timestamp('next_check_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
