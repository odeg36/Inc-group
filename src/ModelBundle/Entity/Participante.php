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
    /**
     * @var string
     */
    private $identificador;


    /**
     * Set identificador
     *
     * @param string $identificador
     *
     * @return Participante
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;

        return $this;
    }

    /**
     * Get identificador
     *
     * @return string
     */
    public function getIdentificador()
    {
        return $this->identificador;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $variables;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variables = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add variable
     *
     * @param \ModelBundle\Entity\ParticipanteVariable $variable
     *
     * @return Participante
     */
    public function addVariable(\ModelBundle\Entity\ParticipanteVariable $variable)
    {
        $this->variables[] = $variable;

        return $this;
    }

    /**
     * Remove variable
     *
     * @param \ModelBundle\Entity\ParticipanteVariable $variable
     */
    public function removeVariable(\ModelBundle\Entity\ParticipanteVariable $variable)
    {
        $this->variables->removeElement($variable);
    }

    /**
     * Get variables
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVariables()
    {
        return $this->variables;
    }
}
