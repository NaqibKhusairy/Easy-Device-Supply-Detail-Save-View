<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supply";
    $tablename = "supply_details";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind for checking existing serial number
        $stmt = $conn->prepare("SELECT * FROM $tablename WHERE serial_number = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("s", $_POST['serialNumber']);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Serial number exists
            $message = "Data already exists in the database... redirecting to index page...";
        } else {
            // Prepare and bind for inserting new data
            $stmt = $conn->prepare("INSERT INTO $tablename (kontraktor, site, tarikh_masa_pemasangan, lokasi, aras, model, serial_number, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("ssssssss", $_POST['kontraktor'], $_POST['site'], $_POST['tarikhMasa'], $_POST['lokasi'], $_POST['aras'], $_POST['model'], $_POST['serialNumber'], $_POST['ipAddress']);
            
            if ($stmt->execute()) {
                $message = "Data successfully added... redirecting to index page...";
            } else {
                $message = "Error: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SUPPLY - SAVING DATA</title>
        <link rel="icon" href="src/logo.png">
        <style>
            body {
                font-family: 'Century Gothic', sans-serif;
                margin: 20px;
                background-color: #f5e6f9; /* Light shade of #873f97 */
            }
            .message {
                padding: 10px;
                background-color: #d4edda; /* Light green for success */
                color: #155724; /* Dark green text */
                border: 1px solid #c3e6cb; /* Slightly darker border */
                border-radius: 4px;
                margin-bottom: 15px;
                text-align: center; /* Center text */
            }
        </style>
        <meta http-equiv="refresh" content="2.3;url=index.php">
    </head>
    <body>
        <center>    
            <div class="message">
                <?php echo $message; ?>
            </div>
        </center>
    </body>
</html>
