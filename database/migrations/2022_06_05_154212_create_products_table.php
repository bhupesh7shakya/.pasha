<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->enum('size', ['S', 'M', 'L', 'XL', 'XXL']);
            $table->double('price');
            $table->string('img_url_first');
            $table->string('img_url_second');
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('description');
            $table->text('details');
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
        Schema::dropIfExists('products');
    }
}
