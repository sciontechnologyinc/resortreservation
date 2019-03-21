<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyinformation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('companyname')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('contactno')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('footerinformation')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
        DB::table('companyinformation')->insert(
            array(
                array('user_id' => '0','companyname' => 'Administrator', 'mission' => 'sample mission','vision'=>'sample vision','contactno'=>'09056171321', 
                'address'=>'sample address','email'=>'sample email','footerinformation'=>'sample footer information')
               
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
        Schema::dropIfExists('companyinformation');
    }
}
