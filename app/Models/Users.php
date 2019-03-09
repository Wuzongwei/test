<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';

    public $incrementing = false;#因为id是字符串

    protected $hidden = [
        'password', 'password_fetch'
    ];

    protected $fillable = [
        'id',
        'user_no',
        'username',
        'password',
        'password_fetch',
        'phone',
        'true_name',
        'nickname',
        'avatar',
        'gender',
        'birthday',
        'age',
        'province_id',
        'city_id',
        'district_id',
        'address',
        'integral',
        'credit_num',
        'grade',
        'open_id',
        'user_type',
        'user_status',
        'auth_status',
        'en_auth_status',
        'is_main',
        'is_main_status',
        'is_bond',
        'balance',
        'tui_phone',
        'bond',
        'remarks',
        'sun_num',
        'is_bond_time',
        'volume_time',
        'volume_type',
        'is_switch',
        'port',
    ];

    public $timestamps = false;

    const USER_TYPE_PERSONAL = '1';

    const USER_TYPE_COMPANY = '2';

    const USER_TYPE_FREIGHT = '3';

    const USER_TYPE_DRIVER = '4';

    const USER_TYPE_FREIGHT_CHILDREN = '5';

    const AUTH_STATUS_PROCESSING = '0';

    const AUTH_STATUS_IMPERFECT = '1';

    const AUTH_STATUS_PASS = '2';

    const AUTH_STATUS_UNPASS = '3';

    const EN_AUTH_STATUS_PROCESSING = '0';

    const EN_AUTH_STATUS_IMPERFECT = '1';

    const EN_AUTH_STATUS_PASS = '2';

    const EN_AUTH_STATUS_UNPASS = '3';

    static $userTypeMap = [
        self::USER_TYPE_PERSONAL => '个人车主',
        self::USER_TYPE_COMPANY => '企业车主',
        self::USER_TYPE_FREIGHT => '货代',
        self::USER_TYPE_DRIVER => '司机',
        self::USER_TYPE_FREIGHT_CHILDREN => '货代子账户',
    ];

    static $authStatusMap = [
        self::AUTH_STATUS_PROCESSING => '处理中',
        self::AUTH_STATUS_IMPERFECT => '未完善',
        self::AUTH_STATUS_PASS => '通过',
        self::AUTH_STATUS_UNPASS => '不通过',
    ];

    static $enAuthStatusMap = [
        self::EN_AUTH_STATUS_PROCESSING => '处理中',
        self::EN_AUTH_STATUS_IMPERFECT => '未完善',
        self::EN_AUTH_STATUS_PASS => '通过',
        self::EN_AUTH_STATUS_UNPASS => '不通过',
    ];
}
