<?php
$DB_SERVER = "localhost";
$DB_USERNAME= "root";
$DB_PASSWORD ="";
$DB_NAME = "baseformation";
$id = "";
$username = "";
$password= "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// connect to mysql database
try{
 $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
} catch (mysqli_sql_exception $ex) {
echo 'Error';
}
// get values from the form
function getPosts()
{
$posts = array();
$posts[0] = $_POST['id'];
$posts[1] = $_POST['username'];
$posts[2] = $_POST['password'];

return $posts;
}
// Search
if(isset($_POST['search']))
{
$data = getPosts();
$search_Query = "SELECT * FROM users WHERE id = $data[0]";
$search_Result = mysqli_query($connect, $search_Query);
if($search_Result)
{
if(mysqli_num_rows($search_Result))
{
while($row = mysqli_fetch_array($search_Result))
{
$id = $row['id'];
$fname = $row['username'];
$lname = $row['password'];
}
}else{
echo 'No Data For This Id';
}
}else{
echo 'Result Error';
}
}
// Insert
if(isset($_POST['insert']))
{
$data = getPosts();
$insert_Query = "INSERT INTO `users`(`id`,`username`, `password`) VALUES ('$data[0]','$data[1]','$data[2]')";
try{
$insert_Result = mysqli_query($connect, $insert_Query);
if($insert_Result)
{
if(mysqli_affected_rows($connect) > 0)
{
echo 'Data Inserted';
}else{
echo 'Data Not Inserted';
}
}
} catch (Exception $ex) {
echo 'Error Insert '.$ex->getMessage();
}
}
// Delete
if(isset($_POST['delete']))
{
$data = getPosts();
$delete_Query = "DELETE FROM `users` WHERE `id` = $data[0]";
try{
$delete_Result = mysqli_query($connect, $delete_Query);
if($delete_Result)
{
if(mysqli_affected_rows($connect) > 0)
{
echo 'Data Deleted';
}else{
echo 'Data Not Deleted';
}
}
} catch (Exception $ex) {
echo 'Error Delete '.$ex->getMessage();
}
}
// Edit
if(isset($_POST['update']))
{
$data = getPosts();
$update_Query = "UPDATE `users` SET `username`='$data[1]',`password`='$data[2]' WHERE `id`= $data[0]";
try{
$update_Result = mysqli_query($connect, $update_Query);
if($update_Result)
{
if(mysqli_affected_rows($connect) > 0)
{
echo 'Data Updated';
}else{
    echo 'Data Not Updated';
    }
    }
    } catch (Exception $ex) {
    echo 'Error Update '.$ex->getMessage();
    }
    }
    ?>
    <!DOCTYPE Html>
    <html>
    <head>
    <title>PHP INSERT UPDATE DELETE SEARCH</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <form action="" method="post">
    <div class="form">
    <div> 
    <input type="number" name="id" placeholder="id" value="<?php echo $id;?>"><br><br>
    </div>
    <div>
    <input type="text" name="username" placeholder="username" value="<?php echo $username;?>"><br><br>
    </div>
    <div class="form">
    <input type="text" name="password" placeholder="password" value="<?php echo $password;?>"><br><br>
    </div>
    
    <!-- Input For Add Values To Database-->
    <input type="submit" name="insert" value="Ajouter">
    </div>
    <div class="form-box" style="margin-top: 5px;">
    <!-- Input For Edit Values -->
    <input type="submit" name="update" value="Modifier">
    </div>
    <div class="form-box" style="margin-top: 5px;">
    <!-- Input For Clear Values -->
    <input type="submit" name="delete" value="Supprimer">
    </div>
    <div class="form-box" style="margin-top: 5px;">
    <!-- Input For Find Values With The given ID -->
    <input type="submit" name="search" value="chercher">
    </div>
    </div>
    </div>
    </form>
    </body>
    </html>




