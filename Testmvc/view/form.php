<?php  include_once "view/header.php";?>
<div class="card  style="width: 18rem;>
<div class="card-body">

    <table class="table table-bordered table-responsive ">
        <form method="post" class="form-control text-center" >
        <thead> 
        <h5 class="card-title text-center">Register New user</h5>

        </thead>
        <tr>
            <td><label for="name">username</label></td>
            <td> <input class="form-control" type="text" name="username"></td>
        </tr>
        <tr>
            <td> <label for="email">email</label></td>
            <td><input class="form-control" type="email" name="email"></td>

        </tr>
        <tr>
            <td> <label for="password">password</label></td>
            <td><input class="form-control" type="text" name="password"></td>

        </tr>
        <tr>
            <td> <input class="btn btn-primary" type="submit" value="Register" name="submit"></td>
        </tr>
        </form>
        <tr>
          <td> <a href="allusers">Show all Users</a></td>
        </tr>
    </table>
</div>
</div>
