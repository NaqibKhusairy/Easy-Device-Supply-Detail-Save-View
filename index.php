<!DOCTYPE html>
<html>
    <head>
        <title>SUPPLY - DETAIL INSERT</title>
        <link rel="icon" href="src/logo.png">
        <style>
            body {
                font-family: 'Century Gothic', sans-serif;
                margin: 20px;
                background-color: #f5e6f9; /* Light shade of #873f97 */
                text-transform: uppercase; /* Make label text uppercase */
            }
            form {
                max-width: 600px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #e9d3f3; /* Light color for the form background */
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
            }
            input[type="text"],
            select {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
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
            .modal {
                display: none; /* Hidden by default */
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.6); /* Slightly darker overlay */
                padding-top: 60px;
            }
            .modal-content {
                background-color: #f5e6f9;
                margin: 5% auto;
                padding: 20px;
                border: 1px solid #bbb; /* Light gray border */
                width: 90%;
                border-radius: 8px; /* Slightly larger radius for rounded corners */
            }
            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }
            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                background-color: #f9f9f9; /* Light color for the table background */
            }
            th, td {
                border: 1px solid #e9d3f3; /* Light color for border */
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #d5a6e1; /* Light purple color for table headers */
            }
            td {
                background-color: #ffffff; /* White color for table data cells */
            }
        </style>
        <script>
            function updateDateTime() {
                const now = new Date();
                const year = now.getFullYear();
                const month = String(now.getMonth() + 1).padStart(2, '0');
                const day = String(now.getDate()).padStart(2, '0');
                const hours = now.getHours();
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = String(hours % 12 || 12).padStart(2, '0');
                const formattedDateTime = `${year}-${month}-${day} ${formattedHours}:${minutes}:${seconds} ${ampm}`;
                document.getElementById('tarikhMasa').value = formattedDateTime;
            }

            function showData() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'fetchdata.php', true);
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        document.getElementById('modalContent').innerHTML = xhr.responseText;
                        document.getElementById('dataModal').style.display = 'block';
                    } else {
                        document.getElementById('modalContent').innerHTML = '<p>Error fetching data.</p>';
                        document.getElementById('dataModal').style.display = 'block';
                    }
                };
                xhr.onerror = function() {
                    document.getElementById('modalContent').innerHTML = '<p>Error fetching data.</p>';
                    document.getElementById('dataModal').style.display = 'block';
                };
                xhr.send();
            }

            function closeModal() {
                document.getElementById('dataModal').style.display = 'none';
            }

            window.addEventListener('load', () => {
                setInterval(updateDateTime, 1000);
            });
        </script>
    </head>
    <body>
        <center><h2>Supply Detail</h2></center>
        <form action="processsave.php" method="post">
            <div class="form-group">
                <label for="kontraktor">Kontraktor:</label>
                <select id="kontraktor" name="kontraktor" required>
                    <option value="">-- SELECT KONTRAKTOR --</option>
                    <option value="KONTRAKTOR 1">KONTRAKTOR 1</option>
                    <option value="KONTRAKTOR 2">KONTRAKTOR 2</option>
                    <option value="KONTRAKTOR 3">KONTRAKTOR 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="site">Site:</label>
                <input type="text" id="site" name="site" required>
            </div>
            <div class="form-group">
                <label for="tarikhMasa">Tarikh & Masa Pemasangan:</label>
                <input type="text" id="tarikhMasa" name="tarikhMasa" required readonly>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" required>
            </div>
            <div class="form-group">
                <label for="aras">Aras:</label>
                <input type="text" id="aras" name="aras" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="serialNumber">Serial Number:</label>
                <input type="text" id="serialNumber" name="serialNumber" required>
            </div>
            <div class="form-group">
                <label for="ipAddress">IP Address:</label>
                <input type="text" id="ipAddress" name="ipAddress" required>
            </div>
            <center>
                <button type="submit">Submit</button>
                <button type="button" onclick="showData()">Show Data</button>
            </center>
        </form>

        <!-- Modal for showing data -->
        <div id="dataModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modalContent"></div>
            </div>
        </div>
    </body>
</html>
