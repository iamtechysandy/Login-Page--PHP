<?php 
        $stmt = $pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();
        ?>
        <h3>User Details</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Display User Details -->
<tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['full_name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td><?php echo $user['status']; ?></td>
            <td class="changestatus" >
                <!-- Action buttons for each user -->
                <button class="btn btn-primary" onclick="showStatusModal('<?php echo $user['username']; ?>', '<?php echo $user['status']; ?>')">Change Status</button>
    <button class="btn btn-secondary" onclick="showPasswordModal('<?php echo $user['username']; ?>')">Reset Password</button>            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

        </table>
    </div>

    <!--Models-->
   <!-- Status Change Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="statusChangeForm" action="" method="post">
                    <input type="hidden" id="usernameStatus" name="username">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-select">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    <button type="submit" class="btn btn-primary" name="change_status">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reset Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="passwordResetForm" action="" method="post">
                    <input type="hidden" id="usernamePassword" name="username">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="reset_password">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to show status change modal
    function showStatusModal(username, currentStatus) {
        document.getElementById('usernameStatus').value = username;
        document.getElementById('status').value = currentStatus;
        var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
        statusModal.show();
    }

    // Function to show password reset modal
    function showPasswordModal(username) {
        document.getElementById('usernamePassword').value = username;
        var passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
        passwordModal.show();
    }
</script>