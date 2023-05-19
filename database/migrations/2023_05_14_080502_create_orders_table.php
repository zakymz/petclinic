<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('pet_id')->index();
            $table->integer('doctor_id')->index();
            $table->integer('service_id')->index();
            $table->string('order_code')->nullable();
            $table->date('date')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
