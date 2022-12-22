<?php include_once "view/header.php"; ?>


<div class="container">

    <?php //echo "<pre>"; print_r($allUsersData["Data"]); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
              <td><a href="form">Add user</a></td> 
              <td><a href="logout">Logout</a></td> 
            </tr>
            <tr>
                <td>Sr. no</td>
                <td>Username</td>
                <td>Email</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($allUsersData['Data'] as $key => $value) { ?>
               <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $value->username;?></td>
                <td><?php echo $value->email;?></td>
                <td> <a href="edituser?user_id=<?php echo $value->user_id; ?>" class="btn btn-primary"> Edit</a></td>
                <td><a href="deleteuser?user_id=<?php echo $value->user_id; ?>" class="btn btn-danger"> Delete</a></td>
               </tr>

            <?php $count++; 
            }  ?>

        </tbody>
    </table>




</div>