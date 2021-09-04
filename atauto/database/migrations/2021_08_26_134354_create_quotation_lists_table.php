<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_lists', function (Blueprint $table) {
            $table->id();
            $table->string('quotationID');
            $table->string('inventoryID');
            $table->string('quantity');
            $table->double('agreedPriceperunit', 6,2);
            $table->timestamps();

            $table->index('quotationID');
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
        Schema::dropIfExists('quotation_lists');
    }
}
