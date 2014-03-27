#!/bin/python
import os
os.system('echo "" > dbconnect.php')
dbname = raw_input("enter database name (blank for circle)\n")
dbserver = raw_input("enter server name/address (blank for localhost)\n")
dbuser = raw_input("enter database user (blank for root)\n")
dbpassword = raw_input("enter password for database\n")
if dbname == "":
    dbname = "circle"
if dbserver == "":
    dbserver = "localhost"
if dbuser == "":
    dbuser = "root"
with open("dbconnect.php", "w") as f:
    f.write("<?php ")
    f.write("\n")
    f.write('    $dbname = "'+dbname+'";')
    f.write("\n")
    f.write('    $dbserver = "'+dbserver+'";')
    f.write("\n")
    f.write('    $dbuser = "'+dbuser+'";')
    f.write("\n")
    f.write('    $dbpassword = "'+dbpassword+'";')
    f.write("\n")
    f.write('    $connect = -1;')
    f.write("\n")
    f.write('    $connect = @mysqli_connect($dbserver, $dbuser, $dbpassword) or die("cannot connect to sql server");')
    f.write("\n")
    f.write('?>')  
