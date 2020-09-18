<?php


namespace App;


use App\Model\Member;
use Cache;

class CacheManager
{
    private static $year = 86400 * 365;
    private static $week = 86400 * 7;
    private static $day = 86400;


    static function cache_get($func, $param, $time) {
        $cache_key = $func[1].implode(',', $param);
        $list = Cache::get($cache_key, function () use ($cache_key, $func, $param, $time) {
            $data = call_user_func_array($func, $param);
            Cache::put($cache_key, $data, $time);
            return $data;
        });
        return $list;
    }

    static function cache_delete($func, $param) {
        $cache_key = $func[1].implode(',', $param);
        Cache::forget($cache_key);
    }

    /**
     * 获取会员信息
     * @param $memberid
     * @return array
     */
    static function getMemberInfo() { return self::cache_get([Member::class, 'getMemberInfo'], [], self::$day);}

    static function getMemberInfoMap() { $list = []; foreach (self::getMemberInfo() as $v) $list[$v->MEMBER_ID] = $v; return $list;}

    //删除会员信息缓存
    static function removeMemberInfo() { self::cache_delete([Member::class, 'getMemberInfo'], []);}
}