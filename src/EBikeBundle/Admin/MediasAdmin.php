<?php
// src/EBikeBundle/Admin/CategoryAdmin.php
namespace EBikeBundle\Admin;

use EBikeBundle\Entity\Media;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MediasAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('image', 'sonata_type_model', array(
                'required'=>false,
                'class' => 'EBikeBundle:MediaHome',
                'property' => 'url',
                'label' => 'Imagen'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $dataGridMapper)
    {
        $dataGridMapper
            ->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('image.url');
    }
    public function toString($object)
    {
        return $object instanceof Media
            ? $object->getName()
            : 'Media'; // shown in the breadcrumb on the create view
    }
}