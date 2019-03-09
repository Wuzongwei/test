<?php

namespace App\Admin\Controllers;

use App\Models\Users;
use App\Http\Controllers\Controller;
use App\User;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UsersController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('用户列表')
//            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('详情')
//            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑')
//            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Users);
//        $grid->id('ID');
        $grid->user_no('用户编号');
        $grid->username('用户名');
        $grid->phone('手机号码');
        $grid->true_name('真实姓名');
        $grid->nickname('昵称')->display(function ($value) {
            return '<img src="' . $value . '"/>';
        });
        $grid->avatar('头像');
        $grid->gender('性别');
        $grid->birthday('出生日期');
        $grid->age('年龄');
        $grid->integral('积分');
        $grid->credit_num('信誉度');
        $grid->grade('等级');
        $grid->user_type('用户类型')->display(function ($value) {
            return Users::$userTypeMap[$value];
        });
        $grid->auth_status('个人审核')->display(function ($value) {
            return Users::$authStatusMap[$value];
        });
        $grid->en_auth_status('企业审核')->display(function ($value) {
            return Users::$enAuthStatusMap[$value];
        });
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->column(1 / 2, function ($filter) {
                $filter->like('user_no', '用户编号');
                $filter->like('username', '用户名');
            });
            $filter->column(1 / 2, function ($filter) {
                $filter->equal('user_type', '用户类型')->select(Users::$userTypeMap);
                $filter->equal('auth_status', '个人审核状态')->select(Users::$authStatusMap);
            });
        });
//        $grid->is_main('是否主账号');
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Users::findOrFail($id));

        $show->id('Id');
        $show->user_no('用户编号');
        $show->username('用户名');
        $show->phone('手机号码');
        $show->true_name('真实姓名');
        $show->nickname('昵称');
        $show->avatar('头像');
        $show->gender('性别');
        $show->birthday('出生日期');
        $show->age('年龄');
        $show->province_id('省ID');
        $show->city_id('市ID');
        $show->district_id('区ID');
        $show->address('详细地址');
        $show->integral('积分');
        $show->credit_num('信誉度');
        $show->grade('等级');
        $show->open_id('Open id');
        $show->user_type('用户类型');
        $show->user_status('User status');
        $show->login_status('登陆状态');
        $show->auth_status('审核状态');
        $show->en_auth_status('En auth status');
        $show->is_main('是否主账号');
        $show->is_main_status('Is main status');
        $show->is_bond('Is bond');
        $show->balance('Balance');
        $show->tui_phone('Tui phone');
        $show->bond('Bond');
        $show->remarks('备注');
        $show->sun_num('Sun num');
        $show->is_bond_time('交保证金时间');
        $show->volume_time('领优惠卷时间');
        $show->volume_type('是否领优惠卷0.否 1.是');
        $show->is_switch('语音开关 0关 1开');
        $show->create_date('创建时间');
        $show->update_date('修改时间');
        $show->port('港口ID');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Users);
        $form->text('user_no', '用户编号');
        $form->text('username', '用户名');
        $form->mobile('phone', '手机号码');
        $form->text('true_name', '真实姓名');
        $form->text('nickname', '昵称');
        $form->image('avatar', '头像');
        $form->text('gender', '年龄');
        $form->datetime('birthday', '出生日期')->default(date('Y-m-d H:i:s'));
        $form->number('age', '年龄');
        $form->text('province_id', '省ID');
        $form->text('city_id', '市ID');
        $form->text('district_id', '区ID');
        $form->text('address', '详细地址');
        $form->number('integral', '积分');
        $form->decimal('credit_num', '信誉度');
        $form->number('grade', '等级');
        $form->text('user_type', '用户类型');
        $form->text('user_status', '用户状态');
        $form->text('login_status', '登陆状态');
        $form->text('auth_status', '审核状态');
        $form->text('en_auth_status', 'En auth status');
        $form->text('is_main', '是否主账号');
        $form->text('is_main_status', 'Is main status');
        $form->text('is_bond', 'Is bond');
        $form->decimal('balance', 'Balance');
        $form->text('tui_phone', 'Tui phone');
        $form->decimal('bond', 'Bond');
        $form->text('remarks', '备注');
        $form->number('sun_num', 'Sun num');
        $form->datetime('is_bond_time', '交保证金时间')->default(date('Y-m-d H:i:s'));
        $form->datetime('volume_time', '领优惠卷时间')->default(date('Y-m-d H:i:s'));
        $form->number('volume_type', '是否领优惠卷0.否 1.是');
        $form->text('is_switch', '语音开关 0关 1开');
        $form->text('port', '港口ID');

        return $form;
    }
}
