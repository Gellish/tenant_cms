<div class="content-wrapper">
	<h3>Staff
	   <small>Update, Remove Staff</small>
	</h3>
	
	<!-- START DATATABLE 1 -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default"> 
				<div class="panel-body">
					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Role</th>
								<th>Mobile Number</th>
								<th>Username</th>
								<th>Password</th>
								<th>Status</th>
								<th>Created On</th>
								<th>Created By</th>
								<th>Updated On</th>
								<th>Updated By</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$count = 1;
							$this->db->order_by('timestamp', 'desc');
							$staff = $this->db->get('staff')->result_array(); 
							foreach ($staff as $row):
						?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo html_escape('Remarks: ' . $row['remarks']); ?>">
										<?php echo html_escape($row['name']); ?>
									</a>
								</td>
								<td><?php echo html_escape($row['role']); ?></td>
								<td><?php echo html_escape($row['mobile_number']); ?></td>								
								<td><?php echo html_escape($this->db->get_where('user', array('staff_id' => $row['staff_id']))->row()->username); ?></td>
								<td><?php echo html_escape($this->db->get_where('user', array('staff_id' => $row['staff_id']))->row()->password); ?></td>
								<td>
									<?php
										if ($row['status'])
											echo '<span class="btn btn-xs btn-oval btn-primary">Active</span>'; 
										else
											echo '<span class="btn btn-xs btn-oval btn-warning">Inactive</span>';
									?>
                                </td>
								<td><?php echo date('d M, Y', $row['created_on']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $row['created_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $row['created_by']))->row()->staff_id;
											echo html_escape($this->db->get_where('staff', array('staff_id' => $staff_id))->row()->name); 
										}
									?>
                                </td>
                                <td><?php echo date('d M, Y', $row['timestamp']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $row['updated_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $row['updated_by']))->row()->staff_id;
											echo html_escape($this->db->get_where('staff', array('staff_id' => $staff_id))->row()->name); 
										}
									?>
                                </td>
								<td>
									<div class="btn-group mb-sm">
										<button type="button" data-toggle="dropdown" class="btn btn-inverse btn-xs dropdown-toggle" aria-expanded="false">
											Actions
											<span class="caret"></span>
										</button>
										<ul role="menu" class="dropdown-menu">
											<li>
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_staff/<?php echo $row['staff_id']; ?>');">
													Edit
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_permissions/<?php echo $row['staff_id']; ?>');">
													Permissions
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>staff/remove/<?php echo $row['staff_id']; ?>');" >
													Remove
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
