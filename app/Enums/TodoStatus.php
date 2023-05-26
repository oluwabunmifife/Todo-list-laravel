<?php

namespace App\Enums;

enum TodoStatus: string
{
    case OPEN = 'open';
    case COMPLETED = 'completed';
}