<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+
$tgl = date('d-m-Y');
$hari = hari_ini();
/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Nota');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

//$header = array ('id_produk', 'id_kategori', 'nama_produk', 'harga', 'stok', 'ukuran', 'berat', 'gambar', 'deskripsi');

//$data = $pdf->LoadData();
//print_r($data);

//$pdf->ColoredTable($header, $data);
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
 
$title = <<<EOD
<h2>Nota<h2>
EOD;
        
$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 0, 0, true, 'C', true);
foreach ($pembelian as $row){
$t = '<table style="border:1px solid #000; padding:6px;">';
$t .='<tr>
        <br>&nbsp;&nbsp;Pengirim:<br><br>
        Oktias Bakery & Cake<br>
        Jl. Raya Bogor KM 43 7-8, Cibinong
        <br><hr><br>
        Nomor Nota : '.$row->id_transaksi.'
        <br></tr>';
}
$t .='</table>';

$pdf->WriteHTMLCell(0, 15, '', '',$penerima, 0, 1, 0,  'C', true);
$pdf->WriteHTMLCell(0, 0, '', '',$t, 0, 1, 0,  'C', true);
$table = '<table style="border:1px solid #000; padding:6px;">';
$table .='<tr>
        <th style="border:2px solid #000;">Nama Produk</th>
        <th style="border:2px solid #000;">Jumlah</th>
        <th style="border:2px solid #000;">Harga</th>
        <th style="border:2px solid #000;">Total</th>
         </tr>';
foreach ($pembelian as $row){
$table .='<tr>
        <td style="border:1px solid #000;">'.$row->nama_produk.'</td>
        <td style="border:1px solid #000;">'.$row->jumlah.'</td>
        <td style="border:1px solid #000;">Rp. '.number_format($row->harga,0,',','.').'</td>
        <td style="border:1px solid #000;">Rp. '.number_format($row->total_harga,0,',','.').'</td>
    </tr>';
}
$table .='</table>';
$pdf->WriteHTMLCell(0, 0, '', '',$table, 0, 1, 0, true, 'C', true);
 


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Nota', 'I');

//============================================================+
// END OF FILE
//============================================================+
