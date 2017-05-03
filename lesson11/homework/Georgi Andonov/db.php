<?php

$GLOBALS["db_link"] = mysqli_connect("localhost", "root", "", "homework");


if (mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}