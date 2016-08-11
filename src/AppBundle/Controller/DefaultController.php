<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Giveaway;
use AppBundle\Form\SearchType;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
    	$data = array();
    	$em = $this->getDoctrine()->getManager();
    	$access = 0;
    	if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
    		$access = 1;
    	}
        $filterForm = $this->createFormBuilder($data)
               ->add('name', 'text', array('required'=>false))
               ->add('sortbyprice', 'choice',array( 'choices' => array('ASC'=> 'low to high', 'DESC' => 'high to low'), 'required'=>false, 'label'=>'Sort by price'))
               ->add('search', 'submit', array('label' => 'Search'))
               ->getForm();	
        
    	$formData = $this->getRequest()->request->all();;
	    $entities = $em->getRepository('AppBundle:Giveaway')
	        ->filterQueryBuilder($formData, $access);

        return array(
            'entities' => $entities,
        	'filterForm' => $filterForm->createView(),
        );
    }
}
