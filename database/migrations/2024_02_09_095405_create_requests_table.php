<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('descr');
            $table->string('site_id')->nullable();
            $table->foreignId('user_id')->index()->constrained('users');
            $table->foreignId('satellite_id')->nullable()->index()->constrained('satellites');
            $table->foreignId('priority_id')->index()->constrained('priorities');
            $table->foreignId('status_id')->index()->constrained('statuses');
            $table->foreignId('type_id')->index()->constrained('types');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
