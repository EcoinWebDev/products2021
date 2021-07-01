<?php include "header.php" ;
$sql ="SELECT * FROM products";
  $q = mysqli_query($connect,$sql) or die(mysqli_errno($q));
  $data = mysqli_fetch_all($q,MYSQLI_ASSOC);


?>




<div class="table-responsive">
	<table class="table table-striped">
	  <caption>List of users</caption>
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Nom</th>
	      <th scope="col">Price</th>
	       <th scope="col">photo</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php 
	  	 foreach ($data as  $value):
 ?>
	    <tr>
	      <th scope="row"><?=$value['nom'] ?></th>
	      <td><?=$value['price'] ?></td>
	      <td><img src="up/<?=$value['photo'] ?>" class="w-25" alt=""></td>
	      <td>
	      	
	<a href="edit.php?q=<?=$value['id'] ?>" class="btn btn-primary">Edit</a>
        	<a href="delete.php?d=<?=$value['id'] ?>" class="btn btn-danger">Delete</a>

	      </td>
	    </tr>
	   <?php  endforeach; ?>
	  </tbody>
	</table>
</div>
<?php include "footer.php" ?>