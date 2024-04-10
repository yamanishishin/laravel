<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserTable2columns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rest_password_access_key','64')->unique()->nullable()->comment('パスワード再設定キー');     
            $table->timestamp('rest_password_expire_at')->nullable()->comment('パスワード再設定キーの有効期限');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rest_password_access_key');
            $table->dropColumn('rest_password_expire_at');
        });
    }
}
