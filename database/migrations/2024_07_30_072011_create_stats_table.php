<?php

use App\Models\User;
use App\Models\Workspace;
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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('stats_id')->unique();
            $table->string('report')->nullable();
            $table->string('tab')->nullable();
            $table->string('additionalFields')->nullable();
            $table->string('remoteAddr')->nullable();
            $table->string('httpAcceptLanguage')->nullable();
            $table->string('httpUserAgent')->nullable();
            $table->string('httpSecChUa')->nullable();
            $table->string('httpSecChUaPlatform')->nullable();
            $table->string('userId')->nullable();
            $table->string('workspace')->nullable();
            $table->foreignIdFor(Workspace::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
