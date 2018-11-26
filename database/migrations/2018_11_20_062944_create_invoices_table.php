<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('invoice_id')->nullable();
            $table->string('description')->nullable();
            $table->double('price', 2);
            $table->boolean('van');
            $table->integer('van_hour');
            $table->string('to');
            $table->string('from');
            $table->string('days_needed');
            $table->string('dates');
            $table->string('staff_num');
            $table->string('shift_hour');
            $table->string('summary');
            $table->string('total');
            $table->string('payment_status')->default('Invalid');
            $table->string('email');
            $table->string('company_name');
            $table->string('mobile');
            $table->string('name');


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
        Schema::dropIfExists('invoices');
    }
}
