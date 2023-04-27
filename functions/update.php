<?php

   require '../db/conn.php';

   if(isset($_GET['upd_id'])) {
      
      $id = $_GET['upd_id'];

      $data = $conn->query("SELECT * FROM `tasks` WHERE id = '$id'");

      $rows = $data->fetch(PDO::FETCH_OBJ);



      if(isset($_POST["submit"])) {
   
   		$task = $_POST['mytask'];

   	    $update = $conn->prepare("UPDATE tasks SET name = :name WHERE id = '$id'");

   	    $update->execute([':name' => $task]);

          header("location: index.php");
   } 
     
   } 
    

?>

<form method="POST" class="form-inline" 
   action="update.php?upd_id=<?php echo $id; ?>" id="user_form">
   
		  <div class="form-group mx-sm-3 mb-2">
		    <label for="inputUpdate" class="sr-only">update</label>
		    <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task"
          value="<?php echo $rows->name; ?>">
		  </div>
		      <input type="submit" name="submit" id="submit"
            class="btn btn-default" value="update" />
		</form>
