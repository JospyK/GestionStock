<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacturesTable extends Migration
{
    public function up()
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id', 'contact_fk_7581437')->references('id')->on('contacts');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7581494')->references('id')->on('users');
        });
    }
}
