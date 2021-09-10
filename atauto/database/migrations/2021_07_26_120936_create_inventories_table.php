<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('description');
            $table->double('pricePerUnit',6,2);
            $table->double('retailPrice',6,2);
            $table->integer('quantity')->unsigned();
            $table->string('categoryID');
            $table->string('image');
            $table->string('statusID');
            $table->timestamps();

            $table->index('categoryID');
            $table->index('statusID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
