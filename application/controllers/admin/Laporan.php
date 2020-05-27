<?php
Class Laporan extends CI_Controller{
    
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->library('pdf');
		$this->load->model('M_model');
    }
    
    function index(){
	$id_pesan=$this->input->post('id_pesan');
	$total=$this->input->post('total');
	$sisatagihan=$this->input->post('sisatagihan');
	$invoice = $this->M_model->cetak($id_pesan, $total, $sisatagihan)->result();
	
	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	date_default_timezone_set('Asia/Jakarta');// change according timezone
	$currentTime = date( 'd-m-Y h:i:s A', time () );

	foreach ($invoice as $row) {
		$total=$this->input->post('total');
		$sisatagihan=$this->input->post('sisatagihan');
		$lainlain = $row->biaya_tambahan + $row->fee_marketing + $row->opr;
		$subtotal = $row->jumlah_bus * $row->tarif_sewa;
		// $kurangbayar = $subtotal - $total;

		$pdf->Cell(130,8,'Bus Pariwisata Dengan Crew Ramah',0,0,'L');
		$pdf->Cell(15,8,'Date',0,0,'L');
		$pdf->Cell(56,8,': '.date("D-d/m/Y"),0,0,'C');

		$pdf->Cell(10,5,'',0,1);
		$pdf->Cell(130,8,'',0,0,'L');
		$pdf->Cell(15,8,'Invoice',0,0,'L');
		$pdf->Cell(37,8,': '.$row->no_pesan,0,0,'C');

		$pdf->Cell(10,5,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(130,8,'Jalan Gatot Subroto No. 131',0,0,'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(15,8,'Customers',0,0,'L');
		$pdf->Cell(46,8,': '.$row->nama,0,0,'C');
		

		$pdf->Cell(10,5,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(130,8,'Cilacap, Jawa Tengah 53223',0,0,'L');
		$pdf->Cell(15,8,'',0,0,'R');
		$pdf->Cell(40,8,'',0,0,'C');

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(130 ,5,'Phone: 0282 533137',0,0,'L');

		$pdf->Cell(10,7,'',0,1);
		$pdf->setFont('Arial','B','11');
		$pdf->SetFillColor(62, 74, 148);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(100 ,5,'TAGIHAN KEPADA:',0,0,'L',TRUE);
		$pdf->Cell(59 ,5,'',0,1);//end of line
		$pdf->SetFont('Arial','',11);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(130 ,5,$row->nama,0,0);
		$pdf->Cell(59 ,5,'',0,1);//end of line
		$pdf->Cell(130 ,5,'Trip '.$row->lokasi_tujuan.' jemputan '.$row->penjemputan,0,0);
		$pdf->Cell(12,12,'',0,1); //space jaraK

		$pdf->SetFont('Arial','B',11);
		$pdf->SetFillColor(62, 74, 148);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(85,8,'KETERANGAN',0,0,'C',true);
		$pdf->Cell(20,8,'JML',0,0,'C',true);
		$pdf->Cell(30,8,'BIAYA',0,0,'C',true);
		$pdf->Cell(27,8,'',0,0,'C',true);
		$pdf->Cell(25,8,'JUMLAH',0,1,'C',true);
		$pdf->SetFont('Arial','',11);
		$pdf->SetTextColor(0,0,0);

		$pdf->Cell(85,6,$row->tgl_berangkat,0,0,'L');
		$pdf->Cell(20,6,'',0,0,'C');
		$pdf->Cell(30,6,'',0,0,'C');
		$pdf->Cell(26,6,'',0,0,'C');
		$pdf->Cell(25,6,'',0,1,'C');
		$pdf->Cell(85,6,'Ongkos sewa Bus Trip '.$row->lokasi_tujuan,0,0,'L');
		$pdf->Cell(20,6,$row->jumlah_bus.' Unit Bus',0,0,'C');
		$pdf->Cell(30,6,number_format($row->tarif_sewa,0,',','.'),0,0,'C');
		$pdf->Cell(27,6,'',0,0,'C');
		$pdf->Cell(25,6,number_format($subtotal,0,',','.'),0,1,'C'); 
		
		$pdf->Cell(12,10,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(100,5,'DP 1',0,0,'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(40,5,'',0,0,'C');
		$pdf->Cell(30,5,'----------------',0,0,'L');
		
		$pdf->Cell(12,5,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(100,5,'DP 2',0,0,'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(40,5,'',0,0,'C');
		$pdf->Cell(30,5,'',0,0,'L');

		$pdf->Cell(12,5,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(100,5,'TRANSFER VIA BANK/ATM',0,0,'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(40,5,'',0,0,'C');
		$pdf->Cell(30,5,'',0,0,'L');

		$pdf->Cell(12,5,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(100,5,'PELUNASAN',0,0,'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(40,5,'',0,0,'C');
		$pdf->Cell(30,5,'----------------',0,0,'L');

		$pdf->Cell(12,12,'',0,1);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(140,8,'Kurang Bayar',0,0,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30,8,'',0,0,'L');
		$pdf->Cell(25,8,number_format($sisatagihan,0,',','.'),0,0,'C');

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',11);
		$pdf->SetFillColor(128, 128, 128);
		$pdf->Cell(135,6,'OTHER COMMENTS',0,0,'L',TRUE);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5,5,'',0,0,'L');
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(30,5,'SUBTOTAL',0,0,'L');
		$pdf->Cell(25,5,number_format($subtotal,0,',','.'),0,0,'C',TRUE);

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(140,5,'1. Sisa pelunasan biaya penggunaan bus, bisa diserahkan kepada crew kami',0,0,'L');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30,5,'Pajak',0,0,'L');
		$pdf->Cell(25,5,'0%',0,0,'C');

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(140,5,'',0,0,'L');
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(30,5,'Jum.Pajak',0,0,'L',TRUE);
		$pdf->Cell(25,5,'0',0,0,'C');

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(140,5,'',0,0,'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(30,5,'Lain-lain',0,0,'L');
		$pdf->Cell(25,5,number_format($lainlain,0,',','.'),0,0,'C');

		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(140,5,'',0,0,'L');
		$pdf->SetFont('Arial','B',11);
		$pdf->SetFillColor(225, 232, 248);
		$pdf->Cell(30,5,'TOTAL',0,0,'L');
		$pdf->Cell(25,5,number_format($subtotal,0,',','.'),0,0,'C',TRUE);

		$pdf->Cell(10,10,'',0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(80);
		$pdf->Cell(20,10,'Jika ada pertanyaan mengenai invoice ini, silahkan hubungi',0,0,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->Cell(80);
		$pdf->Cell(20,8,'Jarot Paryogi, 0822-2119-8168, ultrabrite@gmail.com',0,0,'C');
		$pdf->Cell(10,5,'',0,1);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(175);
		$pdf->Cell(20,8,'PO. PARAMITHA',0,0,'R');
		$pdf->Cell(10,5,'',0,1);
		$pdf->SetFont('Arial','B',11);
		$pdf->Cell(80);
		$pdf->Cell(20,8,'Thank You For Your Bussines!',0,0,'C');
	}

    $pdf->Output();
	}

}
