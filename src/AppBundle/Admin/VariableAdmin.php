<?php
// src/AppBundle/Admin/ParticipanteAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class VariableAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('subirCsv', 'subirCsv');
    }
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add('categorias', 'sonata_type_collection', array(
                        'by_reference' => false,
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

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add('categorias')
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add('categorias')
                    ->add('_action', null, array(
                        'actions' => array(
                            'show' => array(),
                            'edit' => array(),
                            'delete' => array(),
                        )
                    ))
       ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add('categorias')
       ;
    }
}