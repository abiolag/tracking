<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tracking_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->string('location');
            $table->text('description');
            $table->timestamp('event_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracking_events');
    }
};