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
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->boolean('admin')->default('1');
            $table->boolean('notification')->default(0);
            $table->string('email')->unique();
            $table->string('contactno');
            $table->string('password');
            $table->boolean('active')->default('0');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                array('name' => 'Administrator','firstname' => 'Administrator','lastname' => 'Administrator','admin' => '2', 'notification' => '0','email'=>'administrator@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy','active'=>'1'),
                array('name' => 'Sample Resort','firstname' => 'Sample','lastname' => 'Resort','admin' => '1', 'notification' => '0','email'=>'sampleresort@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy','active'=>'1'),
                array('name' => 'Sample User','firstname' => 'Sample','lastname' => 'User','admin' => '0', 'notification' => '0','email'=>'sampleuser@gmail.com','contactno'=>'09056171321', 'password'=>'$2y$10$uFIvPlUVyX/LpTBw0ihlGOQuSEEVyKV4UKU3tyR2Muw58Bd.Kbdzy','active'=>'1')
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
