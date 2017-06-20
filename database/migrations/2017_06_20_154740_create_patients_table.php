<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Patient;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surgeon_id')->unsigned();
            $table->foreign('surgeon_id')
                ->references('id')->on('surgeons')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('gender', array_keys(Patient::$genders));
            $table->string('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
