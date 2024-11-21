<?php
ob_start(); 
session_start();
if (isset($_SESSION['uid'])) {
    header('location:admin/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Tambahkan link CSS Bootstrap untuk tata letak responsif -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tambahkan link Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style type="text/css">
        /* CSS yang sudah Anda tulis */
        .form-container {
            background: linear-gradient(150deg, #1B394D 33%, #2D9DA7 34%, #2D9DA7 66%, #EC5F20 67%);
            font-family: 'Raleway', sans-serif;
            text-align: center;
            padding: 30px 20px 50px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .form-container .title {
            color: #fff;
            font-size: 23px;
            text-transform: capitalize;
            letter-spacing: 1px;
            margin: 0 0 60px;
        }
        .form-container .form-horizontal {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }
        .form-horizontal .form-icon {
            color: #fff;
            background-color: #1B394D;
            font-size: 75px;
            line-height: 92px;
            height: 90px;
            width: 90px;
            margin: -65px auto 10px;
            border-radius: 50%;
        }
        .form-horizontal .form-group {
            margin: 0 0 10px;
            position: relative;
        }
        .form-horizontal .form-group .input-icon {
            color: #e7e7e7;
            font-size: 23px;
            position: absolute;
            left: 0;
            top: 10px;
        }
        .form-horizontal .form-control {
            color: #000;
            font-size: 16px;
            font-weight: 600;
            height: 50px;
            padding: 10px 10px 10px 40px;
            margin: 0 0 5px;
            border: none;
            border-bottom: 2px solid #e7e7e7;
            border-radius: 0px;
            box-shadow: none;
        }
        .form-horizontal .form-control:focus {
            box-shadow: none;
            border-bottom-color: #EC5F20;
        }
        .form-horizontal .forgot {
            font-size: 13px;
            font-weight: 600;
            text-align: right;
            display: block;
        }
        .form-horizontal .forgot a {
            color: #777;
            transition: all 0.3s ease 0s;
        }
        .form-horizontal .forgot a:hover {
            color: #777;
            text-decoration: underline;
        }
        .form-horizontal .signin {
            color: #fff;
            background-color: #EC5F20;
            font-size: 17px;
            text-transform: capitalize;
            letter-spacing: 2px;
            width: 100%;
            padding: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            transition: all 0.4s ease 0s;
        }

        /* Menambahkan beberapa margin agar tampilan tidak terlalu menempel */
        .form-bg {
            background-color: #f7f7f7;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

    <!-- Form Container -->
    <div class="form-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-container">
                        <h3 class="title">My Account</h3>
                        <form action="" method="POST" class="form-horizontal">
                            <div class="form-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fas fa-user"></i></span>
                                <input type="username" class="form-control" placeholder="Username" id="user" name="user" required>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" id="pass" name="pass" required>
                                <span class="forgot"><a href="lupa.php">Forgot Password?</a></span>
                            </div>
                            <button type="submit" class="btn signin" id="submit" name="submit">Login</button>
                        </form>
<?php 

    //cek jika ytombol ditekan
    if(isset($_POST['submit'])){

        include 'database.php';

        $query_select = 'SELECT * FROM users
        WHERE username = "'.$_POST['user'].'" 
        AND password = "'.md5($_POST['pass']).'" ';

        $run_query_select = mysqli_query($connn, $query_select);
        $d = mysqli_fetch_object($run_query_select);
     
        if($d){
           //buat sesionnnn
            $_SESSION['uid']     = $d->iduser;
            $_SESSION['uname']   = $d->namalengkap;

             header('location:admin/index.php');           


        }else{
            echo 'Username dan Password salah';
        }

    }
ob_end_flush();
?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script js untuk Bootstrap dan Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
