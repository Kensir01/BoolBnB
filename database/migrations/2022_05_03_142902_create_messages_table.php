<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->text('content');

            $table->unsignedBigInteger('apartment_id')->nullable();
            
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('set null');

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
        Schema::dropIfExists('messages', function(Blueprint $table) {
            $table->dropForeign('apartments_message_id_foreign');

            $table->dropColumn('messsage_id');
        });
       
    }
}
