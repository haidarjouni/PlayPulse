<?php

namespace App\Enums;

enum UserGameStatus: string
{
    case PLAN_TO_PLAY = 'plan to play';
    case COMPLETED = 'completed';
    case DROPPED = 'dropped';
    case PAUSED = 'paused';
    case REPLAYING = 'replaying';
    case PLAYING = 'playing';

    public static function values(): array
    {
        return array_column(self::cases(), 'value'); // self::case retrieve all the cases (as an array multidemtnional) we put it in array_column so we can extract a specific column from the array
    }
}
