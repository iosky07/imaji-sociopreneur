<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('type_budget_id');
            $table->string('money');
            $table->string('pic_internal')->nullable();
            $table->string('pic_external')->nullable();
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('type_budget_id')
                ->references('id')
                ->on('type_budgets')
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
        Schema::dropIfExists('budgets');
    }
}
