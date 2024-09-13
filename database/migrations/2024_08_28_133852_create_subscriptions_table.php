<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_type');
            $table->string('station_id');
            $table->string('phone_number');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('weekdays')->default(false);
            $table->boolean('weekends')->default(false);
            $table->timestamps();
        });
    }
};
