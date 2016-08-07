<?php

namespace ModelBundle\Entity;

/**
 * CategoriaVariable
 */
class CategoriaVariable
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
    private $minimo;

    /**
     * @var integer
     */
    private $maximo;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ModelBundle\Entity\Variable
     */
    private $variable;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return CategoriaVariable
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
     * Set minimo
     *
     * @param integer $minimo
     *
     * @return CategoriaVariable
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * Get minimo
     *
     * @return integer
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * Set maximo
     *
     * @param integer $maximo
     *
     * @return CategoriaVariable
     */
    public function setMaximo($maximo)
    {
        $this->maximo = $maximo;

        return $this;
    }

    /**
     * Get maximo
     *
     * @return integer
     */
    public function getMaximo()
    {
        return $this->maximo;
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
     * Set variable
     *
     * @param \ModelBundle\Entity\Variable $variable
     *
     * @return CategoriaVariable
     */
    public function setVariable(\ModelBundle\Entity\Variable $variable = null)
    {
        $this->variable = $variable;

        return $this;
    }

    /**
     * Get variable
     *
     * @return \ModelBundle\Entity\Variable
     */
    public function getVariable()
    {
        return $this->variable;
    }
}
