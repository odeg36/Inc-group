<?php

namespace ModelBundle\Entity;

/**
 * Participante
 */
class Participante
{
    public function __toString(){
        return $this->getNombre()?$this->getNombre():"";
    }
    /**
     * @var int
     */
    private $id;


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
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $cedula;

    /**
     * @var integer
     */
    private $edad;

    /**
     * @var string
     */
    private $genero;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Participante
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
     * Set cedula
     *
     * @param string $cedula
     *
     * @return Participante
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Participante
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return integer
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Participante
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }
}
