<?php

    //session
    session_start();

    //include koneksi
    include('koneksi.php');

    //cek cookie
    if(isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])){
        $_SESSION["userId"]= $data["id_users"];
        $_SESSION['email'] = $email_address;
        $_SESSION['namaDepan'] = $data['nama_depan'];
        $_SESSION['namaBelakang'] = $data['nama_belakang'];
        $_SESSION['bio'] = $data['bio'];
        $_SESSION['rolle'] = "admin";

        //langsung login
        header('location:contents/dashboard/index.php');
    }

    //cek jika ada session
    if(isset($_SESSION['rolle'])){
        echo "<script>window.history.back();</script>";
    }

    //variable validasi
    $errorEmail = "";
    $validEmail = true;
    $errorPassword = "";
    $validPassword = true;
    $errorData = "";

    //submit
    if(isset($_POST['login'])){
        //inisialisasi variable
        $email_address = htmlspecialchars($_POST['email_address']);
        $password = htmlspecialchars($_POST['password']);

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
        }

        //validasi berhasil
        if($validEmail && $validPassword){
            //panggil procedur login
            $result = mysqli_query($con, "CALL login(
                '".$email_address."',
                md5('".$password."')
            )");
            
            //jumlah data
            $count = mysqli_num_rows($result);

            //cari data
            if($count > 0){
                $data = mysqli_fetch_assoc($result);

                //remember me 7 hari
                if(isset($_POST["check"])) {
                    setcookie ("user_login",hash('md5',$_POST["email_address"]),time()+ (60 * 60 * 24 * 7), '/');
                    setcookie ("user_password",hash('md5',$_POST['password']),time()+ (60 * 60 * 24 * 7), '/');
                }

                //akses masuk berdasarkan rolle
                if($data['rolle'] == 'admin'){
                    $_SESSION["userId"]= $data["id_users"];
                    $_SESSION['email'] = $email_address;
                    $_SESSION['namaDepan'] = $data['nama_depan'];
                    $_SESSION['namaBelakang'] = $data['nama_belakang'];
                    $_SESSION['bio'] = $data['bio'];
                    $_SESSION['rolle'] = "admin";
                    
                    header('location:contents/dashboard/index.php?messageLogin=loginberhasil');
                }else if($data['rolle'] == 'sales'){
                    $_SESSION["userId"]= $data["id_users"];
                    $_SESSION['email'] = $email_address;
                    $_SESSION['namaDepan'] = $data['nama_depan'];
                    $_SESSION['namaBelakang'] = $data['nama_belakang'];
                    $_SESSION['bio'] = $data['bio'];
                    $_SESSION['rolle'] = "sales";
                    
                    header('location:contents/dashboard/index.php?messageLogin=loginberhasil');
                }else{
                    //lempar ke login jika ada anonymous
                    echo "<script>window.location.href = 'login';</script>";
                }
            }else{
                //data tidak ditemukan
                $errorData = "Email address atau password tidak ditemukan/tidak aktif";
            }
        }
    }
?>