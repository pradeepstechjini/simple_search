<?php
namespace AppBundle\Admin;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ProductAdmin extends AbstractAdmin
{

    protected function configureFormFields (FormMapper $formMapper)
    {
        $formMapper
           ->add('name')
           ->add('price')
           ->add('slug')
           ->add('is_resticted', 'checkbox', array('required'=>false));
    }
    
    // Fields to be shown on filter forms
    protected function configureDatagridFilters (DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')->add('price')->add('slug');
    }
    
    // Fields to be shown on lists
    protected function configureListFields (ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name')
            ->add('price')
            ->add('slug')
            ->add('is_resticted');
    }
    
    // Fields to be shown on show action
    protected function configureShowFields (ShowMapper $showMapper)
    {
        $showMapper->add('name')
            ->add('price')
            ->add('slug');
    }
}