<?php

namespace App\Models\Enums;

enum OrderStatusEnum : int
{
    case NEW = 0;
    case COMPLETED = 1;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'new',
            self::COMPLETED => 'completed',
        };
    }
}
