<?php 

require '../db/conn.php';

    $data = $conn->query("SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>todos</title>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		<link rel="stylesheet" href="style.css">

	</head>
	<body>
        <div class="container">
		<form method="POST" class="form-inline" id="user_form">
			<div class="form-group mx-sm-3 mb-2">
				<label for="inputPassword2" class="sr-only">create</label>
				<input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
			</div>
			<input type="hidden" name="action" id="action" value="Insert" /> 
			<input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />
		</form>

		<table class="table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>Task Name</th>
		      <th>Delete</th>
		      <th>Update</th>
		    </tr>
		  </thead>
		  <tbody>
		  	 <?php while($rows = $data->fetch(PDO::FETCH_OBJ)): ?>   
		    <tr>
		   
		     <td><?php echo $rows->id; ?></td>
		     <td><?php echo $rows->name; ?></td>
		     <td><a href="delete.php?del_id=<?php echo $rows->id; ?>" class="btn btn-danger">delete</a></td>
		     <td><a href="update.php?upd_id=<?php echo $rows->id; ?>" class="btn btn-warning">update</a></td>

		    </tr>
		<?php endwhile; ?>


		  </tbody>
		</table>
	</div>

		<script type="text/javascript">
			 $('#user_form').on('submit', function(event){  
                event.preventDefault();  
                var name = $('#task').val();  
      
                if(name != '')  
                {  
                     $.ajax({  
                          url:"insert.php",  
                          method:'POST',  
                          data:new FormData(this),  
                          contentType:false,  
                          processData:false,  
                          success:function(data)  
                          {  
                               $("#action").val("Insert");  
                               $('#button_action').val("Insert");  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Field is Required");  
                }  
           });  

		</script>

	</body>
</html>