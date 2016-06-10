<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderoverheadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->float('total_discount_price')->nullable();
            $table->integer('vat')->nullable();
            $table->float('freight_amount')->nullable();
            $table->float('sub_total')->nullable();
            $table->integer('net_amount')->nullable();
            $table->enum('status', array(
                '0','1','2','3'
            ));
                        
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
        //
    }
}
