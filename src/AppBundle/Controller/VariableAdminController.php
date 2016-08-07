<?php
// src/AppBundle/Controller/CRUDController.php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use AppBundle\Form\Type\SubirCsvFormType;
use ModelBundle\Entity\ParticipanteVariable;

class VariableAdminController extends Controller
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
		$objWorksheet = $objPHPExcel->setActiveSheetIndex(2);
		$highestRow = $objWorksheet->getHighestDataRow();
		$highestColumn = $objWorksheet->getHighestDataColumn();
		$headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
		$headingsArray = $headingsArray[1];
		$campoBasicArray = array(
			'id',
			'Variable',
			'Mes',
			'Resultado',
			'Objetivo',
			'% Cumplimiento',
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
					$idParticipante = $dataRow[$row]['A'];
					$idVariable = $dataRow[$row]['B'];
					$mes = $dataRow[$row]['C'];
					$resultado = $dataRow[$row]['D'];
					$objetivo = $dataRow[$row]['E'];
					$porcentaje = $dataRow[$row]['F'];

                	$participante_variable = $em->getRepository("ModelBundle:ParticipanteVariable")->findOneBy(array(
                		"participante" => $idParticipante,
                		"variable" => $idVariable,
                		"mes" => $mes,
                		));
                	if ($participante_variable) {
                		$newParticipanteVariable = $participante_variable;
                	}else{
						$newParticipanteVariable = new ParticipanteVariable();
                	}

					$newParticipanteVariable->setParticipante($em->getRepository("ModelBundle:Participante")->findOneByIdentificador($idParticipante));
					$newParticipanteVariable->setVariable($em->getRepository("ModelBundle:Variable")->findOneByIdentificador($idVariable));
					$newParticipanteVariable->setMes($mes);
					$newParticipanteVariable->setResultado($resultado);
					$newParticipanteVariable->setObjetivo($objetivo);
					$explode_porcentaje = explode("%",$porcentaje);
					$newParticipanteVariable->setPorcentajeCumplimiento($explode_porcentaje[0]);
					$em->persist($newParticipanteVariable);
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