The solution uses PDO for database interaction, offering enhanced security and error handling.  Input is parameterized to prevent SQL injection.  Error handling is implemented to provide informative error messages.  Always sanitize user inputs to prevent security vulnerabilities.  Using prepared statements is a crucial step in secure coding.
```php
<?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$_POST['username']]);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Process $users
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
?>
```