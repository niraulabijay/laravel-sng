<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->string('payment_method');
            $table->string('invoice_no')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->softDeletes();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('restrict');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE bookings AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
