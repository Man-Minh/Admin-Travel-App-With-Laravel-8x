<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('img')->nullable()->default('images/avatarDefault.jpg');
            $table->string('password');
            $table->string('sdt')->nullable();
            $table->boolean('status_email')->default(1);
            $table->boolean('status_sdt')->default(1);
            $table->boolean('isAdmin')->default(0); // man update 06/02/2022
            $table->boolean('status')->default(1); // man update 06/02/2022
            $table->string('token')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
