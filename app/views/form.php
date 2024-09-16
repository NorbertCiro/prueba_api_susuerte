<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($user) ? 'Edit User' : 'Add User'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1><?php echo isset($user) ? 'Edit User' : 'Add User'; ?></h1>
        <form action="/app" method="POST">
            <input type="hidden" name="action" value="<?php echo isset($user) ? 'edit' : 'create'; ?>">
            <?php if (isset($user)): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['username']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address_city" class="form-label">City</label>
                <input type="text" name="address_city" id="address_city" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['address_city']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['phone']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" name="website" id="website" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['website']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['company_name']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="company_bs" class="form-label">Company BS</label>
                <input type="text" name="company_bs" id="company_bs" class="form-control" value="<?php echo isset($user) ? htmlspecialchars($user['company_bs']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($user) ? 'Update' : 'Save'; ?></button>
            <a href="../" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
