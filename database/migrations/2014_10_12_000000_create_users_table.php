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
            $table->integer('chief_id')->unsigned()->default(false);
            $table->string('first_name');
            $table->string('middle_name')->default(0);
            $table->string('last_name')->default(0);
            $table->string('email')->unique();
            $table->string('password')->default(0);
            $table->string('images')->default(0);
            $table->string('position')->default(0);
            $table->string('wage')->default(0);
            $table->boolean('status')->default(0);
            $table->foreign('chief_id')
                ->references('id')->on('users');
            $table->rememberToken();
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
