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
            $table->string('name');
            $table->boolean('admin')->default('0');
            $table->boolean('notification')->default(0);
            $table->string('email')->unique();
            $table->string('contactno');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                array('name' => 'Administrator','admin' => '2', 'notification' => '0','email'=>'administrator@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy'),
                array('name' => 'Sample Resort','admin' => '1', 'notification' => '0','email'=>'sampleresort@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy'),
                array('name' => 'Sample User','admin' => '0', 'notification' => '0','email'=>'sampleuser@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy')
            )
        );
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
