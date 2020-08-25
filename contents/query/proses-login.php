<?php

    //session
    session_start();

    //include koneksi
    include('koneksi.php');

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
                if(!empty($_POST["check"])) {
                    setcookie ("user_login",$_POST["email_address"],time()+ (60 * 60 * 24 * 7));
                    setcookie ("userpassword",$_POST['password'],time()+ (60 * 60 * 24 * 7));
                } else {
                    if(isset($_COOKIE["user_login"])) {
                        setcookie ("user_login","");
                    }
                    if(isset($_COOKIE["userpassword"])) {
                        setcookie ("userpassword","");
                    }
                }

                //akses masuk berdasarkan rolle
                if($data['rolle'] == 'admin'){
                    $_SESSION["userId"]= $data["id_users"];
                    $_SESSION['email'] = $email_address;
                    $_SESSION['namaDepan'] = $data['nama_depan'];
                    $_SESSION['bio'] = $data['bio'];
                    $_SESSION['rolle'] = "admin";
                    
                    echo "<script>
                        window.setTimeout(function(){
                            Notiflix.Notify.Success('Login Berhasil');
                        },10);
                        window.setTimeout(function(){
                            window.location.href = 'contents';
                        },2500);
                    </script>";
                }else if($data['rolle'] == 'sales'){
                    $_SESSION["userId"]= $data["id_users"];
                    $_SESSION['email'] = $email_address;
                    $_SESSION['namaDepan'] = $data['nama_depan'];
                    $_SESSION['bio'] = $data['bio'];
                    $_SESSION['rolle'] = "sales";
                    
                    header('location:contents/dashboard/index.php?messageLogin=loginberhasil');
                }else{
                    //lempar ke login jika ada anonymous
                    echo "<script>window.location.href = 'login';</script>";
                }
            }else{
                //data tidak ditemukan
                $errorData = "Email address atau password tidak ditemukan";
            }
        }
    }
?>