<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApprovisionnementsTable extends Migration
{
    public function up()
    {
        Schema::table('approvisionnements', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id', 'article_fk_7581499')->references('id')->on('articles');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7581506')->references('id')->on('users');
        });
    }
}
