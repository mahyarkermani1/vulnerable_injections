<?php
$output = '';
$originalInput = '';
$mode = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mode = $_POST['mode'];
    $originalInput = $_POST['input'];

    if ($mode === 'php_D') {
        // Directly executing the PHP input without filtering (vulnerable)
        ob_start(); // Start output buffering
        eval($originalInput);
        $output = ob_get_clean(); // Get the output and clean the buffer
    } elseif ($mode === 'php_F') {

        $output = eval("print('$originalInput');");
     
    elseif ($mode === 'html') {
        // Directly outputting the HTML input (vulnerable)
        $output = $originalInput; // This will render the HTML directly
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Injection Tool</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Include Header -->
    <?php include 'header.html'; ?>
    <div class="container">
        <h2 class="text-center">Code Injection Tool</h2>
        <form method="POST" class="text-center">
            <div class="form-group">
                <label for="mode">Select Mode:</label>
                <select name="mode" class="form-control" required>
                    <option value="php_D">PHP Code Injection - Directly</option>
                    <option value="php_F">PHP Code Injection - Break and Fix code</option>
                    <option value="html">HTML Code Injection</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="input" class="form-control" rows="5" placeholder="Enter your code or HTML" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Execute</button>
        </form>
        <?php if ($originalInput): ?>
            <div class="mt-4">
                <h4>Input Details:</h4>
                <p><strong>Original Input:</strong> <?php echo htmlspecialchars($originalInput); ?></p>
                <h4>Output:</h4>
                <pre><?php echo $output; ?></pre>
            </div>
        <?php endif; ?>
    </div>
    <footer class="text-center mt-4">
        <p>Code Injection Tool - CTF Challenge</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <?php include 'view-source-button.php'; ?>
    <!-- Include Footer -->
    <?php include 'footer.html'; ?>
</body>
</html>
