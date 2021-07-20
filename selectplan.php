<html>

<head>
    <title>
        Workouts
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f6d91d128.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="navbar3">
            <div id="logo3">
                <h1>FitMe</h1>
            </div>
            <div id="bars3">
                <a href="../i19_0636-i19_0507-i19_0615/index.html">Home</a>
				<a href="../i19_0636-i19_0507-i19_0615/signin.html">SignIn</a>
                <a href="../i19_0636-i19_0507-i19_0615/signup.html">SignUp</a>
                <a href="../i19_0636-i19_0507-i19_0615/contact.html">Contact</a>
				<a href="../i19_0636-i19_0507-i19_0615/about.html">About</a>
            </div>


        </div>
        <div id="abttext3">
            <h1>
                Select Desired Plan
            </h1>
        </div>
    </nav>
	
	<div class="signupcompleteform">
	
        <div class="signupcompleteheading">
             <?php
			 
			
			$mjob = $_POST["type"];

			
			
			$db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-8OB6NQ0)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = bilal)
    )
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "12345";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
  
				
				if($mjob != 'both'){
					 $sql_select="select plan_id,description,duration".
					" from plans".
					" where type='$mjob' ";
				}
				else{
					$sql_select="select plan_id,description,duration".
					" from plans";
				}

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
			
			
			while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
	
        	echo "<br>".$row["PLAN_ID"];
			echo " ".$row["DESCRIPTION"];
			echo " ".$row["DURATION"];
			
		  } 
			?>	
        </div>

        <div class="showplans" >
			<h2> LIKE OUR PLANS? CHOOSE ONE!</h2>
			
			<form action="display.php" method="post">
			Enter Plan Number: <input type="plan" name="plan"><br>
			
			Enter Email: <input type="text" id="name" name="mail" placeholder="Email here" size="40" >
			<br>	
			<input type="submit">
			</form>

        </div>
	
				

        </div>
    </div>

   
</body>

</html>