<nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
    <div class="navbar-header">
        <a href="<?php echo base_url(); ?>" class="navbar-brand">
            <div class="brand-logo">
                <img src="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'logo'))->row()->content; ?>" alt="<?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?>" class="img-responsive">
            </div>
            <div class="brand-logo-collapsed">
                <img src="<?php echo base_url(); ?>uploads/website/<?php echo $this->db->get_where('setting', array('name' => 'favicon'))->row()->content; ?>" alt="<?php echo $this->db->get_where('setting', array('name' => 'system_name'))->row()->content; ?>" class="img-responsive">
            </div>
        </a>
    </div>
    <div class="nav-wrapper">
        <ul class="nav navbar-nav">
            <li>
                <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                    <em class="fa fa-navicon"></em>
                </a>
                <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                    <em class="fa fa-navicon"></em>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-list">
                <a href="#" data-toggle="dropdown" data-play="flipInX" class="dropdown-toggle">
                    <em class="fa fa-user"></em>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="list-group">
                            <a href="<?php echo base_url(); ?>profile_settings" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left">
                                        <em class="fa fa-cog text-info"></em>
                                    </div>
                                    <div class="media-body clearfix">
                                        <p class="m0">Profile Settings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="list-group">
                            <a href="<?php echo base_url(); ?>auth/logout" class="list-group-item">
                                <div class="media">
                                    <div class="pull-left">
                                        <em class="fa fa-sign-out text-info"></em>
                                    </div>
                                    <div class="media-body clearfix">
                                        <p class="m0">Logout</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
