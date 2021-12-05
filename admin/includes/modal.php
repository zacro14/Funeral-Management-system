<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="logoutModalLabel">Logout Session ( <strong><?php echo $user['admin_firstname'] . ' ' . $user['admin_lastname'] . ' - ' . $user['branch_name']; ?></strong> )</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <a href="logout.php" class="btn btn-primary btn-sm">LOGOUT</a>
            </div>
        </div>
    </div>
</div>