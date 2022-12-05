<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
 <body style="background: #6666FF;">
 <div class="card-body" align = "center">
    <form onSubmit="return validasi()" action="php/ceklogin.php" method="post" ><br><br><br><br>
        <h2 style="color: white">Login</h2>
    <div class="card-col-md-2 mt-1" style="width: 18rem; background: #5F9EA0; color: #2F4F4F; padding-top: 10px; padding-bottom: 10px ; padding-right: 10px ; padding-left: 10px">
        <img src="assets/images/logo.png" style="width: 120px;height: 150px">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"><strong>Username</strong></label>
        <input type="text" class="form-control" name="username" id="username" aria-describedby="Username" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"><strong>Password</strong></label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3 form-check">
        <a href="php/register.php"><strong class="form-check-label" for="exampleCheck1" style="color: darkblue">Don't have an account?</strong></a>
    </div><br>
    <button type="submit" class="btn btn-success" name = "submit">Submit</button> 
    <a href="index.php"><button type="button" class="btn btn-danger">Cancel</button></a>
    <br>
    </form>

</div>
<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("gmail").value;
        var password = document.getElementById("password").value;
        if(username != "" && password != ""){
            return true ;
        }else{
            alert('Username dan Password harus di isi !!');
            return false;
        }
    }
    </script>

</body>