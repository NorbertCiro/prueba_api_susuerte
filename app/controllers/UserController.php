<?php
require_once 'models/UserModel.php';

class UserController {
    public function index() {
        $model = new UserModel();
        $users = $model->getUsers();
        require 'views/home.php';
    }

    public function addUser() {
        $model = new UserModel();
        $model->addUser($_POST['name'], $_POST['email']);
        header('Location: home.php');
    }

    public function editUser($id) {
        $model = new UserModel();
        $user = $model->getUserById($id);
        require 'views/edit.php';
    }

    public function getUserById($id) { 
        $model = new UserModel();
        $user = $model->getUserById($id);
        require 'views/home.php';
    }

    public function deleteUser($id) {
        $model = new UserModel();
        $model->deleteUser($id);
        header('Location: home.php');
    }

    // Add more methods as needed</script>
  }?>
  
  <script>
      setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname)
      }, 0);
  </script>