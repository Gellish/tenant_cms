<?php echo form_open('beds/update/' . $param2, array('id' => 'edit_bed', 'method' => 'post', 'data-parsley-validate' => '')); ?>
	<div class="form-group">
		<label>Bed Number</label>
		<input value="<?php echo html_escape($this->db->get_where('bed', array('bed_id' => $param2))->row()->bed_number); ?>" type="text" name="bed_number" required placeholder="Enter bed number" class="form-control">
	</div>
	<div class="form-group">
		<label>Room Number</label>
		<div>
			<select class="chosen-select input-md" required name="room_id">
				<option value="">Select room</option>
			<?php
				$rooms = $this->db->get('room')->result_array();
				foreach ($rooms as $room):
			?>
				<option <?php if ($this->db->get_where('bed', array('bed_id' => $param2))->row()->room_id == $room['room_id']) echo 'selected'; ?> value="<?php echo html_escape($room['room_id']); ?>"><?php echo html_escape($room['room_number']); ?></option>
			<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label>Rent (<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>)</label>
		<input value="<?php echo html_escape($this->db->get_where('bed', array('bed_id' => $param2))->row()->rent); ?>" type="text" required name="rent" placeholder="Enter rent" class="form-control">
	</div>
	<div class="form-group">
		<label>Remarks</label>
		<textarea style="resize: none" type="text" name="remarks" placeholder="Enter remarks" class="form-control"><?php echo html_escape($this->db->get_where('bed', array('bed_id' => $param2))->row()->remarks); ?></textarea>
	</div>
	
	<button type="submit" class="mb-sm btn btn-primary">Update</button>
<?php echo form_close(); ?>

<script>
	$('#edit_bed').parsley();
	$('.chosen-select').chosen();
</script>
