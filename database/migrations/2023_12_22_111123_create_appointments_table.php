
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('query_id')->nullable();
            $table->integer('law_id')->nullable();
            $table->text('slug')->nullable();
            $table->longText('message')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->integer('consultant_id')->nullable();
            $table->text('extra1')->nullable();
            $table->text('extra2')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
