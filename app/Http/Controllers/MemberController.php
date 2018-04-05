<?php

namespace  App\Http\Controllers;

use App\Member;

class  MemberController extends  Controller
{
    public function info($id)
    {
        return Member::getMember();  //一个基础的模型
       // return 'member-info-id='.$id;
       // return route('memberinfo');
/*        return view('member/info',[   //默认模板和普通视图模板的区别，默认模板可以传入参数
            'name'=>'沈健',
            'age'=>'24'
        ]);*/
    }
}