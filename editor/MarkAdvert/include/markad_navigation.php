        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Marketing & Adverts</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../../index.php">Web Site</a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="./changepass.php"><i class="fa fa-fw fa-user"></i> Change Password</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../../editor/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news_dropdwon"><i class="fa fa-shopping-cart"></i>Advertisements<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news_dropdwon" class="collapse">
                            <li>
                                <a href="./adverts.php?source=adcust"><i class="fa fa-plus"></i> Add Customer</a>
                            </li>
                            <li>
                                <a href="./adverts.php?source=custrequest"><i class="fa fa-user"></i> Customer Request</a>
                            </li>
                            <li>
                                <a href="./adverts.php?source=running"><i class="fa fa-spinner"></i> Running Adverts</a>
                            </li>
                            <li hidden="true">
                                <a href="./adverts.php?source=pendingad"><i class="fa fa-calendar-o"></i> Pending Adverts</a>
                            </li>
                            <li hidden="true">
                                <a href="./adverts.php?source=suspended"><i class="fa fa-pause"></i>Suspended Adverts</a>
                            </li>
                            <li>
                                <a href="./adverts.php?source=pastad"><i class="fa fa-archive"></i> Past Adverts</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="./adverts.php?source=allclients"><i class="fa fa-user"></i> Advertisement Clients </a>
                    </li>

                    <li>
                        <a href="./advertpack.php"><i class="fa fa-fw fa-wrench"></i> Advert Packages </a>
                    </li>
                    
                    <li>
                        <a href="./profile.php"><i class="fa fa-fw fa-wrench"></i> Profile </a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>