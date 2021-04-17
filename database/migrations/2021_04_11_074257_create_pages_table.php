<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('title_a');
            $table->string('caption_a');
            $table->text('content_a');
            $table->string('title_b')->nullable();
            $table->string('caption_b')->nullable();
            $table->text('content_b')->nullable();
            $table->boolean('nav')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent');
            $table->boolean('available')->default(1);
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
        Schema::dropIfExists('pages');
    }
}
