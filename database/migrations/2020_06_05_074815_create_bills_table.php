<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->decimal('date');
            $table->foreignid('delivery_id');
            $table->foreignid('invoice_id')->nullable();
            $table->integer('count');
            $table->decimal('cost');
            $table->decimal('discount');
            $table->decimal('amount');
            $table->enum('payment', ['cash', 'credit']);
            $table->enum('status', ['paid', 'unpaid']);
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
        Schema::dropIfExists('bills');
    }
}
