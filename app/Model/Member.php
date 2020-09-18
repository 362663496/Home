<?php


namespace App\Model;
use DB;

class Member
{
    //获取会员列表
    public static function getMemberInfo() {
        return DB::table('member_info')->get();
    }
}