<?php

    //panggil users
    $id_users = $_GET['id_users'];
    $result = mysqli_query($con, "CALL select_users('".$id_users."')");
    mysqli_next_result($con);

    //variable validasi
    $errorNamaDepan = "";
    $validNamaDepan = true;
    $errorNamaBelakang = "";
    $validNamaBelakang = true;
    $errorEmail = "";
    $validEmail = true;
    $errorNoTlp = "";
    $validNoTlp = true;
    $errorAlamat = "";
    $validAlamat = true;
    $errorPassword = "";
    $validPassword = true;
    $errorBio = "";
    $validBio = true;

    //submit
    if(isset($_POST['update'])){
        //inisialisasi variable
        $nama_depan = htmlspecialchars(ucwords($_POST['nama_depan']));
        $nama_belakang = htmlspecialchars(ucwords($_POST['nama_belakang']));
        $email_address = htmlspecialchars($_POST['email_address']);
        $no_tlp = htmlspecialchars($_POST['no_tlp']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $password = htmlspecialchars($_POST['pass']);
        $bio = htmlspecialchars(ucwords($_POST['bio']));

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
            $errorNamaDepan = "Panjang minimal input 3 karakter dan maksimal input 15 karakter";
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
            $errorNamaBelakang = "Panjang minimal input 3 karakter dan maksimal input 15 karakter";
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

        //cek no tlp
        if(!empty($no_tlp)){
            if(strlen($no_tlp) < 11 || strlen($no_tlp) > 12){
                $errorNoTlp = "Panjang minimal input 11 karakter dan maksimal input 12 karakter";
                $validNoTlp = false; 
            }
        }
        //cek alamat
        if(!empty($alamat)){
            if(strlen($alamat) < 12){
                $errorAlamat = "Panjang minimal input 12 karakter";
                $validAlamat = false; 
            }
        }
        //cek password
        if(!empty($password)){
            if(strlen($password) != 8){
                $errorPassword = "Password tidak boleh lebih atau kurang dari 8 karakter";
                $validPassword = false;
            }else if(!$uppercase || !$lowercase || !$number || !$specialChars){
                $errorPassword = "Password harus terdiri dari huruf besar, huruf kecil, nomor serta simbol";
                $validPassword = false;
            } 
        } 

        //cek bio
        if(!empty($bio)){
            if(strlen($bio) < 10){
                $errorBio = "Panjang minimal input 10 Huruf";
                $validBio = false; 
            }
        }
        //validasi berhasil
        if($validNamaDepan && $validNamaBelakang && $validEmail && $validNoTlp && $validAlamat && $validPassword && $validBio){
        
            //panggil prosedur cek email
            $cekData = mysqli_query($con,"CALL cek_email(
                '".$email_address."'
            )");
            $count = mysqli_num_rows($cekData);

            //cek email di db
            if($count > 1 ){
                $errorEmail = "Email sudah ada, silahkan gunakan data lain";
                $validEmail = false;
            }else{ 
                mysqli_next_result($con);  

                //jika password kosong
                if($password == ""){
                    $result2 = mysqli_query($con, "CALL update_user_no_pass(
                        '".$nama_depan."',
                        '".$nama_belakang."',
                        '".$email_address."',
                        '".$no_tlp."',
                        '".$alamat."',
                        '".$bio."',
                        '".$id_users."'
                    )");
                } else {
                    //panggil prosedur registrasi
                    $result2 = mysqli_query($con,"CALL update_user_with_pass(
                        '".$nama_depan."',
                        '".$nama_belakang."',
                        '".$email_address."',
                        '".$no_tlp."',
                        '".$alamat."',
                        md5('".$password."'),
                        '".$bio."',
                        '".$id_users."'
                    )");
                }

                //ubah session
                $_SESSION['email'] = $email_address;
                $_SESSION['namaDepan'] = $nama_depan;
                $_SESSION['bio'] = $bio;

                //pindah ke halaman login
                header("location:profil?id_users=$id_users&messageUpdateProfil=updateberhasil");
                exit;
            }
        }
    }

?>