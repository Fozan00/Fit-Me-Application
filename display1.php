<html>

<head>
    <title>
        Workouts/Nutritions/Targets
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7f6d91d128.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="navbar2">
            <div id="logo2">
                <h1>FitMe</h1>
            </div>
            <div id="bars2">
               <a href="../i19_0636-i19_0507-i19_0615/index.html">Home</a>
				<a href="../i19_0636-i19_0507-i19_0615/signin.html">SignIn</a>
                <a href="../i19_0636-i19_0507-i19_0615/signup.html">SignUp</a>
                <a href="../i19_0636-i19_0507-i19_0615/contact.html">Contact</a>
				<a href="../i19_0636-i19_0507-i19_0615/about.html">About</a>
				<a href="../i19_0636-i19_0507-i19_0615/enterlogs.php">Enter Logs</a>
				<a href="../i19_0636-i19_0507-i19_0615/newplan.html">New Plan</a>
				<a href="../i19_0636-i19_0507-i19_0615/displaylogs.php">Display Logs</a>
            </div>


        </div>
        <div id="abttext2">
            <h1>
                See Your Plans/ Nutrition / Workout 
            </h1>
			 <?php
			
			$em = $_POST["emial"];
			$igot = $_POST["pass"];
		
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
		
			$sql_select="select plan_id from member_plan where email='$em'";
			

			$query_id15 = oci_parse($con, $sql_select);
        	$runselect15 = oci_execute($query_id15);
			
			$size=0;
			while($row0 = oci_fetch_array($query_id15, OCI_BOTH+OCI_RETURN_NULLS)) 
			{
			$size=$size+1;
			} 
			
			$some_data=0;
			$planarrayid = array_fill(0, $size, $some_data);
			
			
			$sql_select="select plan_id from member_plan where email='$em'";
			$query_id155 = oci_parse($con, $sql_select);
        	$runselect155 = oci_execute($query_id155);
			
			$y=0;
			while($row155 = oci_fetch_array($query_id155, OCI_BOTH+OCI_RETURN_NULLS)) 
			{
				
			$planarrayid[$y] =$row155["PLAN_ID"];
			$y=$y+1;
			} 
			
			$outerloop=0;
			
			while($outerloop< $size){
				
			
			$sql_select="select description from plans where plan_id=$planarrayid[$outerloop]";
			

			$query_id156 = oci_parse($con, $sql_select);
        	$runselect156 = oci_execute($query_id156);
			
		
			echo "<h1>Plan Name: </h1>";
			while($row156 = oci_fetch_array($query_id156, OCI_BOTH+OCI_RETURN_NULLS)) 
			{
			echo "  ".$row156["DESCRIPTION"];
			} 
			
		
			

			
			$sql_select="select target_id,description,week_no".
			" from targets".
			" where plan_id = $planarrayid[$outerloop] ";
			

			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
			
			echo "<h1>Targets</h1>";
			$x = 1;
			while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			echo "<br>Target Number :";
        	echo "  $x" ;
			echo "<br> Description :"; 
			echo "  ".$row["DESCRIPTION"];
			echo "<br> Week No :";
			echo "  ".$row["WEEK_NO"];
			$x = $x +1;
			echo"<br><br>";
		  } 
		  
		  
		  $sql_select1="select nut_id,description,week_no".
			" from nutritions".
			" where plan_id = $planarrayid[$outerloop] ";
			

			$query_id4 = oci_parse($con, $sql_select1);
        	$runselect1 = oci_execute($query_id4);
			echo "<h1>Diet</h1>";
			$x = 1;
			while($row1 = oci_fetch_array($query_id4, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
			echo "<br>Nutrition Type :";
        	echo "  $x" ;
			echo "<br> Description :"; 
			echo "  ".$row1["DESCRIPTION"];
			echo "<br> Week No :";
			echo "  ".$row1["WEEK_NO"];
			$x = $x +1;
			echo"<br><br>";
			
		  } 
		  
		  $sql_select2="select work_id,name,targetmucle,sets".
			" from workouts".
			" where plan_id = $planarrayid[$outerloop] ";
			

			$query_id5 = oci_parse($con, $sql_select2);
        	$runselect2 = oci_execute($query_id5);
			
			echo "<h1>Workouts</h1>";
			$x = 1;
			
			
			$size_of_the_array=0;
			while($row2 = oci_fetch_array($query_id5, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  { 
			echo "<br>Workout Type :";
        	echo "  $x" ;
			echo "<br> Name :"; 
			echo "  ".$row2["NAME"];
			echo "<br> Target Muscle :";
			echo "  ".$row2["TARGETMUCLE"];
			echo "<br> Sets :";
			echo "  ".$row2["SETS"];
			$x = $x +1;
			echo"<br><br>";
			$size_of_the_array=$size_of_the_array+1;
		  } 
		  
		 $some_data=0;
		 $my_array = array_fill(0, $size_of_the_array, $some_data);
		  
		  $sql_select3="select work_id,name,targetmucle,sets".
			" from workouts".
			" where plan_id = $planarrayid[$outerloop] ";
			

			$query_id6 = oci_parse($con, $sql_select3);
        	$runselect3 = oci_execute($query_id6);
			
			$x = 0;
			
			echo "<h1>EQUIPMENTS USED AGAINT WORKOUT</h1>";
			
			while($row3 = oci_fetch_array($query_id6, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  { 
			
			 $array[$x] =$row3["WORK_ID"];
			 $x=$x+1;
		
		  } 
		  
		 $i=0;
		
		 
		 while($i< $size_of_the_array){
			
			$sql_select2="select e.equip_id,e.ename,w.name,w.targetmucle".
			" from equipments e join workouts w on e.work_id = w.work_id".
			" where e.work_id = $array[$i] ";
			
			$i=$i+1;
			
			$query_id7 = oci_parse($con, $sql_select2);
        	$runselect4 = oci_execute($query_id7);
			
		
	
			
			while($row4 = oci_fetch_array($query_id7, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  { 
			echo "<br> ".$row4["ENAME"];
			echo "  ".$row4["NAME"];
		  } 
			 
		 }
		 if($size_of_the_array==0){
				echo "NO EXERCISE FOUND ";
			}
			
		 echo "<h1>CARDIO USED AGAINT WORKOUT</h1>";
		 $i=0;
		 while($i< $size_of_the_array){
			
			$sql_select2="select c.cardio_id,c.cname,w.name,w.targetmucle".
			" from cardio c join workouts w on c.work_id = w.work_id".
			" where c.work_id = $array[$i] ";
			
			$i=$i+1;
			
			$query_id8 = oci_parse($con, $sql_select2);
        	$runselect5 = oci_execute($query_id8);
			
	
			
			while($row5 = oci_fetch_array($query_id8, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  { 
			echo "<br> ".$row5["CNAME"];
			echo "  ".$row5["NAME"];
		  } 
		 }
		 $outerloop=$outerloop+1;
		}
		 
			?>
        </div>
    </nav>
</body>

</html>