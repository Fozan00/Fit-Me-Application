<html>

<head>
    <title>
        Enter Logs
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
               Enter Logs
            </h1>
        </div>
    </nav>
	
	<div class="signupcompleteform">
	
        <div class="signupcompleteheading">
            
			 <form action="enterlogs.php" method= "post">
				<h3>Weigth Gain(In kg's) </h3>
                <input type="text" id="email" name="gain" placeholder="Email gains in Kg" size="40">
				<br>
				<br>
				<h3>Weigth Loss(In kg's) </h3>
				<input type="text" id="pass" name="loss" placeholder="Email loss in Kg" size="40">
				<br>
				<br>
				<h3>Current BMI </h3>
				<input type="text" id="bmi" name="bmi" placeholder="Enter Current BMI:" size="40">
				<br>
				<br>
				<h3>Log Date </h3>
				<input type="text" id="cnic" name="log_date" placeholder="Enter Date" size="40">
				<br>
				<br>
				<h3>Duration of workout </h3>
				<input type="text" id="age" name="duration" placeholder="enter duration" size="40">
				<br>
				<br>
				<h3>Email</h3>
				<input type="text" id="gender" name="email" placeholder="Enter Email " size="40">
				<br>
				<br>
				<input type="submit" name ="sub" id = "sub" value = "Save Logs" />
            </form>
        </div>

       
	
				

        </div>
    </div>

   <?php


	if(isset($_POST["sub"]))
	{
			
			$b = $_POST['gain'];
			$c = $_POST['loss'];
			$n = $_POST['bmi'];
			$d = $_POST['log_date'];
			$e = $_POST['duration'];
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
		 
		  
		 
			  
			$q = " insert into logs(gain,loss,bmi,log_date,duration,email) values($b,$c,$n,'$d','$e','$f')";
			$q_id = oci_parse($con,$q);
			$r = oci_execute($q_id);
			
			echo "Data Inserted in Logs";
	}	 
?>
</body>

</html>