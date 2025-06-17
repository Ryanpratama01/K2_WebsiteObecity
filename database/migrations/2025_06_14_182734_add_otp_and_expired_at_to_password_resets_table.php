<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('password_resets', function (Blueprint $table) {
        if (!Schema::hasColumn('password_resets', 'otp')) {
            $table->string('otp')->nullable();
        }
        if (!Schema::hasColumn('password_resets', 'expired_at')) {
            $table->timestamp('expired_at')->nullable();
        }
    });
}

public function down()
{
    Schema::table('password_resets', function (Blueprint $table) {
        $table->dropColumn(['otp', 'expired_at']);
    });
}

};
