<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('budget', 19, 4);
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedTinyInteger('status');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_type_id')
                  ->references('id')
                  ->on('project_types');

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->dropForeign(['project_type_id', 'client_id']);
        });

        Schema::dropIfExists('projects');
    }
}
