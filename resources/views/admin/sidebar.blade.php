        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">



                    <li class="<?php echo $page_title=="admin Dashboard" ? 'active-link':'' ?>">
                        <a href="{{ url("admin") }}" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>


                    <li class="<?php echo $page_title=="posts" ? 'active-link' : '' ?>">
                        <a href="{{ url("admin/posts") }}"><i class="fa fa-table "></i>Posts  <span class="badge">Included</span></a>
                    </li>
                    <li class="<?php echo $page_title=="categories" ? 'active-link' : '' ?>">
                        <a href="{{ url("admin/categories") }}"><i class="fa fa-table "></i>Categorires  <span class="badge">Included</span></a>
                    </li>

                    <li class="<?php echo $page_title=="users" ? 'active-link' : '' ?>">
                        <a href="{{ url("admin/users") }}"><i class="fa fa-table "></i>Users  <span class="badge">Included</span></a>
                    </li>


                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
