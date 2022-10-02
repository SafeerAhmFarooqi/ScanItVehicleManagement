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
        Schema::create('monthly_driver_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rentalcompany_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->decimal('amount',65,2)->nullable();
            $table->timestamp('month')->nullable();
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
        Schema::dropIfExists('monthly_driver_salaries');
    }
};
