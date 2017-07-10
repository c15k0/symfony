<?php

namespace Formacion\DoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arista
 *
 * @ORM\Table(name="arista")
 * @ORM\Entity(repositoryClass="Formacion\DoctrineBundle\Repository\AristaRepository")
 */
class Arista
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="decimal", precision=4, scale=4)
     */
    private $longitud;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     *
     * @return Arista
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string
     */
    public function getLongitud()
    {
        return $this->longitud;
    }
}

