<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('vendor_code');
            $table->integer('count')->default(1);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('brand_id')
                ->constrained()
                ->onDelete('cascade');
        });

        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('model_id')
                ->constrained()
                ->onDelete('cascade');

        });
        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
