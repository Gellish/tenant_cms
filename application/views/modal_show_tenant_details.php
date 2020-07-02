<?php 
	$count = 1;
	$tenant_details = $this->db->get_where('tenant', array('tenant_id' => $param2))->result_array(); 
	foreach ($tenant_details as $tenant):
?>
	<div class="table-responsive table-bordered">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th><b>Name</b></th>
					<th><b>Content</b></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Email</td>
					<td><?php echo html_escape($tenant['email']); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Profession</td>
					<td><?php echo html_escape($this->db->get_where('profession', array('profession_id' => $tenant['profession_id']))->row()->name); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Home Address</td>
					<td><?php echo html_escape($tenant['home_address']); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Work Address</td>
					<td><?php echo html_escape($tenant['work_address']); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Extra Note</td>
					<td><?php echo html_escape($tenant['extra_note']); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Created On</td>
					<td><?php echo date('d M, Y', $tenant['created_on']); ?></td>
				</tr>
				<tr>
					<td><?php echo $count++; ?></td>
					<td>Created By</td>
					<td>
						<?php
							$user_type =  $this->db->get_where('user', array('user_id' => $tenant['created_by']))->row()->user_type;
							if ($user_type == 1) {
								echo 'Admin';
							} else {
								$staff_id = $this->db->get_where('user', array('user_id' => $tenant['created_by']))->row()->staff_id;
								echo html_escape($this->db->get_where('staff', array('staff_id' => $staff_id))->row()->name); 
							}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php endforeach; ?>
