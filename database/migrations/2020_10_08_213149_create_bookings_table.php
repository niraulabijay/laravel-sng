<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('booking_room_price')->nullable();
            $table->integer('status')->unsigned();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->longText('address')->nullable();
            $table->string('postCode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->longText('message')->nullable();
            $table->string('gender')->nullable();
            $table->integer('tax')->default(0);
            $table->timestamps();
            $table->enum('source', ['Online', 'Reception'])->default('Online');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('bookings');
    }
}
