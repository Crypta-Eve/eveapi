<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterContactListAllianceLabelsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('character_contact_list_alliance_labels', function (Blueprint $table) {

            $table->integer('characterID');
            $table->integer('labelID');
            $table->string('name');

            // Index
            $table->index('characterID');
            $table->index('labelID');

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

        Schema::drop('character_contact_list_alliance_labels');
    }
}
