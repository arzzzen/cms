<?php

namespace Arzzzen\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

class NewsAdmin extends Admin
{
    /**
     * Метод вызывается перед обновлением записи
     * @param  $news Редактируемый объект
     * @return void
     */
    public function preUpdate($news)
    {
    }

    /**
     * Конфигурация отображения записи
     *
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('id', null, array('label' => 'Идентификатор'))
                ->add('anons', null, array('label' => 'Анонс'));
    }

    /**
     * Конфигурация формы редактирования записи
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->add('created', null, array('label' => 'Дата', 'widget' => 'single_text', 'attr' => array('class' => 'datepicker')))
                ->add('anons', null, array('label' => 'Анонс'))
                ->add('image', 'sonata_type_model_list', array('label' => 'Изображение','required' => false), array('link_parameters' => array('context' => 'news')))
                ->add('content', null, array('label' => 'Текст', 'attr'=>array('class'=>'ckeditor')));
    }

    /**
     * Конфигурация списка записей
     *
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('created', null, array('label' => 'Дата создания'))
                ->add('image', null, array('label' => 'Изображение'))
                ->addIdentifier('anons', null, array('label' => 'Анонс'));
    }

    public function getPersistentParameters()
    {
        if (!$this->getRequest()) {
            return array();
        }

        return array(
            'provider' => $this->getRequest()->get('provider'),
            'context'  => $this->getRequest()->get('context'),
        );
    }
}