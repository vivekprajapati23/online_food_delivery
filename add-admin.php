<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    if(isset($_POST['submit'])) {

        //1.get data from form
        echo $full_name = $_POST['full_name'];
        echo $username = $_POST['username'];
        echo $password = md5($_POST['password']);//password Encryption with md5

        //2.SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
    
        //3.Excute query and saving data into database
        $res=mysqli_query($conn,$sql) or die(mysqli_error());
        
        //4.Check whether record inserted successfully or not
        if($res==true){
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
        
    
    }
?>
