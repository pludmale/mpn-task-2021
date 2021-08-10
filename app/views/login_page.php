<body>
<div>
    <h2>Login page</h2>
    <label>
        Username
        <input type="text" placeholder="Enter Username" name="uname" required>
    </label>

    <label>
        Password
        <input type="password" placeholder="Enter Password" name="psw" required>
    </label>

    <button id="login-button" type="submit">Login!</button>
</div>
</body>
<script>
    document.getElementById('login-button').onclick = function() {
        console.log('button was clicked');
    };
</script>