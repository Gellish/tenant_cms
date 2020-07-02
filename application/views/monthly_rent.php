<div class="content-wrapper">
    <h3>Rents
        <small>Showing Rents of <?php echo date('F') . ', ' . date('Y'); ?></small>
    </h3>
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tenant Name</th>                        
                                <th>Bed Number</th>
                                <th>Amount</th>
                                <th>Advance</th>
                                <th>Status</th>
                                <th>Created On</th>
                                <th>Created By</th>
                                <th>Updated On</th>
                                <th>Updated By</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $this->db->order_by('timestamp', 'desc');
                            $bill_info = $this->db->get_where('tenant_rent', array('month' => date('F'), 'year' => date('Y')))->result_array();
                            foreach ($bill_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td>
									<a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo html_escape('Mobile Number: ' . $this->db->get_where('tenant', array('tenant_id' => $row['tenant_id']))->row()->mobile_number); ?>">
										<?php echo html_escape($this->db->get_where('tenant', array('tenant_id' => $row['tenant_id']))->row()->name); ?>
									</a>
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
											echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content . ' ' . $row['advance']; 
										else
											echo 'N/A';
									?>
                                </td>                                
                                <td>
                                <?php if ($row['status'] == 0): ?>
                                    <span class="btn btn-xs btn-oval btn-warning">Due</span>
                                <?php endif; ?>
                                <?php if ($row['status'] == 1): ?>
                                    <span class="btn btn-xs btn-oval btn-primary">Paid</span>
                                <?php endif; ?>
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
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Select Year and Month to Show Rents</div>
                <div class="panel-body">
                    <?php echo form_open('single_month_rent', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Year</label>
                            <div>
                                <select class="chosen-select input-md" name="year" required>
									<option value="">Select Year</option>
                                    <option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
                                    <option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
                                    <option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
                                    <option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
                                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                                    <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                                    <option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
                                    <option value="<?php echo date('Y') + 4; ?>"><?php echo date('Y') + 4; ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Month</label>
                            <div>
                                <select class="chosen-select input-md" name="month" required>
									<option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-block btn-primary">Show</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="panel widget">
                <div class="panel-body bg-warning">
                    <div class="row row-table row-flush">
                        <div class="col-xs-8">
                            <p class="mb0">
                                Due Rents of <?php echo date('F') . ', ' . date('Y'); ?>
                            </p>
                            <h3 class="m0">
                                <?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?> 
                                <?php
                                    $this->db->select_sum('amount');
                                    $this->db->from('tenant_rent');
                                    $this->db->where('status', 0);
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    
                                    $due_amount = $query->row()->amount;
                                    
                                    $this->db->select_sum('advance');
                                    $this->db->from('tenant_rent');
                                    $this->db->where('status', 0);
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    
                                    $due_advance = $query->row()->advance;
									
                                    echo $due_amount + $due_advance;
                                ?>
                            </h3>
                        </div>
                        <div class="col-xs-4 text-right">
                            <em class="fa fa-money fa-2x"></em>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel widget">
                <div class="panel-body bg-primary">
                    <div class="row row-table row-flush">
                        <div class="col-xs-8">
                            <p class="mb0">
                                Total Rents of <?php echo date('F') . ', ' . date('Y'); ?>
                            </p>
                            <h3 class="m0">
                                <?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?> 
                                <?php
                                    $this->db->select_sum('amount');
                                    $this->db->from('tenant_rent');
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    
                                    $total_amount = $query->row()->amount;
                                    
                                    $this->db->select_sum('advance');
                                    $this->db->from('tenant_rent');
                                    $this->db->where('month', date('F'));
                                    $this->db->where('year', date('Y'));
                                    $query = $this->db->get();
                                    
                                    $total_advance = $query->row()->advance;
									
                                    echo $total_amount + $total_advance;
                                ?>
                            </h3>
                        </div>
                        <div class="col-xs-4 text-right">
                            <em class="fa fa-credit-card fa-2x"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
