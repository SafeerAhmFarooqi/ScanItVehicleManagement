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
        Schema::create('company_transaction_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rentalcompany_id')->nullable();
            $table->boolean('credit')->nullable();
            $table->decimal('amount')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('company_transaction_records');
    }
};
