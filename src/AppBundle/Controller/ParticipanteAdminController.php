<?php
// src/AppBundle/Controller/CRUDController.php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use AppBundle\Form\Type\SubirCsvFormType;
use ModelBundle\Entity\Participante;

class ParticipanteAdminController extends Controller
{

	public function subirCsvAction()
	{
        $request = $this->getRequest();
        $form = $this->createForm('subirCsv');
        $form->handleRequest($request);
        if ($form->isValid()) {
            $archivo = $this->subirDatos($form->get('archivo')->getData());
            if ($archivo === true) {
                $this->container->get('session')->getFlashBag()->set('notice', 'Archivo subido correctamente');
                return $this->redirect($this->admin->generateUrl('subirCsv'));
            }
        }
        return $this->render("AppBundle:ParticipanteAdmin:index.html.twig", array(
        	"form" => $form->createView(),
        ), null, $request);
    }

    public function subirDatos($archivo) {
        $em = $this->container->get('doctrine')->getManager();
        $objPHPExcel = $this->get('phpexcel')->createPHPExcelObject($archivo);
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(1);
        $highestRow = $objWorksheet->getHighestDataRow();
        $highestColumn = $objWorksheet->getHighestDataColumn();
        $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
        $headingsArray = $headingsArray[1];
        $campoBasicArray = array(
            'id',
            'Nombre',
            'Cedula',
            'Edad',
            'Genero( 0=FEM 1=MASC)',
        );
        $error = false;
        for ($row = 2; $row <= $highestRow; ++$row) {
            $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
            foreach ($dataRow[$row] as $key => $value) {
                if (is_null($value)) {
                    if ($dataRow[$row]['C'] == null || $dataRow[$row]['D'] == null) {
                        
                    } else {
                        $this->container->get('session')->getFlashBag()->add('error', 'El valor en la  coordenada ' . $key . $row . ' esta vacio');
                        $error = true;
                    }
                }
            }
        }
        if ($error) {
            return false;
        } else {
            $error = false;
            for ($row = 2; $row <= $highestRow; ++$row) {
                $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                //Registro de la informacion basica
                $columna = 0;
                if (($key = array_search($campoBasicArray[$columna], $headingsArray)) && !is_null($dataRow[$row][$key]) && trim($dataRow[$row][$key])) {
                	$participante = $em->getRepository("ModelBundle:Participante")->findOneByIdentificador($dataRow[$row]['A']);
                	if ($participante) {
                		$newParticipante = $participante;
                	}else{
                		$newParticipante = new Participante();
                	}
                    $identificador = $dataRow[$row]['A'];
                    $nombre = $dataRow[$row]['B'];
                    $cedula = $dataRow[$row]['C'];
                    $edad = $dataRow[$row]['D'];
                    $genero = $dataRow[$row]['E'];
                   
                    $newParticipante->setIdentificador($identificador);
                    $newParticipante->setNombre($nombre);
                    $newParticipante->setCedula($cedula);
                    $newParticipante->setEdad($edad);
                    $newParticipante->setGenero($genero == 1 ? "Masculino":"Femenino");
                    $em->persist($newParticipante);
                } else {
                    if ($key == false) {
                        $this->container->get('session')->getFlashBag()->add('error', 'En el archivo no hay ninguna columna :  ' . $campoBasicArray[$columna]);
                        $error = true;
                        break 1;
                    }
                    if (trim($dataRow[$row][$key])) {
                        $this->container->get('session')->getFlashBag()->add('error', 'El valor para el campo ' . $campoBasicArray[$columna] . ' en la fila ' . $row . ' esta vacio');
                        $error = true;
                        break 1;
                    }
                    if (!$dataRow[$row][$key]) {
                        $this->container->get('session')->getFlashBag()->add('error', 'El valor para el campo ' . $campoBasicArray[$columna] . ' en la fila ' . $row . ' esta vacio');
                        $error = true;
                        break 1;
                    }
                }
                $columna++;
            }
            if ($error == true) {
                return false;
            } else {
                $em->flush();
                return true;
            }
        }
    }

}