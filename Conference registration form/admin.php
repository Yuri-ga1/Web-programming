<!DOCTYPE html>
<html>
<head>
  <style>
    body{
      margin: 0px;
      padding: 0px;
    }

    html,
    body,
    .align{
       height: 100%;
    }

    .align{
      margin-left: 20%;
      margin-right: 25%;
      border-left: 2px solid plum;
      border-right: 2px solid plum;
      background-color: aliceblue;
    }

    .form{
      padding-top: 2%;
    }
  </style>
</head>
<body>
  <?php
    error_reporting(0);

		$i=0;
		$lenght = 0;						

    echo "<div class=\"align\">";
		echo "<div class=\"form\">";
    echo "<form action=\"\" method=\"post\">";
    foreach(glob('applications/*') as $file){
      echo "<p><input type=\"checkbox\" name=\"file$i\" value=\"$file\">". basename($file). "</input></p>";
      $i++;
      $lenght++;
    }
    echo "<p><button type=\"submit\">Delete</button></p></form>";

    echo "<form action=\"index.php\" method=\"post\">";
    echo "<button type=\"submit\">Back</button></form>";
    echo "</div></div>";

		$flag=false;
		for($i=0; $i<$lenght; $i++){
      if(!empty($_POST["file$i"])){
        $flag=true;
        unlink($_POST["file$i"]);
      }
    }
						
    if($flag){
			header("Refresh: 0");
    }
  ?>
</body>
</html>