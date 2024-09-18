


<!-- Modal Editar Usuario -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar usuario -->
        <form action="index.php" method="POST">
          <input type="hidden" name="action" value="edit">
          
          <!-- Campo oculto para el ID del usuario -->
          <?php if (isset($user)): ?>
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
          <?php endif; ?>

          <!-- Nombre -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>" required>
          </div>

          <!-- Username -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo isset($user) ? htmlspecialchars($user['username']) : ''; ?>" required>
          </div>

          <!-- Email -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>" required>
          </div>

          <!-- Ciudad -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <input type="text" name="address_city" id="address_city" class="form-control" placeholder="Ciudad" value="<?php echo isset($user) ? htmlspecialchars($user['address_city']) : ''; ?>" required>
          </div>

          <!-- Teléfono -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Teléfono" value="<?php echo isset($user) ? htmlspecialchars($user['phone']) : ''; ?>" required>
          </div>

          <!-- Website -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-globe"></i></span>
            <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo isset($user) ? htmlspecialchars($user['website']) : ''; ?>" required>
          </div>

          <!-- Nombre de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-building"></i></span>
            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Nombre de la Compañía" value="<?php echo isset($user) ? htmlspecialchars($user['company_name']) : ''; ?>" required>
          </div>

          <!-- BS de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
            <input type="text" name="company_bs" id="company_bs" class="form-control" placeholder="BS de la Compañía" value="<?php echo isset($user) ? htmlspecialchars($user['company_bs']) : ''; ?>" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
