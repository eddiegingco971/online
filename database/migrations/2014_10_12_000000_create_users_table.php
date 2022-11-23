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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->integer('age'); //more than 18
            $table->date('birthdate');
            $table->enum('gender',['male','female']);
            $table->string('address');
            $table->enum('barangay',['Cabatuan','Cantubod','Carbon','San Carlos','Concepcion','Dagohoy','Sta. Fe','Hibale',
            'Magtangtang','San Miguel','Nahud','Sto. Niño','Poblacion','Remedios','Tabok','Taming','Villa Anunciado'
            ]);
            $table->string('phone_number');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['admin','staff','user'])->default('user');
            // $table->string('avatar')->default('');
            $table->enum('status',['active','inactive'])->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
