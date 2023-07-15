<?php

function exportDatabaseStructure($hostname, $username, $password, $databaseName, $outputFile)
{
    // Connect to the database
    $conn = new mysqli($hostname, $username, $password, $databaseName);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get database structure
    $result = $conn->query("SHOW TABLES");
    
    // Start the SQL file
    $sql = "-- Database structure for $databaseName\n";
    $sql .= "-- Generated on " . date('Y-m-d H:i:s') . "\n\n";
    
    // Loop through tables
    while ($row = $result->fetch_row()) {
        $table = $row[0];
        
        // Get the create table statement
        $createTable = $conn->query("SHOW CREATE TABLE $table");
        $createTableRow = $createTable->fetch_row();
        $createTableStatement = $createTableRow[1];
        
        // Append create table statement to the SQL file
        $sql .= "-- Table structure for table `$table`\n";
        $sql .= $createTableStatement . ";\n\n";
    }
    
    // Close the connection
    $conn->close();
    
    // Write SQL to the output file
    file_put_contents($outputFile, $sql);
    
    //echo "Database structure exported to $outputFile successfully.";
}