<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rankings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->string('Platform', 100)->nullable(false);
            $table->date('Date')->nullable(false);
            $table->string('SneakerName', 100)->nullable(false);
            $table->integer('Mentions')->unsigned();
            $table->timestamps();
            $table->primary(['Platform', 'Date', 'SneakerName'], 'PK_Rankings');
            $table->foreign('SneakerName', 'FK_Rankings_Sneakers')
                  ->references('Name')->on('Sneakers')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Rankings');
    }
}
