<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFactureDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('facture_details', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id', 'article_fk_7581457')->references('id')->on('articles');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7581480')->references('id')->on('users');
            $table->unsignedBigInteger('facture_id')->nullable();
            $table->foreign('facture_id', 'facture_fk_7581479')->references('id')->on('factures');
        });
    }
}
