        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>LB Test</h3>
                <strong>BS</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="<?php echo $this->config->base_url();?>user/index">
                        <i class="fas fa-home"></i>
                        Users
                    </a>
                    <a href="<?php echo $this->config->base_url();?>student/index">
                        <i class="fas fa-briefcase"></i>
                        Students
                    </a>
                </li>
            </ul>
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <a href="<?php echo $this->config->base_url();?>dashboard/logout" type="button" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </nav>