<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/app" method="POST">
          <input type="hidden" name="action" value="edit">
          <?php if (isset($user)): ?>
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
          <?php endif; ?>

          <!-- Nombre -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>" required>
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
            <input type="text" name="address_city" id="address_city" class="form-control" placeholder="City" value="<?php echo isset($user) ? htmlspecialchars($user['address_city']) : ''; ?>" required>
          </div>

          <!-- Teléfono -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php echo isset($user) ? htmlspecialchars($user['phone']) : ''; ?>" required>
          </div>

          <!-- Website -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-globe"></i></span>
            <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo isset($user) ? htmlspecialchars($user['website']) : ''; ?>" required>
          </div>

          <!-- Nombre de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-building"></i></span>
            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" value="<?php echo isset($user) ? htmlspecialchars($user['company_name']) : ''; ?>" required>
          </div>

          <!-- BS de la Compañía -->
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
            <input type="text" name="company_bs" id="company_bs" class="form-control" placeholder="Company BS" value="<?php echo isset($user) ? htmlspecialchars($user['company_bs']) : ''; ?>" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
