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
        <h1 class="mb-4 text-center">User Management</h1>

        <!-- Search Form -->
        <form id="searchForm" method="GET" action="index.php" class="mb-4">
            <div class="input-group">
                <input type="number" name="id" class="form-control" placeholder="Buscar usuario por ID" value="<?php echo htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES); ?>" oninput="submitSearchForm()">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </form>

        <!-- Button to Open Create Modal -->
        <?php include("create.php"); ?>
        <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#create">
            <i class="bi bi-plus-circle"></i> Agregar Usuario
        </button>

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
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
                                    <!-- Button to Open Edit Modal -->
                                    <?php include("edit.php"); ?>
                                    <button type="button" class="btn btn-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#edit">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>

                                    <!-- Delete Button -->
                                    <a href="?delete_id=<?php echo htmlspecialchars($user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar al usuario?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
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
    </div>

    <?php include 'views/templates/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
