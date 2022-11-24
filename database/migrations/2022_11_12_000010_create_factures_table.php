<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->nullable();
            $table->datetime('date_facture')->nullable();
            $table->datetime('date_reglement')->nullable();
            $table->decimal('total_ht', 15, 2)->nullable();
            $table->decimal('total_ttc', 15, 2)->nullable();
            $table->longText('note')->nullable();
            $table->boolean('is_locked')->default(0)->nullable();
            $table->string('etape')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
