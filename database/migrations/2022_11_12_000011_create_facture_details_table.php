<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('facture_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->string('num_serie')->nullable();
            $table->float('tva', 15, 2)->nullable();
            $table->float('qte', 15, 2)->nullable();
            $table->decimal('total_ht', 15, 2)->nullable();
            $table->decimal('total_tva', 15, 2)->nullable();
            $table->decimal('total_ttc', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
