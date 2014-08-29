<?php

namespace Elly\WorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * practicas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Elly\WorkBundle\Entity\practicasRepository")
 */
class practicas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="actividad", type="string", length=255)
     */
    private $actividad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="frecuencia", type="date")
     */
    private $frecuencia;

    /**
     *@ORM\Column(name="horas", type="float")
     */
    private $horas;

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
     * Set actividad
     *
     * @param string $actividad
     * @return practicas
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string 
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set frecuencia
     *
     * @param \DateTime $frecuencia
     * @return practicas
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return \DateTime 
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

/**
     * Set horas
     *
     * @param \DateTime $horas
     * @return practicas
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;

        return $this;        
    }

    /**
     * Get horas
     *
     * @return \DateTime 
     */
    public function getHoras()
    {
        return $this->horas;     
    }

}
