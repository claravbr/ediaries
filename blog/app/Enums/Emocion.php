<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Emocion extends Enum
{
    const Enfadado =   0;
    const Triste =   1;
    const Cansado = 2;
    const Contento = 3;
    const Emocionado = 4;
}
