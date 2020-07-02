<?php echo form_open('tenants/update/' . $param2, array('id' => 'edit_tenant', 'method' => 'post', 'data-parsley-validate' => '')); ?>
<?php
	$tenant_info = $this->db->get_where('tenant', array('tenant_id' => $param2))->result_array();
	foreach ($tenant_info as $tenant):
?>
	<div class="form-group">
		<label>Name</label>
		<input value="<?php echo html_escape($tenant['name']); ?>" type="text" name="name" placeholder="Enter name" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Mobile</label>
		<input value="<?php echo html_escape($tenant['mobile_number']); ?>" type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input value="<?php echo html_escape($tenant['email']); ?>" type="email" name="email" placeholder="Enter email" class="form-control">
	</div>
	<div class="form-group">
		<label>ID Type</label>
		<div>
			<select class="chosen-select input-md" name="id_type_id" required>
				<option value="">Select ID Type</option>
			<?php
				$id_types = $this->db->get('id_type')->result_array();
				foreach ($id_types as $id_type):
			?>
				<option <?php if ($id_type['id_type_id'] == $tenant['id_type_id']) echo 'selected'; ?> value="<?php echo html_escape($id_type['id_type_id']); ?>"><?php echo html_escape($id_type['name']); ?></option>
			<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>ID</label>
		<input value="<?php echo html_escape($tenant['id_number']); ?>" name="id_number" type="text" placeholder="Enter ID number" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Home address</label>
		<textarea style="resize: none" type="text" name="home_address" placeholder="Enter home address" class="form-control" required><?php echo html_escape($tenant['home_address']); ?></textarea>
	</div>
	<div class="form-group">
		<label>Emergency person</label>
		<input value="<?php echo html_escape($tenant['emergency_person']); ?>" type="text" name="emergency_person" placeholder="Enter emergency person's mobile name" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Emergency contact</label>
		<input value="<?php echo html_escape($tenant['emergency_contact']); ?>" type="text" name="emergency_contact" placeholder="Enter emergency person's mobile number" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Bed</label>
		<div>
			<select class="chosen-select input-md" name="bed_id" required>
				<option value="">Select bed</option>
			<?php
				if ($tenant['bed_id'] > 0):
				$bed_number 	= $this->db->get_where('bed', array('bed_id' => $tenant['bed_id']))->row()->bed_number;
				$room_id 		= $this->db->get_where('bed', array('bed_id' => $tenant['bed_id']))->row()->room_id;
				$room_number	= $this->db->get_where('room', array('room_id' => $room_id))->row()->room_number;
			?>
				<option value="<?php echo html_escape($tenant['bed_id']); ?>" selected><?php echo html_escape('#' . $bed_number . ' of the room ' . $room_number); ?></option>
			<?php
				endif;
				$beds = $this->db->get_where('bed', array('status' => 0))->result_array();
				foreach ($beds as $bed):
			?>
				<option value="<?php echo html_escape($bed['bed_id']); ?>"><?php echo html_escape('#' . $bed['bed_number'] . ' of the room ' . $this->db->get_where('room', array('room_id' => $bed['room_id']))->row()->room_number); ?></option>
			<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>Profession</label>
		<div>
			<select class="chosen-select input-md" name="profession_id" required>
				<option value="">Select profession</option>
			<?php
				$professions = $this->db->get('profession')->result_array();
				foreach ($professions as $profession):
			?>
				<option <?php if ($profession['profession_id'] == $tenant['profession_id']) echo 'selected'; ?> value="<?php echo html_escape($profession['profession_id']); ?>"><?php echo html_escape($profession['name']); ?></option>
			<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>Work address</label>
		<textarea style="resize: none" type="text" name="work_address" placeholder="Enter address" class="form-control"><?php echo html_escape($tenant['work_address']); ?></textarea>
	</div>
	<div class="form-group">
		<label>Status</label>
		<div>
			<select class="chosen-select input-md" name="status" required>
				<option value="">Select status</option>
				<option <?php if ($tenant['status'] == 1) echo 'selected'; ?> value="1">Active</option>
				<option <?php if ($tenant['status'] == 0) echo 'selected'; ?> value="0">Inactive</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>Extra Note</label>
		<textarea style="resize: none" type="text" name="extra_note" placeholder="Enter extra note" class="form-control"><?php echo html_escape($tenant['extra_note']); ?></textarea>
	</div>

	<button type="submit" class="mb-sm btn btn-primary">Update</button>
<?php endforeach; ?>
<?php echo form_close(); ?>

<script>
	$('#edit_tenant').parsley();
	$('.chosen-select').chosen();
</script>

