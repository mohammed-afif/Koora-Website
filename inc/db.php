<?php

 $servername = "localhost";
 $dbUsername = "root";
 $dbpwd = "";
 $dbname = "phpproject";

 $conn = mysqli_connect($servername, $dbUsername, $dbpwd, $dbname);

 if (!$conn) {
   die("Connection failed: ". mysqli_connect_error());
 }
