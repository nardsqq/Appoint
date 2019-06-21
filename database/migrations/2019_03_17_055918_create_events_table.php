<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('budget', 19, 2);
            $table->string('venue');
            $table->dateTime('date_time');
            $table->unsignedBigInteger('event_type_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedTinyInteger('status');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('event_type_id')
                  ->references('id')
                  ->on('event_types');

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
            $table->dropForeign(['event_type_id', 'client_id']);
        });

        Schema::dropIfExists('events');
    }
}
