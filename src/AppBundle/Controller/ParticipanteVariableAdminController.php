<?php
// src/AppBundle/Controller/CRUDController.php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use AppBundle\Form\Type\SubirCsvFormType;
use ModelBundle\Entity\Participante;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ParticipanteVariableAdminController extends Controller
{
	public function reporteParticipantesAction() {
		$em = $this->container->get('doctrine')->getManager();
		$objPHPExcel = $this->get('phpexcel')->createPHPExcelObject();
		$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		$em = $this->get('doctrine')->getManager();
		$resultados = $em->getRepository("ModelBundle:ParticipanteVariable")->findBy(array(),array("participante"=>"ASC"));
		// Titulos
		$objWorksheet->setCellValue('A1', 'id');
		$objWorksheet->setCellValue('B1', 'id_user');
		$objWorksheet->setCellValue('C1', 'nombre');
		$objWorksheet->setCellValue('D1', 'mes');
		$objWorksheet->setCellValue('E1', '% Cumplimiento Ventas');
		$objWorksheet->setCellValue('F1', '% Cumplimiento Efectividad');
		$objWorksheet->setCellValue('G1', 'Categoria');
		$objWorksheet->setCellValue('H1', 'Tipo');
		$objWorksheet->setCellValue('I1', 'Dinero');
		$categoriasVentas = $em->getRepository("ModelBundle:Variable")->findOneByIdentificador(1)->getCategorias();
		$categoriasEfectividad = $em->getRepository("ModelBundle:Variable")->findOneByIdentificador(2)->getCategorias();
		foreach ($resultados as $key => $registro) {
			$fila = $key+2;
			$objWorksheet->setCellValue('A'.$fila, $registro->getId());
			$objWorksheet->setCellValue('B'.$fila, $registro->getParticipante()->getIdentificador());
			$objWorksheet->setCellValue('C'.$fila, $registro->getParticipante()->getNombre());
			$objWorksheet->setCellValue('D'.$fila, $registro->getMes());
			$objWorksheet->setCellValue('E'.$fila, $registro->getPorcentajeCumplimiento()."%");
			$objWorksheet->setCellValue('F'.$fila, $registro->getPorcentajeCumplimiento()."%");

			$categoriaVentaParticipante = null;
			foreach ($categoriasVentas as $categoria) {
				if (!$categoria->getMaximo() && $registro->getPorcentajeCumplimiento() >= $categoria->getMinimo()) { 
					$categoriaVentaParticipante = $categoria->getNombre();
				}else if(
					$registro->getPorcentajeCumplimiento() >= $categoria->getMinimo() &&
					$registro->getPorcentajeCumplimiento() <= $categoria->getMaximo() 
					) {
					$categoriaVentaParticipante = $categoria->getNombre();
				}
			}

			$categoriaEfectividadParticipante = null;
			foreach ($categoriasEfectividad as $categoria) {
				if (!$categoria->getMaximo() && $registro->getPorcentajeCumplimiento() >= $categoria->getMinimo()) { 
					$categoriaEfectividadParticipante = $categoria->getNombre();
				}else if(
					$registro->getPorcentajeCumplimiento() >= $categoria->getMinimo() &&
					$registro->getPorcentajeCumplimiento() <= $categoria->getMaximo() 
					) {
					$categoriaEfectividadParticipante = $categoria->getNombre();
				}
			}
			$objWorksheet->setCellValue('G'.$fila, $categoriaVentaParticipante?$categoriaVentaParticipante:"No Aplica");
			$objWorksheet->setCellValue('H'.$fila, $categoriaEfectividadParticipante?$categoriaEfectividadParticipante:"No aplica");
			$dinero = 0;
			if ($categoriaVentaParticipante && $categoriaEfectividadParticipante) {
				if ($categoriaVentaParticipante == "Bronce" && $categoriaEfectividadParticipante == "C") {
					$dinero = 62.50;
				}
				if ($categoriaVentaParticipante == "Bronce" && $categoriaEfectividadParticipante == "B") {
					$dinero = 93.75;
				}
				if ($categoriaVentaParticipante == "Bronce" && $categoriaEfectividadParticipante == "A") {
					$dinero = 125.00;
				}


				if ($categoriaVentaParticipante == "Plata" && $categoriaEfectividadParticipante == "C") {
					$dinero = 87.50;
				}
				if ($categoriaVentaParticipante == "Plata" && $categoriaEfectividadParticipante == "B") {
					$dinero = 131.25;
				}
				if ($categoriaVentaParticipante == "Plata" && $categoriaEfectividadParticipante == "A") {
					$dinero = 175.00;
				}


				if ($categoriaVentaParticipante == "Oro" && $categoriaEfectividadParticipante == "C") {
					$dinero = 125.00;
				}
				if ($categoriaVentaParticipante == "Oro" && $categoriaEfectividadParticipante == "B") {
					$dinero = 187.50;
				}
				if ($categoriaVentaParticipante == "Oro" && $categoriaEfectividadParticipante == "A") {
					$dinero = 250.00;
				}
			}
			$objWorksheet->setCellValue('I'.$fila, "$".$dinero);
		}
		// create the writer
        $writer = $this->get('phpexcel')->createWriter($objPHPExcel, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'reporte.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response; 
	}
}