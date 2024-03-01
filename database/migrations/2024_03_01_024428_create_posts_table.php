<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration{
    public function up(){
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('autor');
            $table->date('fecha');
            $table->string('titulo');
            $table->text('contenido');
            $table->text('fotobase64')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('posts');
    }
}