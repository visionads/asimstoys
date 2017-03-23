<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuburbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suburbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
			$table->unsignedInteger('state_id')->nullable();
			$table->unsignedInteger('postcode_id')->nullable();
            $table->enum('status', array(
                'active','inactive'
            ));
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);

            $table->timestamps();
        });
		
		Schema::table('suburbs', function($table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
		
		Schema::table('suburbs', function($table) {
            $table->foreign('postcode_id')->references('id')->on('postcodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suburbs');
    }
}
