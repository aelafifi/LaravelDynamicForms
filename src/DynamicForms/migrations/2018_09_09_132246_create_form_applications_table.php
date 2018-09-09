<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_applications', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('form_id');
            $table->timestamps();
            $table->softDeletes();
            $table->nullableMorphs('applicable');

            $table->foreign('form_id')
                ->references('id')->on('dynamic_forms');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_applications');
    }
}
