<?php
//if(isset($_POST['Submit'])){
$firstname=isset($_POST['firstname'])?$_post['firstname']:"";
	
	//$firstname="kerry";
echo $firstname;

///}

	//$firstname="kerry";
//echo $firstname;
?>


 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="text" name="firstname">
          <input type="submit" name="submit" value="Submit">
        </form>
	

