<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Suite</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <style>
        .button-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1px;
            margin: 20px 0;
        }
        #output {
            padding: 10px;
            margin-top: 20px;
            border: 1px solid #f00;
            border-radius: 5px;
        }
    </style>
    <script>
        async function runTest(testName) {
            try {
                const response = await fetch('TestSuiteHandler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ test: testName })
                });

                if (!response.ok) {
                    throw new Error(` Status: ${response.status}`);
                }

                const result = await response.json();
                const output = document.getElementById('output');
                output.innerHTML = `${testName}: ${result.message}`;
            } catch (error) {
                const output = document.getElementById('output');
                output.innerHTML = `${testName}: Error (${error.message}). Check console for details.`;
            }
        }
    </script>
</head>
<body>
    <h1>Test Suite</h1>
    <div class="button-grid">
        <button onclick="runTest('Signup')">Test Signup</button>
        <button onclick="runTest('Login')">Test Login</button>
        <button onclick="runTest('ResetPassword')">Test Reset Password</button>
        <button onclick="runTest('SendMessage')">Test Send Message</button>
        <button onclick="runTest('SearchUser')">Test Search User</button>
        <button onclick="runTest('ResetExistingUser')"><strong>Reset Password</strong></button>
    </div>
    <div id="output">
        <p>Results will be displayed here.</p>
    </div>
</body>
</html>
