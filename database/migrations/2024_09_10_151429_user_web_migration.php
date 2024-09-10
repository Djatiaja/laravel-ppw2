<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usersWeb', function (Blueprint $user) {
            $user->id();
            $user->string('name');
            $user->string('email')->unique();
            $user->timestamp('verified')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usersWeb');
    }
};
