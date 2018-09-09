<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_definitions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('form_id');
            $table->foreign('form_id')
                ->references('id')->on('dynamic_forms');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable()->index();
            $table->longText('options')->nullable();
            $table->text('default_value')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_definitions');
    }
}
