<?php

namespace Formacion\DoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Figura
 *
 * @ORM\Table(name="FIGURAS")
 * @ORM\Entity(repositoryClass="Formacion\DoctrineBundle\Repository\FiguraRepository")
 */
class Figura
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_FIGURA", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=100)
     */
    private $nombre;

    /**
     * @var array
     *
     * @ORM\Column(name="ARISTAS", type="array")
     */
    private $aristas;

    /**
     * @var string
     *
     * @ORM\Column(name="COLOR", type="string", length=100)
     */
    private $color;

    public function __construct()
    {
        $this->aristas = [];
    }


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Figura
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set aristas
     *
     * @param array $aristas
     *
     * @return Figura
     */
    public function setAristas($aristas)
    {
        $this->aristas = $aristas;

        return $this;
    }

    /**
     * Get aristas
     *
     * @return array
     */
    public function getAristas()
    {
        return $this->aristas;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Figura
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}
