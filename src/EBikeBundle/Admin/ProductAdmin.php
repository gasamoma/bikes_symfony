<?php
// src/EBikeBundle/Admin/CategoryAdmin.php
namespace EBikeBundle\Admin;

use EBikeBundle\Entity\Product;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab("Datos Básicos")
                ->with("Datos Básicos")
                    ->add('name', 'text', array(
                        'label' => 'Nombre'
                    ))
                    ->add('shortDesc', 'text', array(
                        'label' => 'Descripción corta'
                    ))
                    ->add('fullDescription', 'textarea', array(
                        'label' => 'Descripción Completa'
                    ))
                    ->add('reference', 'text', array(
                        'label' => 'Referencia'
                    ))
                    ->add('deliverTime', 'text', array(
                        'label' => 'Tiempo de Entrega'
                    ))
                    ->add('score', 'number', array(
                        'label' => 'Puntaje'
                    ))
                    ->add('price', 'money', array(
                        'scale'=>0,
                        'currency'=>'COP',
                        'label' => 'Precio'
                    ))
                    ->add('categoryCategory', 'sonata_type_model', array(
                        'class' => 'EBikeBundle:Category',
                        'property' => 'name',
                        'label' => 'Categoría'
                    ))
                ->end()
            ->end()
            ->tab("Media")
                ->with("Imagenes & reviews")
                    ->add('medias', 'sonata_type_collection', array(
                        'type_options' => array(
                            // Prevents the "Delete" option from being displayed
                            'delete' => false,
                            'delete_options' => array(
                                // You may otherwise choose to put the field but hide it
                                'type'         => 'hidden',
                                // In that case, you need to fill in the options as well
                                'type_options' => array(
                                    'mapped'   => false,
                                    'required' => false,
                                )
                            )
                        ),

                    ), array(
                        'edit' => 'standard',
                        'sortable' => 'position',
                    ))
                    ->add('reviews', 'sonata_type_collection', array(
                        'type_options' => array(
                            // Prevents the "Delete" option from being displayed
                            'delete' => false,
                            'delete_options' => array(
                                // You may otherwise choose to put the field but hide it
                                'type'         => 'hidden',
                                // In that case, you need to fill in the options as well
                                'type_options' => array(
                                    'mapped'   => false,
                                    'required' => false,
                                )
                            )
                        )
                    ), array(
                        'edit' => 'inline',
                        'inline' => 'table',
                        'sortable' => 'position',
                    ))
                ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $dataGridMapper)
    {
        $dataGridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
    public function toString($object)
    {
        return $object instanceof Product
            ? $object->getName()
            : 'Producto'; // shown in the breadcrumb on the create view
    }

}