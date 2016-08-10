<?php
namespace AppBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class UserAdmin extends AbstractAdmin
{

    protected function configureFormFields (FormMapper $formMapper)
    {
        $formMapper
           ->add('username')
           ->add('email')
           ->add('roles')
           ->add('enabled', 'checkbox', array('required'=>false));
    }
    
    // Fields to be shown on filter forms
    protected function configureDatagridFilters (DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username')->add('email')->add('enabled');
    }
    
    // Fields to be shown on lists
    protected function configureListFields (ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username')
            ->add('email')
            ->add('roles')
            ->add('enabled');
    }
    
    // Fields to be shown on show action
    protected function configureShowFields (ShowMapper $showMapper)
    {
        $showMapper->add('username')
            ->add('email')
            ->add('roles')
            ->add('enabled');
    }
}