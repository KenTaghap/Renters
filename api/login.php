<?php
require 'vendor/autoload.php';

rror_reporting(E_ERROR | E_PARSE);

use MongoDB\Client;

// MongoDB Atlas connection
$uri = "mongodb+srv://empirorgodz:5s5gFYrpblgsiHz5@cluster0caps.acf3erq.mongodb.net/"; // Replace with your MongoDB Atlas URI
$databaseName = "ABMS"; // Replace with your database name

// MongoDB Atlas connection
$client = new Client($uri);

// Select your database and collection
$db = $client->selectDatabase($databaseName);
$collection = $db->selectCollection('RENTERS');

// Retrieve the submitted username and password
$username = $_POST['user'];
$password = $_POST['pass'];

// Query the database to check if the user exists and the password is correct
$user = $collection->findOne(['username' => $username, 'password' => $password]);

if ($user) {
    // User is authenticated
    echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <title>Blue Background Page</title>
              <style>
                body {
                  background-color: #0077b6; /* Set the background color to blue */
                  color: white; /* Set text color to white for better visibility */
                  font-family: Arial, sans-serif; /* Set font for better readability */
                  margin: 0; /* Remove default margin */
                  padding: 20px; /* Add some padding for content */
                }
              </style>
            </head>
            <body>
            <center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <h1> Login successful! </h1>
            <button><a href="../api/index.php">Proceed</a></button>
            </center>
            </body>
            </html>
            ';
} else {
    // Invalid login
    echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <title>Blue Background Page</title>
              <style>
                body {
                  background-color: #0077b6; /* Set the background color to blue */
                  color: white; /* Set text color to white for better visibility */
                  font-family: Arial, sans-serif; /* Set font for better readability */
                  margin: 0; /* Remove default margin */
                  padding: 20px; /* Add some padding for content */
                }
              </style>
            </head>
            <body>
            <center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <h1> Invalid username or password. </h1>
            <button><a href="../index.html">Go Back</a></button>
            </center>
            </body>
            </html>
            ';
}
