<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('author');
                $table->string('cover_image')->nullable();
                $table->text('description')->nullable();
                $table->date('published_date')->nullable();;
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }

}

;
