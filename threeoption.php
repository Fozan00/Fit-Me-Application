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
                Choose One 
            </h1>
        </div>
    </nav>
	
	<div class="signupcompleteform">
	
        <div class="signupcompleteheading">
             <?php
			 
			
			$em = $_POST["emial"];
			$p = $_POST["pass"];
		
			
		
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
  
				
				
					$sql_select="select email,passward".
					" from members".
					" where email= '$em' and passward='$p'";
			

			$query_id30 = oci_parse($con, $sql_select);
        	$runselect30 = oci_execute($query_id30);
			
			$value=0;
			while($row30 = oci_fetch_array($query_id30, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
	
        	$value=$value+1;
			
		  } 
		  
		  if($value == 0){
			  echo "Record Not Found!!";
			  
		  }
		  else{
			  
		  }
			?>	
        </div>

        <div class="showplans" >
			<h2>What You Want</h2>
			
			<a href="../i19_0636-i19_0507-i19_0615/enterlogs.php">Enter today's Log</a>
			<br>
			<a href="../i19_0636-i19_0507-i19_0615/signupcomplete.php">Select One More Workout Plan</a>
			<br>
			<a href="../i19_0636-i19_0507-i19_0615/signinshow.html">Previw Previous Plans</a>

        </div>
	
				

        </div>
    </div>

   
</body>

</html>