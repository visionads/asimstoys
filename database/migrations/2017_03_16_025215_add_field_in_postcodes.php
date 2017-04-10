<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInPostcodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postcodes', function (Blueprint $table) {
			
            $table->string('title', 250)->nullable();
			$table->string('slug', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postcodes', function (Blueprint $table) {
            //
        });
    }
}
