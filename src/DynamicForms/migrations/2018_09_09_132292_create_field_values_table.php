<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_values', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('field_id');
            $table->unsignedInteger('application_id');
            $table->text('value')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('field_id')
                ->references('id')->on('field_definitions');

            $table->foreign('application_id')
                ->references('id')->on('form_applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_values');
    }
}
