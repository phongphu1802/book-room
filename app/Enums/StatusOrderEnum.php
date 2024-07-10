<?php

namespace App\Enums;

enum StatusOrderEnum: string
{
    case SUCCESS = 'success';
    case PENDING = 'pending';
    case CANCEL = 'cancel';
    case PAID = 'paid';
}