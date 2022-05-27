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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('received_date')->nullable();
            $table->string('customer')->nullable();
            $table->string('vat')->nullable();
            $table->string('test_type')->nullable();
            $table->string('sample_type')->nullable();
            $table->string('number_of_samples')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('priority_type')->nullable();
            $table->string('pm_1')->nullable();
            $table->string('pm_2')->nullable();
            $table->string('pm_3')->nullable();
            $table->string('pm_4')->nullable();
            $table->string('re_1')->nullable();
            $table->string('re_2')->nullable();
            $table->string('re_3')->nullable();
            $table->string('re_4')->nullable();
            $table->string('minute')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
