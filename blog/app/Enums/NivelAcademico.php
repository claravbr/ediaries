<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NivelAcademico extends Enum
{
    const CeroTres =   0;
    const TresSeis =   1;
    const PrimeroPrimaria = 2;
    const SegundoPrimaria = 3;
    const TerceroPrimaria = 4;
    const CuartoPrimaria = 5;
    const QuintoPrimaria = 6;
    const SextoPrimaria = 7;
    const PrimeroEso = 8;
    const SegundoEso = 9;
    const TerceroEso = 10;
    const CuartoEso = 11;
    const PrimeroBachillerato = 12;
    const SegundoBachillerato = 13;
}
