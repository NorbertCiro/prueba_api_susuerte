<!-- Modal Create-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>