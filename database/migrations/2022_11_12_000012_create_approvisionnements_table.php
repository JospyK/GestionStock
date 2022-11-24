<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovisionnementsTable extends Migration
{
    public function up()
    {
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('num_serie')->nullable();
            $table->longText('description')->nullable();
            $table->float('qte', 15, 2)->nullable();
            $table->decimal('total_ht', 15, 2)->nullable();
            $table->decimal('total_tva', 15, 2)->nullable();
            $table->decimal('total_ttc', 15, 2)->nullable();
            $table->string('etape')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
