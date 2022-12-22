<?php  include_once "view/header.php";?>
<div class="card  style="width: 18rem;>
<div class="card-body">

    <table class="table table-bordered table-responsive ">
        <form method="post" class="form-control text-center" >
        <thead> 
        <h5 class="card-title text-center">Edit user</h5>

        </thead>
        <tr>
            <td><label for="name">username</label></td>
            <td> <input class="form-control" type="text" name="username" value="<?php echo $allUsersData['Data'][0]->username ;?>"></td>
        </tr>
        <tr>
            <td> <label for="email">email</label></td>
            <td><input class="form-control" type="email" name="email" value="<?php echo $allUsersData['Data'][0]->email ;?>"></td>

        </tr>
        <tr>
            <td> <input class="btn btn-primary" type="submit" value="update" name="update"></td>
        </tr>
        </form>
        <tr>
          <td> <a href="allusers">Show all Users</a></td>
        </tr>
    </table>
</div>
</div>
