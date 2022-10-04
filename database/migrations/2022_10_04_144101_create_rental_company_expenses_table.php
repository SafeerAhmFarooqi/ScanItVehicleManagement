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
        Schema::create('rental_company_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rentalcompany_id')->nullable();
            $table->unsignedBigInteger('expensegroup_id')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('expensehead')->nullable();
            $table->decimal('rate',30,2)->nullable();
            $table->decimal('quantity',30,2)->nullable();
            $table->decimal('amount',30,2)->nullable();
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
        Schema::dropIfExists('rental_company_expenses');
    }
};
