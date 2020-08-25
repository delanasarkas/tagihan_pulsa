<?php
    
    //include koneksi
    include('koneksi.php');

    //variable validasi
    $errorNamaDepan = "";
    $validNamaDepan = true;
    $errorNamaBelakang = "";
    $validNamaBelakang = true;
    $errorEmail = "";
    $validEmail = true;
    $errorPassword = "";
    $validPassword = true;
    $errorConfirmPassword = "";
    $validConfirmPassword = true;
    $errorKodeRegistrasi = "";
    $validKodeRegistrasi = true;
    $errorData = "";

    //submit
    if(isset($_POST['register'])){
        //inisialisasi variable
        $nama_depan = htmlspecialchars(ucwords($_POST['nama_depan']));
        $nama_belakang = htmlspecialchars(ucwords($_POST['nama_belakang']));
        $email_address = htmlspecialchars($_POST['email_address']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $kode_registrasi = htmlspecialchars($_POST['kode_registrasi']);
        $rolle = "sales";
        $stat = "aktif";

        //validasi kekuatan password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        //cek nama depan
        if(empty($nama_depan)){
            $errorNamaDepan = "Nama depan tidak boleh kosong";
            $validNamaDepan = false;
        }else if(!preg_match('/^[a-zA-Z]*$/',$nama_depan)){
            $errorNamaDepan = "Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi";
            $validNamaDepan = false;
        }else if(strlen($nama_depan) < 3 || strlen($nama_depan) > 15){
            $errorNamaDepan = "Panjang minimal input 3 huruf dan maksimal input 15 karakter";
            $validNamaDepan = false;
        }

        //cek nama belakang
        if(empty($nama_belakang)){
            $errorNamaBelakang = "Nama belakang tidak boleh kosong";
            $validNamaBelakang = false;
        }else if(!preg_match('/^[a-zA-Z]*$/',$nama_belakang)){
            $errorNamaBelakang = "Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi";
            $validNamaBelakang = false;
        }else if(strlen($nama_belakang) < 3 || strlen($nama_belakang) > 15){
            $errorNamaBelakang = "Panjang minimal input 3 huruf dan maksimal input 15 karakter";
            $validNamaBelakang = false;
        }

        //cek email
        if(empty($email_address)){
            $errorEmail = "Email tidak boleh kosong";
            $validEmail = false;
        }else if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
            $errorEmail = "Format yang dimasukan harus email";
            $validEmail = false;
        }

        //cek password
        if(empty($password)){
            $errorPassword = "Password tidak boleh kosong";
            $validPassword = false;
        }else if(strlen($password) != 8){
            $errorPassword = "Password tidak boleh lebih atau kurang dari 8 karakter";
            $validPassword = false;
        }else if(!$uppercase || !$lowercase || !$number || !$specialChars){
            $errorPassword = "Password harus terdiri dari huruf besar, huruf kecil, nomor serta simbol";
            $validPassword = false;
        }  

        //cek password harus match dengan confirm password
        if(empty($confirm_password)){
            $errorConfirmPassword = "Konfirmasi password tidak boleh kosong";
            $validConfirmPassword = false;
        }else if($confirm_password != $password){
            $errorConfirmPassword = "Konfirmasi password tidak match";
            $validConfirmPassword = false;
        }

        //cek password harus match dengan confirm password
        if(empty($kode_registrasi)){
            $errorKodeRegistrasi = "Kode registrasi tidak boleh kosong";
            $validKodeRegistrasi = false;
        }else if($kode_registrasi != "M@siKaR3load"){
            $errorKodeRegistrasi = "Kode registrasi salah";
            $validKodeRegistrasi = false;
        }

        //validasi berhasil
        if($validNamaDepan && $validNamaBelakang && $validEmail && $validPassword && $validConfirmPassword && $validKodeRegistrasi){
            $cekData = mysqli_query($con,"CALL cek_email(
                '".$email_address."'
            )");
            $count = mysqli_num_rows($cekData);
            if($count > 0 ){
                $errorEmail = "Email sudah ada, silahkan gunakan data lain";
                $validEmail = false;
            }else{
                //panggil prosedur registrasi
                $result = mysqli_query($con,"CALL registrasi(
                    '".$nama_depan."', 
                    '".$nama_belakang."', 
                    '".$email_address."', 
                    '".$rolle."', 
                    md5('".$password."'),
                    '".$stat."'
                )");

                //pindah ke halaman login
                header('location:index.php?halaman=login&messageRegistrasi=registrasiberhasil');
                exit();
            }
        }
    }

?>