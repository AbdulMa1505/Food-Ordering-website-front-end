<?php
require 'includes/header.php';
require 'includes/connect.php';

$stmt=$conn->prepare("SELECT * FROM tbl_admin");
$stmt->execute();
$query=$stmt->fetchAll(PDO::FETCH_ASSOC);


 ?>



    <!-- body -->
     <div class="main-menu">
        <div class="wrapper">
        <h1 class="text-center">DASHSBOARD</h1>
        <a href="add-admin.php" class="btn-primary">ADD ADMIN</a>
        
        <table class="tb-1">
         
            <th>ID</th>
            <th>FULL NAME</th>
            <th> USERNAME</th>
            <th> ACTION</th>

         
            <?php foreach($query as $result):?>
            <tr>
               <td><?php echo $result['id'];?></td>
               <td><?php echo $result['fname'];?></td>
               <td><?php echo $result['username'];?></td>
               <td>
                  <a name="update" href="update-admin.php?id=<?php echo $result['id'];?>" class="btn-primary btn-success ">EDIT</a>
                  <a name="delete" href="delete.php?id=<?php echo $result['id'];?>" class="btn-primary btn-danger">DELETE</a>
                  <a name="view " href="view.php?id=<?php echo $result['id'];?>" class="btn-primary btn-info">VIEW</a>
               </td>
            </tr>
            <?php endforeach;?>
        </table>
        </div>
     </div>
    <?php require 'includes/footer.php';?>