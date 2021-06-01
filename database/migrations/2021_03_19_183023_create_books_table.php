<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('cover_link', 100);
            $table->string('title', 100);
            $table->string('author', 60);
            $table->char('genre_id', 25);
            $table->text('synopsis');
            $table->string('download_link', 100);
            $table->timestamps();

            $table->foreign('genre_id')
            ->references('id')
            ->on('genres')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
