<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('email')->unique();
            $table->string('user_pic');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('age'); //more than 18
            $table->enum('gender',['male','female']);
            $table->string('address');
            $table->enum('barangay',['Cabatuan','Cantubod','Carbon','San Carlos','Concepcion','Dagohoy','Sta. Fe','Hibale',
            'Magtangtang','San Miguel','Nahud','Sto. Niño','Poblacion','Remedios','Tabok','Taming','Villa Anunciado'
        ]);
            $table->string('phone_number');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
