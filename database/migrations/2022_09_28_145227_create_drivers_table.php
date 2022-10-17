<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rentalcompany_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('name')->nullable();
            $table->string('license')->nullable();
            $table->string('nldnumber')->nullable();
            $table->string('address')->nullable();
            $table->string('salary')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('startTime')->nullable();
            $table->timestamp('endTime')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('drivers');
    }
};
