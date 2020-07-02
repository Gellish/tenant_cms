<div class="content-wrapper">
    <h3>Tenant
        <small>Add New Tenant</small>
    </h3>
    <!-- START row-->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
			<?php if ($this->session->flashdata('unsuccessful')): ?>
			<div class="alert alert-warning" align="center">
				<?php echo $this->session->flashdata('unsuccessful'); ?>
			</div>
			<?php endif; ?>
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Tenant | Form</div>
                <div class="panel-body">
					<?php echo form_open_multipart('tenants/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input autofocus type="text" name="name" placeholder="Enter name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ID Type</label>
                            <div>
                                <select class="chosen-select input-md" name="id_type_id" required>
                                    <option value="">Select ID Type</option>
                                <?php
									$id_types = $this->db->get('id_type')->result_array();
									foreach ($id_types as $id_type):
                                ?>
									<option value="<?php echo html_escape($id_type['id_type_id']); ?>"><?php echo html_escape($id_type['name']); ?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ID</label>
                            <input name="id_number" type="text" placeholder="Enter ID number" class="form-control" required>
                        </div>                        
                        <div class="form-group">
							<label>Image</label>
                            <input name="image_link" type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control" required>
                        </div>
                     
                        <div class="form-group">
                            <label>Home address</label>
                            <textarea style="resize: none" type="text" name="home_address" placeholder="Enter home address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Emergency person</label>
                            <input type="text" name="emergency_person" placeholder="Enter emergency person's mobile name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Emergency contact</label>
                            <input type="text" name="emergency_contact" placeholder="Enter emergency person's mobile number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Bed</label>
                            <div>
                                <select class="chosen-select input-md" name="bed_id" required>
                                    <option value="">Select bed</option>
                                <?php
									$beds = $this->db->get_where('bed', array('status' => 0))->result_array();
									foreach ($beds as $bed):
                                ?>
									<option value="<?php echo html_escape($bed['bed_id']); ?>"><?php echo html_escape('#' . $bed['bed_number'] . ' of the room ' . $this->db->get_where('room', array('room_id' => $bed['room_id']))->row()->room_number); ?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Profession</label>
                            <div>
                                <select class="chosen-select input-md" name="profession_id" required>
                                    <option value="">Select profession</option>
                                <?php
									$professions = $this->db->get('profession')->result_array();
									foreach ($professions as $profession):
                                ?>
									<option value="<?php echo html_escape($profession['profession_id']); ?>"><?php echo html_escape($profession['name']); ?></option>
								<?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Work address</label>
                            <textarea style="resize: none" type="text" name="work_address" placeholder="Enter work address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div>
                                <select class="chosen-select input-md" name="status" required>
									<option value="">Select status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Extra Note</label>
                            <textarea style="resize: none" type="text" name="extra_note" placeholder="Enter extra note" class="form-control"></textarea>
                        </div>
                  
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
    <!-- END row-->
</div>
