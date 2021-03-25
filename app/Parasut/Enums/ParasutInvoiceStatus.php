<?php

namespace App\Parasut\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static NotBilled()
 * @method static static NotFormalized()
 * @method static static Formalized()
 */
final class ParasutInvoiceStatus extends Enum
{
    const NotBilled = "0";
    const NotFormalized = "1";
    const Formalized = "2";
}
