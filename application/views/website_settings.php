<div class="content-wrapper">
    <h3>Settings
        <small>Update website settings</small>
    </h3>
    
    <!-- START row-->
    <div class="row">
        <div class="col-sm-4">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update website settings | Form</div>
                <div class="panel-body">
					<?php echo form_open('website_settings/update', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Sytem Name</label>
                            <input value="<?php echo html_escape($this->db->get_where('setting', array('name' => 'system_name'))->row()->content); ?>" alt="<?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?>" type="text" name="system_name" placeholder="Enter system name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <div>
                                <select class="chosen-select input-md" name="currency" required>
                                    <option value="">Select currency</option>
                                <?php
									$currencies = $this->db->get('currency')->result_array();
									foreach ($currencies as $currency):
                                ?>
									<option <?php if ($this->db->get_where('setting', array('name' => 'currency'))->row()->content == $currency['code']) echo 'selected'; ?> value="<?php echo html_escape($currency['code']); ?>"><?php echo html_escape($currency['name']); ?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END panel-->
        </div>
        <div class="col-sm-4">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update Logo | Form</div>
                <div class="panel-body">
					<?php echo form_open_multipart('website_settings/update_logo', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
							<label>Logo Preview</label>
                            <img style="background: #0E1821" src="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>" alt="<?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?>" class="img-responsive">
                        </div>
                        <div class="well well-sm" align="center">
							Choose an image of the dimension 127 X 34
                        </div>
                        <div class="form-group">
							<label>Image</label>
                            <input name="logo" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" required>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END panel-->
            
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update Favicon | Form</div>
                <div class="panel-body">
					<?php echo form_open_multipart('website_settings/update_favicon', array('method' => 'post', 'data-parsley-validate' => '')); ?>               
                        <div class="form-group">
							<label>Favicon Preview</label>
                            <img style="width: 64px" src="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'favicon'))->row()->content; ?>" alt="<?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?>" class="img-responsive">
                        </div>
                        <div class="well well-sm" align="center">
							Choose an image of the dimension 64 X 64
                        </div>
                        <div class="form-group">
							<label>Image</label>
                            <input name="favicon" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" required>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END panel-->
        </div>
        <div class="col-sm-4">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Update website settings | Form</div>
                <div class="panel-body">
					<?php echo form_open('website_settings/update', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Tagline</label>
                            <input value="<?php echo html_escape($this->db->get_where('setting', array('name' => 'tagline'))->row()->content); ?>" type="text" name="tagline" placeholder="Enter tagline" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Timezone</label>
                            <div>
                                <select class="chosen-select input-md" name="timezone" required>
                                    <option value="">Select your timezone</option>
                                <?php
									$timezones =  DateTimeZone::listIdentifiers(DateTimeZone::ALL);
									foreach ($timezones as $timezone):
                                ?>
									<option <?php if ($this->db->get_where('setting', array('name' => 'timezone'))->row()->content == $timezone) echo 'selected'; ?> value="<?php echo html_escape($timezone); ?>"><?php echo html_escape($timezone); ?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
    <!-- END row-->
</div>
