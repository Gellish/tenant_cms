<?php echo form_open('staff/update/' . $param2, array('id' => 'edit_staff', 'method' => 'post', 'data-parsley-validate' => '')); ?>
<?php
	$staff_details = $this->db->get_where('staff', array('staff_id' => $param2))->result_array();
	foreach ($staff_details as $row):
?>
	<div class="form-group">
		<label>Name</label>
		<input value="<?php echo html_escape($row['name']); ?>" type="text" name="name" placeholder="Enter name" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Role</label>
		<input value="<?php echo html_escape($row['role']); ?>" type="text" name="role" placeholder="Enter role" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Mobile Number</label>
		<input value="<?php echo html_escape($row['mobile_number']); ?>" type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input readonly value="<?php echo html_escape($this->db->get_where('user', array('staff_id' => $row['staff_id']))->row()->username); ?>" type="text" name="username" placeholder="Enter username" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input value="<?php echo $this->db->get_where('user', array('staff_id' => $row['staff_id']))->row()->password; ?>" type="text" name="password" placeholder="Enter password" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Status</label>
		<div>
			<select class="chosen-select input-md" name="status" required>
				<option value="">Select status</option>
				<option <?php if ($row['status'] == 0) echo 'selected'; ?> value="0">Inactive</option>
				<option <?php if ($row['status'] == 1) echo 'selected'; ?> value="1">Active</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>Remarks</label>
		<textarea style="resize: none" type="text" name="remarks" placeholder="Enter remarks" class="form-control"><?php echo html_escape($row['remarks']); ?></textarea>
	</div>
	
	<button type="submit" class="mb-sm btn btn-primary">Update</button>
<?php endforeach; ?>
<?php echo form_close(); ?>

<script>
	$('#edit_staff').parsley();
	$('.chosen-select').chosen();
</script>
