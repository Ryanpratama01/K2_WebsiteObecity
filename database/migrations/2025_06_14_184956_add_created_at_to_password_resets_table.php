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
        if (!Schema::hasColumn('password_resets', 'created_at')) {
            $table->timestamp('created_at')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('password_resets', function (Blueprint $table) {
        $table->dropColumn('created_at');
    });
}

};
