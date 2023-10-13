<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagessTable extends Migration
{
    public function up()
    {
        Schema::create('messagess', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
