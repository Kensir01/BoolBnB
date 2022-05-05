<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->string('title', 30);
            $table->tinyInteger('rooms_number');
            $table->tinyInteger('beds_number');
            $table->tinyInteger('bathrooms_number');
            $table->smallInteger('square_meters');
            $table->float('latitude', 10, 8);
            $table->float('longitude', 10, 8);
            $table->string('image', 255);
            $table->boolean('visibility');
            $table->string('city', 50);
            $table->string('address', 50);
            $table->string('zip_code', 15);
            $table->string('slug')->unique();
            $table->text('description');

            // FK
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('apartments');
    }
}
