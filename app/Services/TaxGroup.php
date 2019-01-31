<?php

namespace App\Services;

class TaxGroup
{
    const TAX_TK_0 = 'tk0';
    const TAX_K_0 = 'k0';
    const TAX_K_1 = 'k1';
    const TAX_K_2 = 'k2';
    const TAX_K_3 = 'k3';

    public static $PTKP = [
        self::TAX_TK_0 => 54000000,
        self::TAX_K_0 => 58500000,
        self::TAX_K_1 => 63000000,
        self::TAX_K_2 => 67500000,
        self::TAX_K_3 => 72000000,
    ];

    public static function isTKGroup(?string $group): bool
    {
        switch ($group) {
            case self::TAX_TK_0:
                return true;
                break;
        }
        return false;
    }

    public static function isKGroup(?string $group): bool
    {
        switch ($group) {
            case self::TAX_K_0:
            case self::TAX_K_1:
            case self::TAX_K_2:
            case self::TAX_K_3:
                return true;
                break;
        }
        return false;
    }
}