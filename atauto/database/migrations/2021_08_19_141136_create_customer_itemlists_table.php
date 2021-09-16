<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerItemlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_itemlists', function (Blueprint $table) {
            $table->id();
            $table->string('customerOrderID');
            $table->string('inventoryID');
            $table->string('quantity');
            $table->string('statusID');
            $table->timestamps();

            $table->index('customerOrderID');
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
        Schema::dropIfExists('customer_itemlists');
    }
}
