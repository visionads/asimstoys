<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_head_id');
            $table->integer('product_id');
            $table->integer('product_variation_id');
            $table->integer('qty');
            $table->string('color')->nullable();
            $table->float('price');         
            $table->enum('status', array(
                '0','1','2','3'
            ));
                        
            $table->timestamps();
        });

        Schema::table('order_details', function($table) {
            $table->foreign('order_head_id')->references('id')->on('order_overhead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
