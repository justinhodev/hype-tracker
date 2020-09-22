<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Watchlists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->string('SneakerName', 100)->nullable(false);
            $table->string('MemberEmail', 100)->nullable(false);
            $table->timestamps();
            $table->primary(['SneakerName', 'MemberEmail'], 'PK_Watchlists');
            $table->foreign('SneakerName', 'FK_Watchlists_Sneakers')
                  ->references('Name')->on('Sneakers')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('MemberEmail', 'FK_Watchlists_Members')
                  ->references('Email')->on('Members')
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
        Schema::dropIfExists('Watchlists');
    }
}
