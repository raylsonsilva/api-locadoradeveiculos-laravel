<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{

    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('vehicle_id');
            $table->decimal('supply_km',8,2);
            $table->decimal('liters_filled',8,2);
            $table->decimal('amount_paid',8,2);
            $table->timestamp('supply_date');
            $table->string('gas_station');
            $table->string('fuel_type');
            $table->timestamps();

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
