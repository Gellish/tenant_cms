<?php echo form_open('staff/permission/' . $param2, array('method' => 'post')); ?>
	<div class="table-responsive table-bordered">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th><b>Page</b></th>
					<th><b>Permission</b></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$count = 1;
				
				$permissions = $this->db->get_where('user', array('staff_id' => $param2))->row()->permissions;
				
				if (isset($permissions)) $permissions_no_comma = explode(",", $permissions);
				
				$pages = $this->db->get('page')->result_array(); 
				foreach ($pages as $page):
			?>
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo html_escape($page['page_title']); ?></td>
					<td>
						<div class="form-group">
							<div class="col-sm-2">
								<div class="checkbox c-checkbox">
									<label>
										<input <?php if (isset($permissions_no_comma) && in_array($page['page_id'], $permissions_no_comma)) echo 'checked'; ?> value="<?php echo html_escape($page['page_id']); ?>" type="checkbox" name="permission[]">
										<span class="fa fa-check"></span>
									</label>
							  </div>
						   </div>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<button type="submit" class="mb-sm btn btn-primary">Update</button>
<?php echo form_close(); ?>
	
