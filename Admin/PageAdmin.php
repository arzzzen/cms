<?php

namespace Arzzzen\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('route', 'text', array('label' => 'Путь к странице /'))
            ->add('title', 'text', array('label' => 'Заголовок страницы'))
            ->add('content', 'textarea', array('label' => 'Контент', 'attr' => array('class' => 'ckeditor')))
            ->with('Дополнительно')
                    ->add('sidebar', 'text', array('label' => 'Сайдбар', 'required' => false))
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('route')
            ->add('title')
        ;
    }
}