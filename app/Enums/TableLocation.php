<?php

namespace APP\Enums;


enum TableLocation: string
{
    case Front = 'front';
    case Inside = 'inside';
    case Outside = 'outside';
}