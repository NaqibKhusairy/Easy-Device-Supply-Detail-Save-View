<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supply";
$tablename = "supply_details";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM $tablename");
    $stmt->execute();
    
    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) > 0) {
        // Output data in HTML table format
        echo "<table border='1' style='width:100%; border-collapse: collapse;'>
                <tr>
                    <th><center>Kontraktor</center></th>
                    <th><center>Site</center></th>
                    <th><center>Tarikh & Masa Pemasangan</center></th>
                    <th><center>Lokasi</center></th>
                    <th><center>Aras</center></th>
                    <th><center>Model</center></th>
                    <th><center>Serial Number</center></th>
                    <th><center>IP Address</center></th>
                </tr>";
        foreach ($results as $row) {
            echo "<tr>
                    <td><center>{$row['kontraktor']}</center></td>
                    <td><center>{$row['site']}</center></td>
                    <td><center>{$row['tarikh_masa_pemasangan']}</center></td>
                    <td><center>{$row['lokasi']}</center></td>
                    <td><center>{$row['aras']}</center></td>
                    <td><center>{$row['model']}</center></td>
                    <td><center>{$row['serial_number']}</center></td>
                    <td><center>{$row['ip_address']}</center></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data found in the database.</p>";
    }
} catch(PDOException $e) {
    echo "<p>No database connection or no table found.</p>";
}
?>
