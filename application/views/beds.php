<div class="content-wrapper">
    <h3>Bed
        <small>List of all Beds</small>
    </h3>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bed Number</th>
                                <th>Room Number</th>
                                <th>Rent</th>
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
							$beds = $this->db->get('bed')->result_array();
							foreach ($beds as $bed):
						?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo html_escape('Remarks: ' . $bed['remarks']); ?>">
										<?php echo html_escape($bed['bed_number']); ?>
									</a>
                                </td>
                                <td><?php echo html_escape($this->db->get_where('room', array('room_id' => $bed['room_id']))->row()->room_number); ?></td>
                                <td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
									<?php echo html_escape($bed['rent']); ?>
                                </td>
                                <td>
									<?php
										if ($bed['status'])
											echo '<span class="btn btn-xs btn-oval btn-primary">Occupied</span>'; 
										else
											echo '<span class="btn btn-xs btn-oval btn-warning">Unoccupied</span>';
									?>
                                </td>
                                <td><?php echo date('d M, Y', $bed['created_on']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $bed['created_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $bed['created_by']))->row()->staff_id;
											echo html_escape($this->db->get_where('staff', array('staff_id' => $staff_id))->row()->name); 
										}
									?>
                                </td>
                                <td><?php echo date('d M, Y', $bed['timestamp']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $bed['updated_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $bed['updated_by']))->row()->staff_id;
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
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_bed/<?php echo $bed['bed_id']; ?>');">
													Edit
												</a>
											</li>
											<?php if (!$bed['status']): ?>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>beds/remove/<?php echo $bed['bed_id']; ?>');" >
													Remove
												</a>
											</li>
											<?php endif; ?>
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
