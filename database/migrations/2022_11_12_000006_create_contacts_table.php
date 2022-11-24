<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->nullable();
            $table->string('name')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('email')->nullable();
            $table->longText('adresse')->nullable();
            $table->boolean('client')->default(0)->nullable();
            $table->boolean('fournisseur')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
