
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailchatfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailchatfiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('appointment_id')->nullable();
            $table->text('attachment')->nullable();
            $table->string('extra')->nullable();
            $table->integer('extraid')->nullable();
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
        Schema::dropIfExists('emailchatfiles');
    }
}
