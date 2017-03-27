<?php
// src/EBikeBundle/Admin/CategoryAdmin.php
namespace EBikeBundle\Admin;

use EBikeBundle\Entity\MediaHome;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MediaHomeAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('url', 'text',array(
                'help'=> '<img src="'.$this->getSubject()->getUrl().'" style="max-height: 100px; max-width: 100px;" />',
            ))
            ->add('type', 'choice',array(
                'choices' => array('Imagen' => 'img', 'Video' => 'vid'),
                // always include this
                'choices_as_values' => true,
            ))
            ->add('productProduct', 'entity', array(
                'required'=>false,
                'class' => 'EBikeBundle:Product',
                'choice_label' => 'name',
                'label' => 'Producto'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $dataGridMapper)
    {
        $dataGridMapper
            ->add('productProduct.name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('productProduct.name')
            ->addIdentifier('url');
    }
    public function toString($object)
    {
        return $object instanceof MediaHome
            ? $object->getUrl()
            : 'Media'; // shown in the breadcrumb on the create view
    }
}