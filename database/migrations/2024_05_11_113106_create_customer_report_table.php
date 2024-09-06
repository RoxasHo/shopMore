<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('CID')->constrained('users');
            $table->text('Description');
            $table->string('status');
            $table->text('repy');
            $table->timestamps();
            $table->integer('Rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_report');
    }
};
