<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('totalamount');
            $table->double('depositeamount');
            $table->double('remainingamount');
            $table->string('deposite_by');
            $table->date('deposite_date');
            $table->string('bank_name');
            $table->string('created_by', 100);
            $table->foreign('created_by')->references('username')->on('users')->onUpdate('cascade');
            $table->string('modified_by', 100)->nullable();
            $table->foreign('modified_by')->references('username')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
