<?php
session_start();

// Initialize the session if it's not already set
if (!isset($_SESSION['form_data'])) {
    $_SESSION['form_data'] = [];
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $interests = isset($_POST['interests']) ? implode(", ", $_POST['interests']) : 'No interests selected';
    $subscription = isset($_POST['subscription']) ? 'Subscribed' : 'Not Subscribed';
    $color = $_POST['color'];
    $gender =  $_POST['gender'];
    $time = $_POST['time'];
    $hobby = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : 'No hobby stated';
    $DOB = $_POST['DOB'];
    $continent = $_POST['continent'];
   $message = $_POST['message'];

    // Store data in session
    $_SESSION['form_data'][] = [
        'FirstName' => $FirstName,
        'LastName' => $LastName,
        'email' => $email,
        'password' => $password,  // Password is stored here, but should be hashed in real applications
        'interests' => $interests,
        'subscription' => $subscription,
        'color' => $color,
        'gender' => $gender,
        'time' => $time,
        'hobby' => $hobby,
        'DOB' => $DOB,
        'continent' => $continent,
        'message' => $message,
    ];
}
 if (isset($_SESSION['form_data']) && count($_SESSION['form_data']) > 0): ?>
    <h2>Registered Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Interests</th>
                <th>Subscription</th>
                <th>color</th>
                <th>gender</th>
                <th>time</th>
                <th>hobby</th>
                <th>DOB</th>
                <th>continent</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['form_data'] as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['FirstName']); ?></td>
                    <td><?php echo htmlspecialchars($user['LastName']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['interests']); ?></td>
                    <td><?php echo htmlspecialchars($user['subscription']); ?></td>
                    <td><?php echo htmlspecialchars($user['color']); ?></td>
                    <td><?php echo htmlspecialchars($user['gender']); ?></td>
                    <td><?php echo htmlspecialchars($user['time']); ?></td>
                    <td><?php echo htmlspecialchars($user['hobby']); ?></td>
                    <td><?php echo htmlspecialchars($user['DOB']); ?></td>
                    <td><?php echo htmlspecialchars($user['continent']); ?></td>
                    <td><?php echo htmlspecialchars($user['message']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</body>
</html>