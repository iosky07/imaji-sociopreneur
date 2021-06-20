<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('type_finance_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('type_submission_id')->nullable();
            $table->string('title');
            $table->string('money');
            $table->string('file');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('type_submission_id')
                ->references('id')
                ->on('type_submissions')
                ->onDelete('restrict')
                ->cascadeOnUpdate();
            $table->foreign('type_finance_id')
                ->references('id')
                ->on('type_finances')
                ->onDelete('restrict')
                ->cascadeOnUpdate();
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('restrict')
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finances');
    }
}
