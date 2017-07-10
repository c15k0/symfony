<?php
namespace Formacion\SolidBundle\Services\L\Good;

/**
 * Class Cocina
 * @package Formacion\SolidBundle\Services\L\Good
 */
class Cocina {
    /**
     * @param array $ingredientes
     * @return array
     */
    public function cocinar(array $ingredientes = []) {
        foreach($ingredientes as $ingrediente) {
            // do something
        }
        return $comida;
    }
}

/**
 * @param Cocina $cocina
 * @param array $ingredientes
 * @return array
 */
function hacer_la_comida(Cocina $cocina, array $ingredientes) {
    return $cocina->cocinar($ingredientes);
}
