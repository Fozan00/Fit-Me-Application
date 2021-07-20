<html>

<head>
    <title>
        SignUp Complete
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f6d91d128.js" crossorigin="anonymous"></script>
</head>

<body>

	<?php
	
	$a = $_POST["name"];
	$b = $_POST["emial"];
	$c = $_POST["pass"];
	$d = $_POST["cnic"];
	$e = $_POST["age"];
	$f = $_POST["gender"];
	$g = $_POST["adress"];
			
		
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
  
	
			 $sql_select="insert into members values('$b','$c','$a',$e,$d,'$f','$g')";
			
			$query_id10 = oci_parse($con, $sql_select);
        	$runselect10 = oci_execute($query_id10);


	?>
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
                Select Type
            </h1>
        </div>
    </nav>
	
	<div class="signupcompleteform">
        <div class="signupcompleteheading">
            <h1>
                You want to ?
            </h1>
        </div>

        <div class="signupcompleteformdata">
			<form action="selectplan.php" method= "post">
			
			Select type :
  <select name="type" id="type" id=value>
  
	<option value="gain"> Muscle Gain </option>
	<option value="loss"> Weight Loss </option>
	<option value="both"> Both </option>


  </select>
 
 
  
<br><br><br> 
  
  
  <input type="submit" />
			
	</form>
            



        </div>
    </div>

   
</body>

</html>