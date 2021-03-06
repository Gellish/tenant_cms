<div class="content-wrapper">
    <h3>Settings
        <small>Update Profile Settings</small>
    </h3>
    
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update Pofile Settings | Form</div>
                <div class="panel-body">
					<?php echo form_open('profile_settings/update/' . $this->session->userdata('user_id'), array('method' => 'post', 'data-parsley-validate' => '')); ?>
	                <?php
	                    $user_info = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->result_array();
	                    foreach ($user_info as $row):
	                ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input <?php if($this->session->userdata('user_type') != 1) echo 'readonly'; ?> value="<?php echo html_escape($row['username']); ?>" type="text" name="username" placeholder="Enter username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input value="<?php echo $row['password']; ?>" type="password" name="password" placeholder="Enter password" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    <?php endforeach; ?>
					<?php echo form_close(); ?>                
                </div>
            </div>
        </div>
    </div>
</div>
