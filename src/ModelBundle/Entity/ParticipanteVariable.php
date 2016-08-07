<?php

namespace ModelBundle\Entity;

/**
 * ParticipanteVariable
 */
class ParticipanteVariable
{
    /**
     * @var integer
     */
    private $mes;

    /**
     * @var integer
     */
    private $resultado;

    /**
     * @var integer
     */
    private $objetivo;

    /**
     * @var integer
     */
    private $porcentaje_cumplimiento;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ModelBundle\Entity\Participante
     */
    private $participante;

    /**
     * @var \ModelBundle\Entity\Variable
     */
    private $variable;


    /**
     * Set mes
     *
     * @param integer $mes
     *
     * @return ParticipanteVariable
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set resultado
     *
     * @param integer $resultado
     *
     * @return ParticipanteVariable
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return integer
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set objetivo
     *
     * @param integer $objetivo
     *
     * @return ParticipanteVariable
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return integer
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set porcentajeCumplimiento
     *
     * @param integer $porcentajeCumplimiento
     *
     * @return ParticipanteVariable
     */
    public function setPorcentajeCumplimiento($porcentajeCumplimiento)
    {
        $this->porcentaje_cumplimiento = $porcentajeCumplimiento;

        return $this;
    }

    /**
     * Get porcentajeCumplimiento
     *
     * @return integer
     */
    public function getPorcentajeCumplimiento()
    {
        return $this->porcentaje_cumplimiento;
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
     * Set participante
     *
     * @param \ModelBundle\Entity\Participante $participante
     *
     * @return ParticipanteVariable
     */
    public function setParticipante(\ModelBundle\Entity\Participante $participante = null)
    {
        $this->participante = $participante;

        return $this;
    }

    /**
     * Get participante
     *
     * @return \ModelBundle\Entity\Participante
     */
    public function getParticipante()
    {
        return $this->participante;
    }

    /**
     * Set variable
     *
     * @param \ModelBundle\Entity\Variable $variable
     *
     * @return ParticipanteVariable
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

