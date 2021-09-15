<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemlists', function (Blueprint $table) {
            $table->id();
            $table->string('deliveryOrderID');
            $table->string('inventoryID');
            $table->string('orderQuantity');
            $table->string('statusID');
            $table->timestamps();

            $table->index('deliveryOrderID');
            $table->index('inventoryID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemlists');
    }
}
