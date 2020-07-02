<div class="content-wrapper">
    <h3>Tenant
        <small>List of all Tenants</small>
    </h3>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>ID</th>
                                <th>Bed</th>
                                <th>Emergency Person</th>
                                <th>Emergency Contact</th>
                                <th>Status</th>
                                <th>Updated On</th>
                                <th>Updated By</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
							$count = 1; 
							$this->db->order_by('timestamp', 'desc');
							$tenants = $this->db->get('tenant')->result_array();
							foreach ($tenants as $tenant):
						?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
									<div class="hover_img">
										<a href="#">
										<?php echo html_escape($tenant['name']); ?>
										<?php if ($tenant['image_link']): ?>
											<span><img src="<?php echo base_url(); ?>uploads/tenants/<?php echo html_escape($tenant['image_link']); ?>" alt="<?php echo html_escape($tenant['name']); ?>" class="img-thumbnail" /></span>
										<?php else: ?>
											<span><img src="<?php echo base_url(); ?>assets/tenant.jpg" alt="Tenant image not found" class="img-thumbnail" /></span>
										<?php endif; ?>
										</a>
									</div>
                                </td>
                                <td><?php echo html_escape($tenant['mobile_number']); ?></td>
                                <td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo  html_escape($tenant['id_number']); ?>">
										<?php echo html_escape($this->db->get_where('id_type', array('id_type_id' => $tenant['id_type_id']))->row()->name); ?>
									</a>
                                </td>
                                <td>
									<?php
										if ($tenant['bed_id'] > 0) {
											$bed_number 	= $this->db->get_where('bed', array('bed_id' => $tenant['bed_id']))->row()->bed_number;
											$room_id 		= $this->db->get_where('bed', array('bed_id' => $tenant['bed_id']))->row()->room_id;
											$room_number	= $this->db->get_where('room', array('room_id' => $room_id))->row()->room_number;
											echo html_escape('#' . $bed_number . ' of the room ' . $room_number); 
										} else {
											echo 'N/A';
										}										
									?>
                                </td>
                                <td><?php echo html_escape($tenant['emergency_person']); ?></td>
                                <td><?php echo html_escape($tenant['emergency_contact']); ?></td>
                                <td>
									<?php
										if ($tenant['status'])
											echo '<span class="btn btn-xs btn-oval btn-primary">Active</span>'; 
										else
											echo '<span class="btn btn-xs btn-oval btn-warning">Inactive</span>';
									?>
                                </td>
                                <td><?php echo date('d M, Y', $tenant['timestamp']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $tenant['updated_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $tenant['updated_by']))->row()->staff_id;
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
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_show_tenant_details/<?php echo $tenant['tenant_id']; ?>');">
													Details
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_change_tenant_image/<?php echo $tenant['tenant_id']; ?>');">
													Change Image
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_tenant/<?php echo $tenant['tenant_id']; ?>');">
													Edit
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>tenants/remove/<?php echo $tenant['tenant_id']; ?>');" >
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

<style>
	.hover_img a { position:relative; }
	.hover_img a span { position: absolute; display:none; z-index:99; }
	.hover_img a:hover span { display:block; }
</style>
