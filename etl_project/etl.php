<?php
include 'db.php'; // Include database connection

function loadDataFromFile($filename)
{
    $data = [];
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = [
                'user_id' => $row[0],
                'first_name' => trim($row[1]),
                'last_name' => trim($row[2])
            ];
        }
        fclose($handle);
    }
    return $data;
}

function insertDataIntoDatabase($data, $conn)
{
    foreach ($data as $row) {
        $stmt = $conn->prepare("INSERT INTO users (user_id, first_name, last_name) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $row['user_id'], $row['first_name'], $row['last_name']);
        $stmt->execute();
        if ($stmt->error) {
            echo "Error: " . $stmt->error . "<br>";
        }
    }
    $stmt->close();
}

// Path to the CSV file
$csvFile = 'userdata.csv';

// Extract data from the file
$csvData = loadDataFromFile($csvFile);

// Load data into the database
insertDataIntoDatabase($csvData, $conn);

echo "ETL Process has been completed successfully.";
