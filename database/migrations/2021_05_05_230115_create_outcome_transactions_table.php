<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcome_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type', 70)->comment('funding/fixed_cost');
            $table->string('name');
            $table->foreignId('funding_id')->nullable()->foreign('funding_id')->references('id')->on('fundings')->onDelete('cascade');
            $table->foreignId('fixed_cost_id')->nullable()->foreign('fixed_cost_id')->references('id')->on('fixed_costs')->onDelete('cascade');
            $table->string('payment_method');
            $table->unsignedDouble('nominal');
            $table->string('status', 50)->comment('success/pending/failed');
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
        Schema::dropIfExists('outcome_transactions');
    }
}
