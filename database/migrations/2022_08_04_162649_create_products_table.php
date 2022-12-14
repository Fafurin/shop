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
            $table->string('number')->unique();

            $table->text('description');
            $table->text('content');
            $table->string('preview_image');

            $table->integer('old_price');
            $table->decimal('discount');
            $table->integer('price');

            $table->integer('count');
            $table->boolean('is_published')->default(true);

            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('group_id')->index()->constrained('groups');

            $table->softDeletes();

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
