<?php 
session_start();
    include 'config/koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_karyawan WHERE username = '$username'";
    $query = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($query);
    $verf = mysqli_num_rows($query);

    if ($verf > 0) {
        
        $hahed_password = $data['password'];

        if (password_verify($password,$hahed_password)) {
            
            if ($data['level'] == 1) {
                
                $_SESSION['status'] = 'Gudang';
                $_SESSION['login_gudang'] = true;
                header('location: gudang/');

            }elseif ($data['level'] == 2) {
                
                $_SESSION['status'] = 'Kasir';
                $_SESSION['nama'] = $data['nama_karyawan'];
                $_SESSION['login_kasir'] = true;
                header('location: kasir/');

            }else{

                $_SESSION['status'] = 'Manajer';
                $_SESSION['login_manajer'] = true;
                header('location: manajer/');

            }

        }else{

            echo    "<script type=text/Javascript> alert('Password Salah!')
                    window.location = 'index.php';
                </script>";

        }

    }else{

        echo    "<script type=text/Javascript> alert('Username Salah!')
                    window.location = 'index.php';
                </script>";

    }

?>