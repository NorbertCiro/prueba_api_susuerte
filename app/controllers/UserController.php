<?php
ob_start();
class UserController {
  private $model;

  public function __construct() {
      require_once 'models/UserModel.php';
      $this->model = new UserModel();
  }

  public function index() {
      $users = [];

      if (isset($_GET['id']) && !empty($_GET['id'])) {
          // Buscar usuario por ID
          $id = (int)$_GET['id'];
          $user = $this->model->getUserById($id);
          if ($user) {
              $users = [$user];
          }
      } else {
          // Obtener todos los usuarios
          $users = $this->model->getUsers();
      }

      include 'views/home.php'; // Asegúrate de que la vista esté en la ruta correcta
  }

  public function deleteUser($id) {
      if ($this->model->deleteUser($id)) {
          header('Location: index.php?message=Usuario eliminado con éxito');
          exit();
      } else {
          header('Location: index.php?message=Error al eliminar usuario');
          exit();
      }
  }

  public function createUser($data) {
      return $this->model->addUser($data);
  }

  public function updateUser($id, $data) {
      return $this->model->updateUser($id, $data);
  }

  // Método para manejar la solicitud
  public function handleRequest() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $action = isset($_POST['action']) ? $_POST['action'] : '';

          // Recoge todos los campos del formulario
          $data = [
              'name' => $_POST['name'],
              'username' => $_POST['username'],
              'email' => $_POST['email'],
              'address_city' => $_POST['address_city'],
              'phone' => $_POST['phone'],
              'website' => $_POST['website'],
              'company_name' => $_POST['company_name'],
              'company_bs' => $_POST['company_bs']
          ];

          if ($action === 'create') {
              $this->createUser($data);
              header('Location: ../index.php?action=created');
              exit();
          } elseif ($action === 'edit') {
              $id = $_POST['id'];
              $this->updateUser($id, $data);
              header('Location: ../index.php?action=updated');
              exit();
          }
      } elseif (isset($_GET['delete_id'])) {
          $this->deleteUser($_GET['delete_id']);
          header('Location: ../index.php?action=deleted');
          exit();
      }
  }
}

// Antes de finalizar el script
ob_end_flush();
$controller = new UserController();
$controller->handleRequest();
?>
<!-- <script>
      setTimeout(() => {
    window.location.href = window.location.pathname;
}, 2000);
</script> -->