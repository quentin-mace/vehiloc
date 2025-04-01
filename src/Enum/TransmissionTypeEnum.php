<?php


namespace App\Enum;


enum TransmissionTypeEnum: string

{
    case Manual = 'manual';
    case Automatic = 'automatic';
    public function getLabel(): string
    {
        return match ($this) {
            self::Manual => 'Manuelle',
            self::Automatic => 'Automatique',
        };
    }
}
