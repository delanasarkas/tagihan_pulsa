<?php
define('FPDF_FONTPATH','../../assets/lib/fpdf/font/');
require('../../assets/lib/fpdf/fpdf.php');

class PDF extends FPDF
{
	//Page header
	function Header()
	{
		//Logo
		$this->Image('../../assets/image/fav/masika-fav.png',10,8,20);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//pindah ke posisi ke tengah untuk membuat judul
		$this->Cell(80);
		//judul
        $this->Cell(55,15,'INVOICE TAGIHAN MASIKA RELOAD PADA TANGGAL'.date('d-m-Y'),0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(210,0,'Jl. Siliwangi No.5, Pamulang Bar., Kec. Pamulang, Kota Tangerang Selatan, Banten 15417'.date('d-m-Y'),0,0,'C');
		//pindah baris
		$this->Ln(15);
		//buat garis horisontal
        $this->SetFillColor(95, 95, 95);
		$this->Rect(10, 30, 277, 3, 'FD');
	}
 
	//Page Content
	function Content()
	{
		$this->SetFont('arial','B',10);
		$this->Cell(40,15,'Kode Invoice',1,0,'C');
		$this->Cell(40,15,'Kode Penembakan',1,0,'C');
		$this->Cell(40,15,'Nama Sales',1,0,'C');
		$this->Cell(40,15,'Nama Pelanggan',1,0,'C');
		$this->Cell(40,15,'Tanggal Tagihan',1,0,'C');
		$this->Cell(40,15,'Nominal Tagihan',1,0,'C');
        $this->Cell(37,15,'Status',1,1,'C');
        
        //session
        session_start();
        //include akses
        include('../query/hak-akses.php');

        //include koneksi
        include('../query/koneksi.php');
        //get id
        $id = $_SESSION['userId'];

        $query = mysqli_query($con,"CALL cetak_invoice_tagihan_sales('".$id."')");

        mysqli_next_result($con);
        while($data = mysqli_fetch_assoc($query)){
            $this->SetFont('arial','',8);
            $this->Cell(40,10,substr($data['id_invoice'],0,7),1,0,'C');
            $this->Cell(40,10,$data['kode_penembakan'],1,0,'C');
            $this->Cell(40,10,$data['nama_depan'].' '.$data['nama_belakang'],1,0,'C');
            $this->Cell(40,10,$data['nama_pelanggan'],1,0,'C');
            $this->Cell(40,10,date('d-m-Y',strtotime($data['tgl_penagihan'])),1,0,'C');
            $this->Cell(40,10,'Rp '.number_format( $data['total'], 0 , '' , '.' ) . ',-',1,0,'L');
            $this->Cell(37,10,$data['status_invoice'],1,1,'C');
        }
	}
 
	//Page footer
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),287,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}
 
//contoh pemanggilan class
$pdf = new PDF('L','mm','A4');
$pdf->SetTitle('Cetak Invoice');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output("invoice.pdf","I");
?>