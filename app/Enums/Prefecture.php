<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Prefecture extends Enum
{
    const Hokkaido = 1;
    const Aomori = 2;
    const Iwate = 3;
    const Miyagi = 4;
    const Akita = 5;
    const Yamagata = 6;
    const Fukushima = 7;
    const Ibaraki = 8;
    const Tochigi = 9;
    const Gunma = 10;
    const Saitama = 11;
    const Chiba = 12;
    const Tokyo = 13;
    const Kanagawa = 14;
    const Niigata = 15;
    const Toyama = 16;
    const Ishikawa = 17;
    const Fukui = 18;
    const Yamanashi = 19;
    const Nagano = 20;
    const Gifu = 21;
    const Shizuoka = 22;
    const Aichi = 23;
    const Mie = 24;
    const Shiga = 25;
    const Kyoto = 26;
    const Osaka = 27;
    const Hyogo = 28;
    const Nara = 29;
    const Wakayama = 30;
    const Tottori = 31;
    const Shimane = 32;
    const Okayama = 33;
    const Hiroshima = 34;
    const Yamaguchi = 35;
    const Tokushima = 36;
    const Kagawa = 37;
    const Ehime = 38;
    const Kochi = 39;
    const Fukuoka = 40;
    const Saga = 41;
    const Nagasaki = 42;
    const Kumamoto = 43;
    const Oita = 44;
    const Miyazaki = 45;
    const Kagoshima = 46;
    const Okinawa = 47;

    public static function getDescription($value): string
    {
        switch ($value){
            case self::Hokkaido:
                return '北海道';
                break;
            case self::Aomori:
                return '青森県';
                break;
            case self::Iwate:
                return '岩手県';
                break;
            case self::Miyagi:
                return '宮城県';
                break;
            case self::Akita:
                return '秋田県';
                break;
            case self::Yamagata:
                return '山形県';
                break;
            case self::Fukushima:
                return '福島県';
                break;
            case self::Ibaraki:
                return '茨城県';
                break;
            case self::Tochigi:
                return '栃木県';
                break;
            case self::Gunma:
                return '群馬県';
                break;
            case self::Saitama:
                return '埼玉県';
                break;
            case self::Chiba:
                return '千葉県';
                break;
            case self::Tokyo:
                return '東京都';
                break;
            case self::Kanagawa:
                return '神奈川県';
                break;
            case self::Niigata:
                return '新潟県';
                break;
            case self::Toyama:
                return '富山県';
                break;
            case self::Ishikawa:
                return '石川県';
                break;
            case self::Fukui:
                return '福井県';
                break;
            case self::Yamanashi:
                return '山梨県';
                break;
            case self::Nagano:
                return '長野県';
                break;
            case self::Gifu:
                return '岐阜県';
                break;
            case self::Shizuoka:
                return '静岡県';
                break;
            case self::Aichi:
                return '愛知県';
                break;
            case self::Mie:
                return '三重県';
                break;
            case self::Shiga:
                return '滋賀県';
                break;
            case self::Kyoto:
                return '京都府';
                break;
            case self::Osaka:
                return '大阪府';
                break;
            case self::Hyogo:
                return '兵庫県';
                break;
            case self::Nara:
                return '奈良県';
                break;
            case self::Wakayama:
                return '和歌山県';
                break;
            case self::Tottori:
                return '鳥取県';
                break;
            case self::Shimane:
                return '島根県';
                break;
            case self::Okayama:
                return '岡山県';
                break;
            case self::Hiroshima:
                return '広島県';
                break;
            case self::Yamaguchi:
                return '山口県';
                break;
            case self::Tokushima:
                return '徳島県';
                break;
            case self::Kagawa:
                return '香川県';
                break;
            case self::Ehime:
                return '愛媛県';
                break;
            case self::Kochi:
                return '高知県';
                break;
            case self::Fukuoka:
                return '福岡県';
                break;
            case self::Saga:
                return '佐賀県';
                break;
            case self::Nagasaki:
                return '長崎県';
                break;
            case self::Kumamoto:
                return '熊本県';
                break;
            case self::Oita:
                return '大分県';
                break;
            case self::Miyazaki:
                return '宮崎県';
                break;
            case self::Kagoshima:
                return '鹿児島県';
                break;
            case self::Okinawa:
                return '沖縄県';
                break;
        }
    }
}