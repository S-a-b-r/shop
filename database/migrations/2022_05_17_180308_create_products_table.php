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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->float('abv');
            $table->float('ibu');
            $table->string('preview_image');
            $table->decimal('price');
            $table->float('rating')->default(0);
            $table->integer('quantity');
            $table->boolean('is_published')->default(true);
            $table->foreignId('brewery_id')->index()->constrained('breweries');
            $table->foreignId('category_id')->index()->constrained('categories');

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
};
