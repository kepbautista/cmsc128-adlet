<!DOCTYPE html>
<html>
<head>
  
  <?php
	$string = "Kayla Marie/B/Serioso";
	
			$firstname = strtok($string,"/");
			$middleinit = strtok("/");
			$lastname = strtok("/");
			
			if(($firstname==false) || ($middleinit==false) || ($lastname==false)) echo "error";
			else echo "Hi ".$firstname." ".$middleinit.". ".$lastname;
  ?>

</body>
</html>