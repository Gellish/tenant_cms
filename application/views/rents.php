<div class="content-wrapper">
    <h3>Rents
        <small>Showing All Rents</small>
    </h3>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tenant Name</th>                           
                                <th>Month</th>
                                <th>Year</th>
                                <th>Status</th>
                                <th>Bed Number</th>
                                <th>Amount</th>
                                <th>Advance</th>
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
                            $bill_info = $this->db->get('tenant_rent')->result_array();
                            foreach ($bill_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo html_escape('Mobile Number: ' . $this->db->get_where('tenant', array('tenant_id' => $row['tenant_id']))->row()->mobile_number); ?>">
										<?php echo html_escape($this->db->get_where('tenant', array('tenant_id' => $row['tenant_id']))->row()->name); ?>
									</a>
                                </td>                                
                                <td><?php echo html_escape($row['month']); ?></td>
                                <td><?php echo html_escape($row['year']); ?></td>
                                <td>
                                <?php if ($row['status'] == 0): ?>
                                    <span class="btn btn-xs btn-oval btn-warning">Due</span>
                                <?php endif; ?>
                                <?php if ($row['status'] == 1): ?>
                                    <span class="btn btn-xs btn-oval btn-primary">Paid</span>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $bed_id 		=  $this->db->get_where('tenant', array('tenant_id' => $row['tenant_id']))->row()->bed_id;
                                        if ($bed_id > 0) {
											$bed_number 	= $this->db->get_where('bed', array('bed_id' => $bed_id))->row()->bed_number;
											$room_id 		= $this->db->get_where('bed', array('bed_id' => $bed_id))->row()->room_id;
											$room_number	= $this->db->get_where('room', array('room_id' => $room_id))->row()->room_number;
											echo html_escape('#' . $bed_number . ' of the room ' . $room_number);
										} else {
											echo 'N/A';
										}                                        
                                    ?>
                                </td>
                                <td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
									<?php echo html_escape($row['amount']); ?>
                                </td>
                                <td>
									<?php
										if ($row['advance'] > 0)
											echo html_escape($this->db->get_where('setting', array('name' => 'currency'))->row()->content . ' ' .$row['advance']); 
										else
											echo 'N/A';
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
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_tenant_rent/<?php echo $row['tenant_rent_id']; ?>');">
													Edit
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>rents/remove/<?php echo $row['tenant_rent_id']; ?>');" >
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
