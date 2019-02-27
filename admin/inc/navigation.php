<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="../index.php"><i class="fa fa-fw fa-globe"></i> Frontend</a>
        </li>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i
                        class="fa fa-fw fa-file-text-o"></i>
                    Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts" class="collapse">
                    <li>
                        <a href="posts.php">View all</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_post">Add</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-tags"></i> Categories</a>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-fw fa-comments"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i>
                    Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="#">View all</a>
                    </li>
                    <li>
                        <a href="#">Add</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>




<!--
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b
            class="caret"></b></a>
    <ul class="dropdown-menu alert-dropdown">
        <li>
            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
        </li>
        <li>
            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
        </li>
        <li>
            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
        </li>
        <li>
            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
        </li>
        <li>
            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
        </li>
        <li>
            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">View All</a>
        </li>
    </ul>
</li>
         -->