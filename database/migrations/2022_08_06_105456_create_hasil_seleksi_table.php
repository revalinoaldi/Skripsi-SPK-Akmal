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
        Schema::create('hasil_seleksi', function (Blueprint $table) {
            $table->unsignedInteger('id_hasil', true);  
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('nilai_ijazah');
            $table->tinyInteger('nilai_skhun');
            $table->tinyInteger('nilai_tulis');
            $table->tinyInteger('nilai_wawancara');
            $table->decimal('nilai_akhir');
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
        Schema::dropIfExists('hasil_seleksi');
    }
};
