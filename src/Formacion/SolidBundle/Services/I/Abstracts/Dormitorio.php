<?php
namespace Formacion\SolidBundle\Services\I\Abstracts;

use Formacion\SolidBundle\Services\I\Interfaces\Limpiable;
use Formacion\SolidBundle\Services\I\Interfaces\Reformable;

/**
 * Class Dormitorio
 * @package Formacion\SolidBundle\Services\I\Abstracts
 */
abstract class Dormitorio implements Limpiable, Reformable {
    public function limpiar()
    {
        // algoritmo de limpiado de un dormitorio
    }
}