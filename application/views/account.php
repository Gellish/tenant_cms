<div class="content-wrapper">
    <h3>Account
        <small>Showing Tenant Rents Status Overall</small>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="datatable1" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            $this->db->order_by('year', 'desc');
                            $this->db->select('month');
                            $this->db->select('year');
                            $this->db->distinct();
                            $bill_info = $this->db->get('tenant_rent')->result_array();
                            foreach ($bill_info as $row):
                        ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo html_escape($row['year']); ?></td>
                                <td><?php echo html_escape($row['month']); ?></td>
                                <td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                                    <?php
                                        $this->db->select_sum('amount');
                                        $this->db->from('tenant_rent');
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        
                                        $overall_amount = $this->db->get()->row()->amount;
                                        
                                        $this->db->select_sum('advance');
                                        $this->db->from('tenant_rent');
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        
                                        $overall_advance = $this->db->get()->row()->advance;
                                        
                                        echo $total = $overall_amount + $overall_advance;
                                    ?>
                                </td>
                                <td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                                    <?php
                                        $this->db->select_sum('amount');
                                        $this->db->from('tenant_rent');
                                        $this->db->where('status', 1);
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        
                                        $paid_amount = $this->db->get()->row()->amount;
                                        
                                        $this->db->select_sum('advance');
                                        $this->db->from('tenant_rent');
                                        $this->db->where('status', 1);
                                        $this->db->where('month', $row['month']);
                                        $this->db->where('year', $row['year']);
                                        
                                        $paid_advance = $this->db->get()->row()->advance;
                                        
                                        echo $paid  = $paid_amount + $paid_advance;
                                    ?>
                                </td>
                                <td>
									<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
									<?php echo $total - $paid; ?>
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
