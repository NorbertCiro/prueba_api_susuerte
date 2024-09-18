<!-- Modal para Crear y Editar Usuario -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">
          <?php echo isset($user) ? 'Editar Usuario' : 'Agregar Usuario'; ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="POST">
          <!-- Campo oculto para la acción (create o edit) -->
          <input type="hidden" name="action" value="<?php echo isset($user) ? 'edit' : 'create'; ?>">

          <!-- Campo oculto para el ID del usuario, solo si estamos editando -->
          <?php if (isset($user)): ?>
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
          <?php endif; ?>

          <!-- Nombre -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" class="form-control" placeholder="Nombre" value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>" required>
          </div>

          <!-- Username -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo isset($user) ? htmlspecialchars($user['username']) : ''; ?>" required>
          </div>

          <!-- Email -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>" required>
          </div>

          <!-- Ciudad -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
            <input type="text" name="address_city" class="form-control" placeholder="Ciudad" value="<?php echo isset($user) ? htmlspecialchars($user['address_city']) : ''; ?>" required>
          </div>

          <!-- Teléfono -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" name="phone" class="form-control" placeholder="Teléfono" value="<?php echo isset($user) ? htmlspecialchars($user['phone']) : ''; ?>" required>
          </div>

          <!-- Website -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-globe"></i></span>
            <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo isset($user) ? htmlspecialchars($user['website']) : ''; ?>" required>
          </div>

          <!-- Nombre de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-building"></i></span>
            <input type="text" name="company_name" class="form-control" placeholder="Nombre de la Compañía" value="<?php echo isset($user) ? htmlspecialchars($user['company_name']) : ''; ?>" required>
          </div>

          <!-- BS de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
            <input type="text" name="company_bs" class="form-control" placeholder="Company BS" value="<?php echo isset($user) ? htmlspecialchars($user['company_bs']) : ''; ?>" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Incluye Bootstrap JS para funcionalidad del modal (opcional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
