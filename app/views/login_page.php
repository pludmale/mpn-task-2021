<body>
<div>
    <h2>Login page</h2>
    <label>
        Username
        <input type="text" placeholder="Enter Username" id="username" required>
    </label>

    <label>
        Password
        <input type="password" placeholder="Enter Password" id="password" required>
    </label>

    <button id="login-button" type="submit">Login!</button>
</div>
</body>
<script>
    document.getElementById('login-button').onclick = function() {
        console.log('button was clicked');
        window.location.href = '/login?username=' +
            document.getElementById('username').value + '&password=' +
            document.getElementById('password');
    };
</script>