<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('is_admin', 'checkbox', array('required' => false,));
	}

	public function getParent()
	{
		return 'fos_user_registration';
	}

	public function getBlockPrefix()
	{
		return 'app_user_registration';
	}

	// For Symfony 2.x
	public function getName()
	{
		return $this->getBlockPrefix();
	}
}
