<?php

namespace App\Support\Enums\URI;

class WeatherURI
{
    const API       = '/v1/opendataapi/';
    const API_TYPE  = 'JSON';
    const WEEK_ILA  = self::API . 'F-D0047-003'; //宜蘭
    const WEEK_TYN  = self::API . 'F-D0047-007'; //桃園
    const WEEK_HSZ  = self::API . 'F-D0047-011'; //新竹
    const WEEK_ZMI  = self::API . 'F-D0047-015'; //苗栗
    const WEEK_CHW  = self::API . 'F-D0047-019'; //彰化
    const WEEK_NTC  = self::API . 'F-D0047-023'; //南投
    const WEEK_YUN  = self::API . 'F-D0047-027'; //雲林
    const WEEK_CYI  = self::API . 'F-D0047-031'; //嘉義
    const WEEK_PIF  = self::API . 'F-D0047-035'; //屏東
    const WEEK_TTT  = self::API . 'F-D0047-039'; //台東
    const WEEK_HUN  = self::API . 'F-D0047-043'; //花蓮
    const WEEK_PEH  = self::API . 'F-D0047-047'; //澎湖
    const WEEK_KEL  = self::API . 'F-D0047-051'; //基隆
    const WEEK_MFK  = self::API . 'F-D0047-083'; //連江縣
    const WEEK_KNH  = self::API . 'F-D0047-087'; //金門縣
    const WEEK_HSZC = self::API . 'F-D0047-055'; //新竹市
    const WEEK_CYIC = self::API . 'F-D0047-059'; //嘉義市
    const WEEK_TPEC = self::API . 'F-D0047-063'; //台北市
    const WEEK_KHHC = self::API . 'F-D0047-067'; //高雄市
    const WEEK_NTPC = self::API . 'F-D0047-071'; //新北市
    const WEEK_TXGC = self::API . 'F-D0047-075'; //台中市
    const WEEK_TNNC = self::API . 'F-D0047-079'; //台南市

    const ALL_CITY_WEEK = [
        'ila'  => self::WEEK_ILA,
        'tyn'  => self::WEEK_TYN,
        'hsz'  => self::WEEK_HSZ,
        'zmi'  => self::WEEK_ZMI,
        'chw'  => self::WEEK_CHW,
        'ntc'  => self::WEEK_NTC,
        'yun'  => self::WEEK_YUN,
        'cyi'  => self::WEEK_CYI,
        'pif'  => self::WEEK_PIF,
        'ttt'  => self::WEEK_TTT,
        'hun'  => self::WEEK_HUN,
        'peh'  => self::WEEK_PEH,
        'kel'  => self::WEEK_KEL,
        'mfk'  => self::WEEK_MFK,
        'knh'  => self::WEEK_KNH,
        'hszc' => self::WEEK_HSZC,
        'cyic' => self::WEEK_CYIC,
        'tpec' => self::WEEK_TPEC,
        'khhc' => self::WEEK_KHHC,
        'ntpc' => self::WEEK_NTPC,
        'txgc' => self::WEEK_TXGC,
        'tnnc' => self::WEEK_TNNC,
    ];
}
