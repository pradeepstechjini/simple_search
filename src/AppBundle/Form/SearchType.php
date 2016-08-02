<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('required'=>false))
            ->add('sortbyprice', 'choice',array( 'choices' => array('low to high'> 'ASC', 'high to low' => 'DESC'),
    'choices_as_values' => 'ASC', 'required'=>false))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults(array(
    			'csrf_protection' => false
    	));
    }
    
    public function getBlockPrefix()
    {
    	return '';
    }
}
