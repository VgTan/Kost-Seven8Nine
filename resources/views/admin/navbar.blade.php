<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/navbar.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="images/logo.png" alt=""></i>Rhapsodie
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
            <i class='bx bx-bell'></i>
            <img src="images/profile.jpg" alt="" class="profile" />
        </div>
    </nav>
    <nav class="sidebar hoverable close">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_dahsboard"></div>
                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <div href="/" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="/aboutus" class="nav_link sublink">About Us</a>
                        <a href="/contact" class="nav_link sublink">Contact</a>
                    </ul>
                </li>
                <!-- end -->
                <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-grid-alt"></i>
                        </span>
                        <span class="navlink">Overview</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="/dashboard" class="nav_link sublink"> <i class='bx bxs-user-circle' style="margin-right:8px;"></i> User</a>
                        <a href="{{ route('trans') }}" class="nav_link sublink"> <i class='bx bx-receipt' style="margin-right:8px;"></i>
                            Transaction</a>
                        <a href="{{ route('booklist') }}" class="nav_link sublink"> <i class='bx bxs-bookmarks' style="margin-right:8px;"></i>
                            Book</a>
                        <a href="{{ route('conadmin') }}" class="nav_link sublink"> <i class='bx bx-comment-dots' style="margin-right:8px;"></i>
                            Message</a>
                    </ul>
                </li>
                <li class="item">
                    <div href="/" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">History</span>
                        <i class="bx bx-chevron-right arrow-left"></i>
                    </div>
                    <ul class="menu_items submenu">
                        <a href="/transaction/log" class="nav_link sublink">Transcation</a>
                        <a href="/book/log" class="nav_link sublink">Book</a>
                    </ul>
                </li>
               
            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_editor"></div>
                <!-- duplicate these li tag if you want to add or remove navlink only -->
                <!-- Start -->
                <li class="item">
                    <a href="/addbranch" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bxs-buildings'></i>
                        </span>
                        <span class="navlink">Add Branch</span>
                    </a>
                </li>
                <!-- End -->
                <li class="item">
                    <a href="/addroom" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bx-image-add'></i>
                        </span>
                        <span class="navlink">Add Room</span>
                    </a>
                </li>
                <li class="item">
                    <a href="/addevent" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bx-calendar-event'></i>
                        </span>
                        <span class="navlink">Add Event</span>
                    </a>
                </li>
                <li class="item">
                    <a href="/addschedule" class="nav_link">
                        <span class="navlink_icon">
                            <i class='bx bx-calendar-edit'></i>
                        </span>
                        <span class="navlink">Edit Schedule</span>
                    </a>
                </li>
            </ul>
            <ul class="menu_items">
                <div class="menu_title menu_setting"></div>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-flag"></i>
                        </span>
                        <span class="navlink">Notice board</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-medal"></i>
                        </span>
                        <span class="navlink">Award</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-cog"></i>
                        </span>
                        <span class="navlink">Setting</span>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-layer"></i>
                        </span>
                        <span class="navlink">Features</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Open / Close -->
            <a href="/logout" class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span>Logout</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span>Logout</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </a>
        </div>
    </nav>
    <!-- JavaScript -->
    <script>
    const body = document.querySelector("body");
    const darkLight = document.querySelector("#darkLight");
    const sidebar = document.querySelector(".sidebar");
    const submenuItems = document.querySelectorAll(".submenu_item");
    const sidebarOpen = document.querySelector("#sidebarOpen");
    const sidebarClose = document.querySelector(".collapse_sidebar");
    const sidebarExpand = document.querySelector(".expand_sidebar");
    sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

    sidebarClose.addEventListener("click", () => {
        sidebar.classList.add("close", "hoverable");
    });
    sidebarExpand.addEventListener("click", () => {
        sidebar.classList.remove("close", "hoverable");
    });

    sidebar.addEventListener("mouseenter", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.remove("close");
        }
    });
    sidebar.addEventListener("mouseleave", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.add("close");
        }
    });

    darkLight.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            document.setI
            darkLight.classList.replace("bx-sun", "bx-moon");
        } else {
            darkLight.classList.replace("bx-moon", "bx-sun");
        }
    });

    submenuItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            item.classList.toggle("show_submenu");
            submenuItems.forEach((item2, index2) => {
                if (index !== index2) {
                    item2.classList.remove("show_submenu");
                }
            });
        });
    });

    if (window.innerWidth < 768) {
        sidebar.classList.add("close");
    } else {
        sidebar.classList.remove("close");
    }
    </script>
</body>

</html>