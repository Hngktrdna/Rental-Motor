<?php 
require "rentalmotor.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rental Motor Receipt</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        
    }
    h1 {
        text-align: center;
        color: purple;
    }
    .receipt {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #DDCAFF;
    }
    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .column {
        flex-basis: 45%;
    }
    .column select, .column input {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .total {
        text-align: right;
        margin-top: 20px;
    }
    .logo {
        display: block;
        margin: 0 auto;
        width: 200px;
    }
    pre {
        text-align: center;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Motorcycle Rental Receipt</h1>
        <img src="img/Motorcycle logo.jpg" alt="https://i.pinimg.com/736x/ff/b4/23/ffb4231078df64586a0060370dc33a26.jpg" class="logo">
        <div class="receipt">
            <!-- Column to input the name of cust -->
            <form action="" method="post">
            <div class="row">
            <div class="column">
                    <label for="quantity">Name:</label>
                    <input type="text" id="nama" name="nama">
                </div>
                <!-- Column to input the time -->
                <div class="column">
                    <label for="quantity">Time (Day):</label>
                    <input type="number" id="time" name="time" min="1" value="1">
                </div>
                <!-- Column to choose the type of motorcycle -->
                <div class="column">
                    <label for="fuel">Motor Type:</label>
                    <select id="type" name="type">
                        <option value="scooter">Scooter</option>
                        <option value="sport">Sport</option>
                        <option value="cross">Cross</option>
                        <option value="sportTouring">Sport Touring</option>
                    </select>
                </div>
                
                
            </div>
            <div class="total">
                <!-- Button to calculate total of payment -->
                <button type="submit">Calculate Total</button>
            </div>
        </form>
            <pre id="receiptResult"></pre>
        </div>
    </div>

    
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenis = $_POST["type"];
        $time = $_POST["time"];
        $nama = $_POST["nama"];
        $process = new Process;
$process->member = $nama;
$process->jenis = $jenis;
$process->waktu = $time;
       
             echo "<script> 
             document.getElementById('receiptResult').append(`".$process->getReceipt()."`);
             </script>";
    }
             
            ?>
</body>
</html>
