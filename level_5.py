from flask import Flask, request, render_template_string
import subprocess

app = Flask(__name__)

HTML_TEMPLATE = """
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Executor Tool</title>
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
        <h2 class="text-center">Command Executor Tool</h2>
        <form method="POST" class="text-center">
            <div class="form-group">
                <input type="text" name="command" class="form-control" placeholder="Enter Command" required>
            </div>
            <button type="submit" class="btn btn-primary">Execute</button>
        </form>
        {% if original_command %}
            <div class="mt-4">
                <h4>Command Output:</h4>
                <p><strong>Original Command:</strong> {{ original_command }}</p>
                <p><strong>Output:</strong> <pre>{{ command_output }}</pre></p>
            </div>
        {% endif %}
    </div>
    <footer class="text-center mt-4">
        <p>Command Executor Tool - Vulnerable Lab</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <?php include 'view-source-button.php'; ?>
    <!-- Include Footer -->
    <?php include 'footer.html'; ?>
</body>
</html>
"""

@app.route("/", methods=["GET", "POST"])
def page():
    original_command = ""
    command_output = ""
    result = ""
    
    if request.method == "POST":
        original_command = request.form.get('command')
        
        # Execute the command without validation (Vulnerability)
        try:
        	output = eval("{}".format(original_command))
        	result = str(original_command)

        except subprocess.CalledProcessError as e:
            command_output = e.output  # Capture the output in case of an error

    return render_template_string(HTML_TEMPLATE, original_command=original_command, command_output=result)

if __name__ == "__main__":
    app.run(host='192.168.43.222', port=8585)
