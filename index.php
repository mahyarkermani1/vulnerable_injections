<?php
$pingResult = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ipAddress = $_POST['ip_address'];
    // Dangerous: Directly using user input in a system command
    $pingResult = shell_exec("ping -c 1 $ipAddress 2>&1"); // For Linux
    // Uncomment the next line for Windows compatibility
    // $pingResult = shell_exec("ping -n 1 $ipAddress 2>&1"); // For Windows
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ping Tool</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .result {
            margin-top: 20px;
            border: 1px solid #ced4da;
            padding: 15px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include 'header.html'; ?>
    
    <div class="container">
        <h2 class="text-center">Ping Tool</h2>
        <form method="POST" class="text-center">
            <div class="form-group">
                <input type="text" name="ip_address" class="form-control" placeholder="Enter IP Address" required>
            </div>
            <button type="submit" class="btn btn-primary">Ping</button>
        </form>
        <?php if ($pingResult): ?>
            <div class="result">
                <h5>Ping Result:</h5>
                <pre><?php echo htmlspecialchars($pingResult); ?></pre>
            </div>
        <?php endif; ?>
    </div>
    <footer class="text-center mt-4">
        <p>Ping Tool - Command Injection Lab</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <?php include 'view-source-button.php'; ?>
    <!-- Include Footer -->
    <?php include 'footer.html'; ?>
</body>
</html>