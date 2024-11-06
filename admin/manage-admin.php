<?php
require 'includes/header.php';
require 'includes/connect.php';
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

         <?php $stmt=$conn("SELECT * FROM tbl_admin")?>
         
            <tr>
               <td>1</td>
               <td>Abdul Malik</td>
               <td>abdul1505</td>
               <td>
                  <a href="edit.php" class="btn-primary btn-success">EDIT</a>
                  <a href="delete.php" class="btn-primary btn-danger">DELETE</a>
                  <a href="view.php" class="btn-primary btn-info">VIEW</a>
               </td>
            </tr>
            <tr>
               <td>1</td>
               <td>Abdul Malik</td>
               <td>abdul1505</td>
               <td>
               <button class="btn-primary btn-success">EDIT</button>
                  <button class="btn-primary btn-danger">DELETE</button>
                  <button class="btn-primary btn-info">VIEW</button>
               </td>
            </tr>
            <tr>
               <td>1</td>
               <td>Abdul Malik</td>
               <td>abdul1505</td>
               <td>
               <button class="btn-primary btn-success">EDIT</button>
                  <button class="btn-primary btn-danger">DELETE</button>
                  <button class="btn-primary btn-info">VIEW</button>
               </td>
            </tr>
            <tr>
               <td>1</td>
               <td>Abdul Malik</td>
               <td>abdul1505</td>
               <td>
               <button class="btn-primary btn-success">EDIT</button>
                  <button class="btn-primary btn-danger">DELETE</button>
                  <button class="btn-primary btn-info">VIEW</button>
               </td>
            </tr>
            <tr>
               <td>1</td>
               <td>Abdul Malik</td>
               <td>abdul1505</td>
               <td>
                  <button class="btn-primary btn-success">EDIT</button>
                  <button class="btn-primary btn-danger">DELETE</button>
                  <button class="btn-primary btn-info">VIEW</button>
               </td>
            </tr>
         
        </table>
        </div>
     </div>
    <?php require 'includes/footer.php';?>