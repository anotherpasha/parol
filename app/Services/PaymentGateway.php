<?php

namespace App\Services;

class PaymentGateway
{
    const OPEN = 'open';
    const HOLD = 'on-hold';
    const PENDING = 'pending';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';

}
