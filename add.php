<?php include "header.php" ?>


  	<?php 
// Upload Photo
  	$myExts = ["png","jpg","jpeg","svg"];
  $upload = 'up';
  if (!empty($_FILES)) {

  	$name = $_FILES['photo']['name'];
  $exts = @end(explode('.',$name));
  if (in_array( $exts,$myExts)) {
  	$myphoto = time().'.'.$exts;

$is_Up = move_uploaded_file($_FILES['photo']['tmp_name'],$upload.DIRECTORY_SEPARATOR.$myphoto);
  }else
  echo "Not Allowed";

  }
   

// Store in data base


$nom = (isset($_POST['nom']))?$_POST['nom']:NULL;
$price = (isset($_POST['price']))?$_POST['price']:NULL;
$send = (isset($_POST['send']))?$_POST['send']:NULL;
if ($send=='ok') {
	$sql = "INSERT INTO `products`(`id`,`nom`,`price`,`photo`) 
			VALUES (NULL,'$nom','$price','$myphoto')";
  $q = mysqli_query($connect,$sql) or die("Error ...");

  if ($q) {
  	header("Location:list.php");
  }
}


  
  	 ?>



<div class="row">
  <div class="col">
  <form action="" method="post"  enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-9">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
      </div>

           <div class="form-group col-md-9">
        <label for="nom">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="price">
      </div>

    <div class="form-group col-md-9">
        <label for="nom">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" placeholder="photo">
      </div>
<input type="hidden" name="send" value="ok">
   <div class="form-group col-md-9">
	<button type="submit" class="btn btn-primary btn-lg">Add Product</button>

   </div>
  </form>

 </div>
</div>
<?php include "footer.php" ?>