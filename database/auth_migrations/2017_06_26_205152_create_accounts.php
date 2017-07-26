<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 32)->default('');
            $table->string('sha_pass_hash', 40)->default('');
            $table->string('sessionkey', 80)->default('');
            $table->string('v', 64)->default('');
            $table->string('s', 64)->default('');
            $table->string('token_key', 100)->default('');
            $table->string('email', 255)->default('');
            $table->string('reg_mail', 255)->default('');
            $table->timestamp('joindate');
            $table->string('last_ip', 15)->default('127.0.0.1');
            $table->integer('failed_logins')->default(0);
            $table->tinyInteger('locked')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->tinyInteger('online')->default(0);
            $table->tinyInteger('expansion')->default(2);
            $table->bigInteger('mutetime')->default(0);
            $table->string('mutereason', 255)->default('');
            $table->string('muteby', 50)->default('');
            $table->tinyInteger('locale')->default(0);
            $table->string('os', 3)->default('');
            $table->integer('recruiter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
