<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <title>Buat Akun</title>
        <!-- Customized Bootstrap Stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="../css/style.css" rel="stylesheet">
</head>

<body style="background: #6666FF;">
<div class="card-body" align = "center">
<div class="card-col-md-2 mt-1" style="width: 18rem; background: #5F9EA0; color: #2F4F4F; padding-top: 10px; padding-bottom: 10px ; padding-right: 10px ; padding-left: 10px">
    <section class="container">
        <header class="header">
            <figure>
            <img src="../assets/images/logo.png" style="width: 120px;height: 150px">
            </figure>
            <div class="header-title">
                <p>MENJUNJUNG TINGGI KUALITAS</p>
            </div>
        </header>
        <main class="main">
            <h2>Buat Akun</h2>
            <form id="form-login" action="cekregister.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" aria-describedby="Username" ></div>

            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" aria-describedby="Username" ></div>

            <div class="mb-3">
                <input type="text" class="form-control" name="password" id="password" placeholder="Password"  aria-describedby="Username" ></div>

                <div class="submit-button input-field">
                    <button type="submit" name="register" id="login-button" class="btn btn-success">Daftar</button>
                </div>
                <div class="sign-up-link input-field">
                    <span> Sudah punya akun?</span><a href="../index.php" class="btn btn-danger">Masuk</a>
                </div>
            </form>
        </main>
    </section>

</body>

</html>