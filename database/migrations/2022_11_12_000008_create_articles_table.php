<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->nullable();
            $table->string('name')->nullable();
            $table->decimal('prix_min', 15, 2)->nullable();
            $table->decimal('prix_ht', 15, 2)->nullable();
            $table->decimal('prix_ttc', 15, 2)->nullable();
            $table->float('tva', 15, 2)->nullable();
            $table->integer('stock_actuel')->nullable();
            $table->integer('stock_seuil')->nullable();
            $table->integer('stock_virtuel')->nullable();
            $table->integer('stock_physique')->nullable();
            $table->longText('description')->nullable();
            $table->longText('note')->nullable();
            $table->boolean('tosell')->default(0)->nullable();
            $table->boolean('tobuy')->default(0)->nullable();
            $table->boolean('is_active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
