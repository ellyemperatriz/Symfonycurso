<?php

namespace Elly\WorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/practicas")
 */

class DefaultController extends Controller
{
    /**
     * @Route("/" , name="ruta_1")
     * @Template("")
     */
    public function indexAction()
    {
    	$practicas = array(
    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'Iniciando Symfony',
    			 'horas' => 3  
    	     ),

    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'Creacion del Bundle',
    			 'horas' => 0.5 
    		 ),

    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'Las Respuestas',
    			 'horas' => 05 
    		 ), 

    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'La vista y los Twig',
    			 'horas' => 1 
    		 ),    		

    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'Doctrine',
    			 'horas' => 2 
    		 ),    			 	    	
    		
    		array(
    			 'fecha' => new \DateTime(),
    			 'actividad' => 'CRUD',
    			 'horas' => 1 
    		 ),
    	 );	     		

    	return array(
    		'practicas' => $practicas,
    		'nombre' => 'Elly',
    		'edad' => 25
    	 );
    }
}
