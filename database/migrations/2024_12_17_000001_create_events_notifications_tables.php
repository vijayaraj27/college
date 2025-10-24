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
        // Create upcoming_events table
        Schema::create('upcoming_events', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->unsigned()->nullable()->comment('NULL for home page, ID for department-specific');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->string('event_time')->nullable();
            $table->string('venue')->nullable();
            $table->string('attach')->nullable()->comment('Event image/document');
            $table->string('link')->nullable()->comment('External link');
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->integer('display_order')->default(0);
            $table->timestamps();
            
            $table->index('department_id');
            $table->index('event_date');
            $table->index('status');
        });

        // Create notifications table
        Schema::create('notifications_board', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id')->unsigned()->nullable()->comment('NULL for home page, ID for department-specific');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('notification_date');
            $table->string('attach')->nullable()->comment('Notification document');
            $table->string('link')->nullable()->comment('External link');
            $table->boolean('is_new')->default(1)->comment('Show NEW badge');
            $table->boolean('status')->default(1)->comment('1=Active, 0=Inactive');
            $table->integer('display_order')->default(0);
            $table->timestamps();
            
            $table->index('department_id');
            $table->index('notification_date');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications_board');
        Schema::dropIfExists('upcoming_events');
    }
};

