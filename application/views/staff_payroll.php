<div class="content-wrapper">
	<h3>Staff Payroll
	   <small>View All Staff Payroll</small>
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
								<th>Staff Name</th>
								<th>Month</th>
								<th>Year</th>
								<th>Amount</th>
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
							$staff_payroll = $this->db->get('staff_salary')->result_array(); 
							foreach ($staff_payroll as $row):
						?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo html_escape($this->db->get_where('staff', array('staff_id' => $row['staff_id']))->row()->name); ?></td>
								<td><?php echo html_escape($row['month']); ?></td>
								<td><?php echo html_escape($row['year']); ?></td>
								<td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
									<?php echo html_escape($row['amount']); ?>
								</td>
								<td>
									<?php
										if ($row['status'] == 0)
											echo '<span class="btn btn-xs btn-oval btn-warning">Due</span>'; 
										else 
											echo '<span class="btn btn-xs btn-oval btn-primary">Paid</span>'; 
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
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_staff_payroll/<?php echo $row['staff_salary_id']; ?>');">
													Edit
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>staff_payroll/remove/<?php echo $row['staff_salary_id']; ?>');" >
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
