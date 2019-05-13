<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('flag')->nullable();;
            $table->text('descr');
            $table->string('original_price');
            $table->string('price');
            $table->string('img')->nullable();
            $table->string('link_name');
            $table->timestamps();

//            $table->foreign('category_id')
//                    ->references('category_id')
//                    ->on('categories')
//                    ->onDelete('set default')
//                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
