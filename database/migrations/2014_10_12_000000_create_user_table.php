<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id')->comment('id');
            $table->string('user_no', 32)->comment('用户编号');
            $table->string('username', 255)->nullable()->comment('用户名');
            $table->string('password', 255)->comment('密码');
            $table->string('password_fetch', 255)->nullable()->comment('提现密码');
            $table->string('phone', 255)->comment('手机号码');
            $table->string('true_name', 255)->nullable()->comment('真实姓名');
            $table->string('nickname', 255)->nullable()->comment('昵称');
            $table->string('avatar', 255)->nullable()->comment('头像');
            $table->string('gender', 2)->nullable()->comment('性别');
            $table->dateTime('birthday')->nullable()->comment('出生日期');
            $table->integer('age')->nullable()->comment('年龄');
            $table->string('province_id', 32)->nullable()->comment('省ID');
            $table->string('city_id', 32)->nullable()->comment('市ID');
            $table->string('district_id', 32)->nullable()->comment('区ID');
            $table->string('address', 255)->nullable()->comment('详细地址');
            $table->integer('integral')->nullable()->comment('积分');
            $table->double('credit_num', 11, 2)->nullable()->comment('信誉度');
            $table->integer('grade')->nullable()->comment('信誉度');
            $table->string('open_id', 255)->nullable()->comment('open_id');
            $table->string('user_type', 2)->comment('用户类型');
            $table->string('user_status', 2)->nullable();
            $table->string('auth_status', 2)->nullable()->comment('审核状态');
            $table->string('en_auth_status', 2)->nullable();
            $table->string('is_main', 2)->nullable()->comment('是否主账号');
            $table->string('is_main_status', 32)->nullable();
            $table->string('is_bond', 2)->nullable();
            $table->double('balance', 16, 2)->nullable();
            $table->string('tui_phone', 11)->nullable();
            $table->double('bond', 16, 2)->nullable();
            $table->double('remarks', 16, 2)->nullable()->comment('备注');
            $table->integer('sun_num')->nullable();
            $table->dateTime('is_bond_time')->nullable()->comment('交保证金时间');
            $table->dateTime('volume_time')->nullable()->comment('领优惠卷时间');
            $table->integer('volume_type')->default(0)->comment('是否领优惠卷0.否 1.是');
            $table->string('is_switch', 2)->default(0)->comment('语音开关 0关 1开');
            $table->string('port', 80)->nullable()->comment('港口ID');
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
//            $table->string('password');
//            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
