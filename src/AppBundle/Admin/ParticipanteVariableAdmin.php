<?php
// src/AppBundle/Admin/ParticipanteAdmin.php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ParticipanteVariableAdmin extends AbstractAdmin
{

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('reporteParticipantes', 'reporteParticipantes');
    }
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                    ->add("participante")
                    ->add("variable")
                    ->add("mes")
                    ->add("resultado")
                    ->add("objetivo")
                    ->add("porcentaje_cumplimiento")
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
                    ->add("participante")
                    ->add("variable")
                    ->add("mes")
                    ->add("resultado")
                    ->add("objetivo")
                    ->add("porcentaje_cumplimiento")
       ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                    ->add("participante")
                    ->add("variable")
                    ->add("mes")
                    ->add("resultado")
                    ->add("objetivo")
                    ->add("porcentaje_cumplimiento")
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
                    ->add("participante")
                    ->add("variable")
                    ->add("mes")
                    ->add("resultado")
                    ->add("objetivo")
                    ->add("porcentaje_cumplimiento")
       ;
    }
}