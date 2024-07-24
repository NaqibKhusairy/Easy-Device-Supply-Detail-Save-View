<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kontraktor = strtoupper(htmlspecialchars($_POST['kontraktor']));
        $site = strtoupper(htmlspecialchars($_POST['site']));
        $tarikhMasa = strtoupper(htmlspecialchars($_POST['tarikhMasa']));
        $lokasi = strtoupper(htmlspecialchars($_POST['lokasi']));
        $aras = strtoupper(htmlspecialchars($_POST['aras']));
        $model = strtoupper(htmlspecialchars($_POST['model']));
        $serialNumber = strtoupper(htmlspecialchars($_POST['serialNumber']));
        $ipAddress = strtoupper(htmlspecialchars($_POST['ipAddress']));
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SUPPLY - DETAIL CONFIRMATION</title>
        <link rel="icon" href="src/logo.png">
        <style>
            body {
                font-family: 'Century Gothic', sans-serif;
                margin: 20px;
                background-color: #f5e6f9; /* Light shade of #873f97 */
                text-transform: uppercase; /* Make label text uppercase */
            }
            .data {
                margin-bottom: 15px;
            }
            label {
                font-weight: bold;
            }
            button {
                padding: 10px 20px;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                background-color: #d55eb6; /* Darker shade than form background */
                transition: background-color 0.3s ease; /* Smooth transition for hover effect */
            }
            button:hover {
                background-color: #a43f8f; /* Darker shade for hover effect */
            }
        </style>
    </head>
    <body>
        <h2>Confirm Supply Detail</h2>
        <div class="data">
            <label>Kontraktor:</label> <?php echo $kontraktor; ?>
        </div>
        <div class="data">
            <label>Site:</label> <?php echo $site; ?>
        </div>
        <div class="data">
            <label>Tarikh & Masa Pemasangan:</label> <?php echo $tarikhMasa; ?>
        </div>
        <div class="data">
            <label>Lokasi:</label> <?php echo $lokasi; ?>
        </div>
        <div class="data">
            <label>Aras:</label> <?php echo $aras; ?>
        </div>
        <div class="data">
            <label>Model:</label> <?php echo $model; ?>
        </div>
        <div class="data">
            <label>Serial Number:</label> <?php echo $serialNumber; ?>
        </div>
        <div class="data">
            <label>IP Address:</label> <?php echo $ipAddress; ?>
        </div>
        <form action="savedata.php" method="post">
            <input type="hidden" name="kontraktor" value="<?php echo $kontraktor; ?>">
            <input type="hidden" name="site" value="<?php echo $site; ?>">
            <input type="hidden" name="tarikhMasa" value="<?php echo $tarikhMasa; ?>">
            <input type="hidden" name="lokasi" value="<?php echo $lokasi; ?>">
            <input type="hidden" name="aras" value="<?php echo $aras; ?>">
            <input type="hidden" name="model" value="<?php echo $model; ?>">
            <input type="hidden" name="serialNumber" value="<?php echo $serialNumber; ?>">
            <input type="hidden" name="ipAddress" value="<?php echo $ipAddress; ?>">
            <button type="submit">Save</button>
            <button type="button" onclick="history.back()">Back</button>
        </form>
    </body>
</html>
