<?php

use Formacion\SolidBundle\Services\I\Interfaces\Reformable;

/**
 * @param Reformable $dormitorio
 * @return mixed
 */
function hacer_reforma_en_casa(Reformable $dormitorio) {
    return $dormitorio->reformar();
}