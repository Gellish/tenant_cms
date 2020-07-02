<div class="content-wrapper">
	<h3>Professions
	   <small>Showing all profession names</small>
	</h3>
	
	<!-- START DATATABLE 1 -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-8">
				<div class="panel panel-default"> 
					<div class="panel-body">
						<table id="datatable1" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
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
								$professions = $this->db->get('profession')->result_array(); 
								foreach ($professions as $row):
							?>
								<tr>
									<td><?php echo $count++; ?></td>
									<td><?php echo html_escape($row['name']); ?></td>
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
													<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_profession/<?php echo $row['profession_id']; ?>');">
														Edit
													</a>
												</li>
												<li>
													<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>profession_settings/remove/<?php echo $row['profession_id']; ?>');" >
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
			
			<div class="col-lg-4">
				<div class="panel panel-default">
	                <div class="panel-heading" align="center">Add New Profession Name | Form</div>
	                <div class="panel-body">
						<?php echo form_open('profession_settings/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
	                        <div class="form-group">
	                            <label>Name</label>
	                            <input type="text" name="name" placeholder="Enter profession name" class="form-control" required>
	                        </div>
	                        
	                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
	                    <?php echo form_close(); ?>
	                </div>
	            </div>
			</div>
		</div>
	</div>
</div>
