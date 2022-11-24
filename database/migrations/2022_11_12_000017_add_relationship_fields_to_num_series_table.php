<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNumSeriesTable extends Migration
{
    public function up()
    {
        Schema::table('num_series', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id', 'article_fk_7581393')->references('id')->on('articles');
        });
    }
}
