<?php echo form_open_multipart('tenants/change_image/' . $param2, array('id' => 'change_tenant_image', 'method' => 'post', 'data-parsley-validate' => '')); ?>
	<div class="form-group">
		<label>Existing Image</label>
		<?php if (html_escape($this->db->get_where('tenant', array('tenant_id' => $param2))->row()->image_link)): ?>
		<img src="<?php echo base_url(); ?>uploads/tenants/<?php echo html_escape($this->db->get_where('tenant', array('tenant_id' => $param2))->row()->image_link); ?>" alt="Image" class="img-thumbnail thumb128">
		<?php else: ?>
		<img src="<?php echo base_url(); ?>assets/tenant.jpg" alt="Image" class="img-thumbnail thumb128">
		<?php endif; ?>
	</div>
	
	<div class="form-group">
		<label>Upload New Image</label>
		<input name="image_link" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" required>
	</div>

	<button type="submit" class="mb-sm btn btn-primary">Change</button>
<?php echo form_close(); ?>

<script>
	$('#change_tenant_image').parsley();
	$('.filestyle').filestyle();
</script>
