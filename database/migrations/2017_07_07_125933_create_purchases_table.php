<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name');
            $table->string('party_name');
            $table->double('totalamount');
            $table->double('paidamount');
            $table->double('dueamount');
            $table->enum('status',['vat','pan','normal']);
            $table->date('purchase_date');
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
        Schema::dropIfExists('purchases');
    }
}
