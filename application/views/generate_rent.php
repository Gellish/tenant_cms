<div class="content-wrapper">
    <h3>Rent
        <small>Generate Rent</small>
    </h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Generate Single Tenant Rent</div>
                <div class="panel-body">
					<?php echo form_open('generate_rent/single', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Tenant</label>
                            <div>
                                <select class="chosen-select input-md" name="tenant_id" required>
									<option value="">Select tenant</option>
								<?php
									$tenants = $this->db->get_where('tenant', array('status' => 1))->result_array();
									foreach ($tenants as $tenant):
								?>
                                    <option value="<?php echo html_escape($tenant['tenant_id']); ?>"><?php echo html_escape($tenant['name']); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div>
                                <select class="chosen-select input-md" name="status" required>
									<option value="">Select Status</option>
                                    <option value="0">Due</option>
                                    <option value="1">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Months</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="January" name="months[]" required>
                                           <span class="fa fa-check"></span>January
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="May" name="months[]">
                                           <span class="fa fa-check"></span>May
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="September" name="months[]">
                                           <span class="fa fa-check"></span>September
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="February" name="months[]">
                                           <span class="fa fa-check"></span>February
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="June" name="months[]">
                                           <span class="fa fa-check"></span>June
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="October" name="months[]">
                                           <span class="fa fa-check"></span>October
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="March" name="months[]">
                                           <span class="fa fa-check"></span>March
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="July" name="months[]">
                                           <span class="fa fa-check"></span>July
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="November" name="months[]">
                                           <span class="fa fa-check"></span>November
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="April" name="months[]">
                                           <span class="fa fa-check"></span>April
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="August" name="months[]">
                                           <span class="fa fa-check"></span>August
                                        </label>
                                    </div>
                                    <div class="checkbox c-checkbox">
                                        <label>
                                           <input type="checkbox" value="December" name="months[]">
                                           <span class="fa fa-check"></span>December
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <div>
                                <select class="chosen-select input-md" name="year" required>
									<option value="">Select year</option>
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
                            <label>Advance</label>
                            <div>
                                <input type="text" name="advance" placeholder="Enter advance amount" class="form-control">
                            </div>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Generate</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Generate Monthly Rents for All Active Tenants</div>
                <div class="panel-body">
					<?php echo form_open('generate_rent/monthly', array('method' => 'post', 'data-parsley-validate' => '')); ?>
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
                        
                        <button type="submit" class="mb-sm btn btn-primary">Generate</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
