<html>

<head>
    <title>
        Displaying Logs
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
				<a href="../i19_0636-i19_0507-i19_0615/newplan.html">New Plan</a>
				<a href="../i19_0636-i19_0507-i19_0615/displaylogs.php">Display Logs</a>
            </div>


        </div>
        <div id="abttext3">
            <h1>
              Displaying Logs
            </h1>
        </div>
    </nav>
	
	<div class="signupcompleteform">
	
        <div class="signupcompleteheading">
            
			 <form action="displaylogs.php" method= "post">
				
				<h3>Confirm your email</h3>
				<input type="text" id="email" name="email" placeholder="Enter Email " size="40">
				<br>
				<br>
				<input type="submit" name ="sub" id = "sub" value = "Display Logs" />
            </form>
        </div>

       
	
				

        </div>
    </div>

 <div id="abttext2">
   <?php


	if(isset($_POST["sub"]))
	{
		
			$f = $_POST['email'];
		



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
		 
		  
		 
			  
			$q = " select * from logs where email='$f'";
			$q_id = oci_parse($con,$q);
			$r = oci_execute($q_id);
			
			$x=1;
			while($row156 = oci_fetch_array($q_id, OCI_BOTH+OCI_RETURN_NULLS)) 
			{
			echo"<h3><br><br>Next Log:<br><br><h3>";
			
			echo "Log Number: ";
			echo $x;
			echo "<br>";
			echo "Gain :".$row156["GAIN"];
			echo "<br>";
			echo "Loss : ".$row156["LOSS"];
			echo "<br>";
			echo "Date: ".$row156["LOG_DATE"];
			echo "<br>";
			echo "Duration: ".$row156["DURATION"];
			echo "<br>";
			
			$x=$x+1;
		
			} 
			
	}	 
?>
</div>
</body>

</html>