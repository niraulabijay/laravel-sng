<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) 
        {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->longText('description')->nullable();
            $table->integer('max_occupancy')->nullable()->unsigned();
            $table->integer('no_of_adult')->nullable()->unsigned();
            $table->integer('no_of_child')->nullable()->unsigned();
            $table->integer('base_price')->nullable()->unsigned();
            $table->integer('offer_price')->default(0);
            $table->integer('discount_percent')->default(0);
            $table->boolean('tax_status')->default(0);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->text('inclusions')->nullable();
            $table->boolean('additional_price')->default(0);
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_types');
    }
}
