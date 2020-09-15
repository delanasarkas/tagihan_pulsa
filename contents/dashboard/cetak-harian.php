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
        $this->Cell(90,15,'REPORT PENGHASILAN HARIAN MASIKA RELOAD PADA TANGGAL'.date('d-m-Y'),0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(191,0,'Jl. Siliwangi No.5, Pamulang Bar., Kec. Pamulang, Kota Tangerang Selatan, Banten 15417',0,0,'C');
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
		$this->Cell(40,15,'Tanggal Setoran',1,0,'C');
		$this->Cell(76.7,15,'Jumlah Setoran',1,1,'C');
        
        //session
        session_start();
        //include akses
        include('../query/hak-akses.php');

        //include koneksi
        include('../query/koneksi.php');
        //get id
        $id = $_SESSION['userId'];
		$rolle = $_SESSION['rolle'];

		if($rolle == 'admin'){
			$query = mysqli_query($con,"SELECT a.jumlah_setoran, a.tgl_setoran,
            b.nama_depan,b.nama_belakang,
            c.nama_pelanggan,c.limits,
            d.kode_penembakan,
            e.id_invoice
            FROM setoran_sales a, users b, data_pelanggan c, transaksi_penembakan d, invoice_tagihan e
            WHERE a.id_users = b.id_users
            AND a.id_pelanggan = c.id_pelanggan
            AND a.id_transaksi = d.id_transaksi
            AND a.id_invoice = e.id_invoice
            AND keterangan = 'diterima' 
            AND a.tgl_setoran = CURDATE()");
		}

        mysqli_next_result($con);
        $total = 0;
        while($data = mysqli_fetch_assoc($query)){
            $this->SetFont('arial','',8);
            $this->Cell(40,10,substr($data['id_invoice'],0,7),1,0,'C');
            $this->Cell(40,10,$data['kode_penembakan'],1,0,'C');
            $this->Cell(40,10,$data['nama_depan'].' '.$data['nama_belakang'],1,0,'C');
            $this->Cell(40,10,$data['nama_pelanggan'],1,0,'C');
            $this->Cell(40,10,date('d-m-Y',strtotime($data['tgl_setoran'])),1,0,'C');
            $this->Cell(76.7,10,'Rp '.number_format( $data['jumlah_setoran'], 0 , '' , '.' ) . ',-',1,1,'L');
            $total += $data['jumlah_setoran'];
        }
        $this->SetFont('arial','B',20);
        $this->Cell(200,10,'TOTAL',1,0,'C');
        $this->Cell(76.7,10,'Rp '.number_format( $total, 0 , '' , '.' ) . ',-',1,0,'C');
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
$pdf->SetTitle('Report Harian');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$pdf->Output("reportharian_".date('d-m-Y').".pdf","I");
?>