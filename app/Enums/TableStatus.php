<?php

namespace APP\Enums;


enum TableStatus: string
{
    case Pending = 'pending';
    case Available = 'available';
    case Unavailable = 'unavailable';
}