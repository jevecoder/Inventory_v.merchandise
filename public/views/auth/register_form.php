<form action="../controllers/auth/register.php" method="POST">
    <h2>Register</h2>
    <input type="text" name="name" required placeholder="Name"><br>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>