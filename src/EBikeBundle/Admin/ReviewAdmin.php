<?php
// src/EBikeBundle/Admin/CategoryAdmin.php
namespace EBikeBundle\Admin;

use EBikeBundle\Entity\Review;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReviewAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('date', 'date')
            ->add('score', 'number')
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
            ->addIdentifier('name')
            ->add('productProduct.name');
    }
    public function toString($object)
    {
        return $object instanceof Review
            ? $object->getName()
            : 'Valoración'; // shown in the breadcrumb on the create view
    }
}