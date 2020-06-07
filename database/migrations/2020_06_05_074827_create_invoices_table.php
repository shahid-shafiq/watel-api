<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('invoicecode');
            $table->datetime('date');
            $table->date('month');
            $table->integer('no');
            $table->foreignId('client_id');
            $table->foreignId('bill_id');
            $table->decimal('count');
            $table->decimal('amount');
            $table->date('duedate');
            $table->enum('status', ['due', 'paid']);
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
