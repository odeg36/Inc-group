<?php

namespace ModelBundle\Entity;

/**
 * Variable
 */
class Variable
{
    public function __toString(){
        return $this->getNombre()?$this->getNombre():"";
    }
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Variable
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add categoria
     *
     * @param \ModelBundle\Entity\CategoriaVariable $categoria
     *
     * @return Variable
     */
    public function addCategoria(\ModelBundle\Entity\CategoriaVariable $categoria)
    {
        $categoria->setVariable($this);
        $this->categorias[] = $categoria;

        return $this;
    }

    /**
     * Remove categoria
     *
     * @param \ModelBundle\Entity\CategoriaVariable $categoria
     */
    public function removeCategoria(\ModelBundle\Entity\CategoriaVariable $categoria)
    {
        $this->categorias->removeElement($categoria);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
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
     * @return Variable
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
    private $participantes;


    /**
     * Add participante
     *
     * @param \ModelBundle\Entity\ParticipanteVariable $participante
     *
     * @return Variable
     */
    public function addParticipante(\ModelBundle\Entity\ParticipanteVariable $participante)
    {
        $this->participantes[] = $participante;

        return $this;
    }

    /**
     * Remove participante
     *
     * @param \ModelBundle\Entity\ParticipanteVariable $participante
     */
    public function removeParticipante(\ModelBundle\Entity\ParticipanteVariable $participante)
    {
        $this->participantes->removeElement($participante);
    }

    /**
     * Get participantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipantes()
    {
        return $this->participantes;
    }
}
