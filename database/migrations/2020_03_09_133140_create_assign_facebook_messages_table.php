<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignFacebookMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_facebook_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mess_id');
            $table->integer('md_id')->nullable();
            $table->integer('se_id')->nullable();
            $table->integer('e_id')->nullable();
            $table->integer('complete')->default(0);
            $table->integer('uncomplete')->default(0);
            $table->integer('progressive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_facebook_messages');
    }
}
