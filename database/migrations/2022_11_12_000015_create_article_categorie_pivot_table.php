<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoriePivotTable extends Migration
{
    public function up()
    {
        Schema::create('article_categorie', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id', 'article_id_fk_7581356')->references('id')->on('articles')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id', 'categorie_id_fk_7581356')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
