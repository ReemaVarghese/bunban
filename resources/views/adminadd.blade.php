<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/addadmin" method="post">
    {{ csrf_field()}}
    <table class="table table-borderless">
    
    <tr>
        <td>Name</td>
        <td><input type="text" class="form-control" name="name" >
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" class="form-control" name="email"  >
        </td>
    </tr>
        <td>Password</td>
        <td><input type="password" class="form-control" name="password" >
        
        </td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-success">ADD</button></td>
    </tr></table>
    
    
    
    </form>  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>