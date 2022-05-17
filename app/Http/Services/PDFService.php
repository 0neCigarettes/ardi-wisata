<?php

namespace App\Http\Services;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFService
{

	/**
	 * @function generateTiket
	 * @param view $view
	 * @param array $data
	 * @param array $setPaper
	 * 		exam: array('format' => 'A4', 'orientation' => 'landscape'),
	 * 					array(10, -30, 353.6, 856.2)
	 */

	public static function generatePDF($view, $data, $setPaper)
	{
		// $pdf = PDF::loadView('pages.components._tiket', ['data' => $params['data']])->setPaper(array(10, -30, 253.6, $lengthPaper));
		$pdf = PDF::loadView($view, ['data' => $data])->setPaper($setPaper);
		// $pdf = PDF::loadView('admin.transaksi.struk', ['data' => $dataTransaksi])->setPaper(array(10, -30, 353.6, 856.2));
		return $pdf->stream($data['kode'] . '.pdf', array('Attachments' => false))->header('Content-Type', 'application/pdf');
		// return $data;
	}
}
