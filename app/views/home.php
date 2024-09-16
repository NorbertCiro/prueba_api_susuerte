<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script>
        function submitSearchForm() {
            const form = document.getElementById('searchForm');
            form.submit();
        }
    </script>
</head>
<body>
    <?php include 'views/templates/header.php'; 
    require_once 'controllers/UserController.php';

    // Instancia el controlador
    $controller = new UserController();
    ?>

    <div class="container mt-4">
        <h1>Users List</h1>

        <!-- Search Form -->
        <form id="searchForm" method="GET" action="index.php" class="mb-4">
            <div class="input-group">
                <input type="number" name="id" class="form-control" placeholder="Buscar usuario por ID" value="<?php echo htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES); ?>" oninput="submitSearchForm()">
            </div>
        </form>

        <a href="views/form.php" class="btn btn-success mb-3">Add New User</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Company Name</th>
                    <th>Company BS</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['address_city']); ?></td>
                            <td><?php echo htmlspecialchars($user['phone']); ?></td>
                            <td><?php echo htmlspecialchars($user['website']); ?></td>
                            <td><?php echo htmlspecialchars($user['company_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['company_bs']); ?></td>
                            <td>
                                <a href="views/form.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="?delete_id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar al usuario?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10" class="text-center">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php include 'views/templates/footer.php'; ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
