<?php
// src/AppBundle/Admin/ParticipanteAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ParticipanteAdmin extends AbstractAdmin
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
                    ->add("cedula")
                    ->add("edad")
                    ->add("genero")
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add("cedula")
                    ->add("edad")
                    ->add("genero")
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                    ->add("identificador")
                    ->add("nombre")
                    ->add("cedula")
                    ->add("edad")
                    ->add("genero")
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
                    ->add("cedula")
                    ->add("edad")
                    ->add("genero")
       ;
    }
}