<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hashing Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <form action="<?=  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="border border-secondary rounded p-3 m-5">
        <label for="first_password" class="form-label">First Password</label>
        <input type="password" name="first_password" id="first_password" class="form-control" value="<?= $first_password; ?>">
        <p>Enter a string you'd like to test.</p>

        <?php if ($first_password !== ""): ?>
    
</body>
</html>