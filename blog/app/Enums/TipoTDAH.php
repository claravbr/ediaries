<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TipoTDAH extends Enum
{
    const Inatento =   0;
    const Combinado =   1;
    const Hiperactivo = 2;
}
