<div class="content-wrapper">
    <h3>Room
        <small>List of all Rooms</small>
    </h3>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Floor</th>
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
							$rooms = $this->db->get('room')->result_array();
							foreach ($rooms as $room):
						?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo html_escape('Remarks: ' . $room['remarks']); ?>">
										<?php echo html_escape($room['room_number']); ?>
									</a>
                                </td>
                                <td><?php echo html_escape($room['floor']); ?></td>
                                <td><?php echo date('d M, Y', $room['created_on']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $room['created_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $room['created_by']))->row()->staff_id;
											echo html_escape($this->db->get_where('staff', array('staff_id' => $staff_id))->row()->name); 
										}
									?>
                                </td>
                                <td><?php echo date('d M, Y', $room['timestamp']); ?></td>
                                <td>
									<?php
										$user_type =  $this->db->get_where('user', array('user_id' => $room['updated_by']))->row()->user_type;
										if ($user_type == 1) {
											echo 'Admin';
										} else {
											$staff_id = $this->db->get_where('user', array('user_id' => $room['updated_by']))->row()->staff_id;
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
												<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_edit_room/<?php echo $room['room_id']; ?>');">
													Edit
												</a>
											</li>
											<li>
												<a href="javascript:;" onclick="confirm_modal('<?php echo base_url(); ?>rooms/remove/<?php echo $room['room_id']; ?>');" >
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
