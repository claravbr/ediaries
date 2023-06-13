<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DificultadAprendizaje extends Enum
{
    const Dislexia =   0;
    const Discalculia =   1;
    const Disgrafia = 2;
    const Transtorno_coordinacion_movimiento = 3;
}
