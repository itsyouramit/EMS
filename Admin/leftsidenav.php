<?php
error_reporting(0);

?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">EMS</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Departments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="all_department.php">See All</a>

                        <?php if($_SESSION["ROLE"] == 1){ ?>
                            <a class="nav-link" href="add_department.php">Create New</a>
                        <?php } ?>

                        
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Roles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                </a>


                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="department_role.php">Department Role</a>

                        <?php if($_SESSION["ROLE"] == 1){ ?>
                            <a class="nav-link" href="new_role.php">Create New Role</a>
                        <?php } ?>

                        

                    <!--    
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Department Roles
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">

                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.php">Login</a>
                                <a class="nav-link" href="register.php">Register</a>
                                <a class="nav-link" href="password.php">Forgot Password</a>
                            </nav>
                       
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                             Create New Role
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne1" data-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.php">401 Page</a>
                                <a class="nav-link" href="404.php">404 Page</a>
                                <a class="nav-link" href="500.php">500 Page</a>
                            </nav>
                        </div>    
                    -->

                    </nav>
                </div>

                
                
                <div class="sb-sidenav-menu-heading">Admin</div>

                <?php if($_SESSION["ROLE"] == 1){ ?>
                    <a class="nav-link" href="create_emp.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Create New Employee
                    </a>
                <?php } ?>



                <a class="nav-link" href="all_emp.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Table
                </a>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>