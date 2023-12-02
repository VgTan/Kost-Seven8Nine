<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/check.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">
</head>

<body>
    @include('admin.navbar')
    <div class="container">
        <div class="container-size">
            <div class="details">
                <div class="branch-count">
                    <p>{{ COUNT($user) }}</p>
                    <span>User(s)</span>
                </div>
                <div class="room-count">
                    <p>{{ COUNT($token) }}</p>
                    <span>Transaction(s)</span>
                </div>
            </div>
            <div class="user">
                <form class="function" action="">
                    @csrf
                    <div class="filterForm">
                        <p>Filter
                            <select id="timeFilter" onchange="applyTimeFilter()">
                                <option value="oldest">Oldest</option>
                                <option value="newest">Newest</option>
                            </select>
                        </p>
                    </div>
                    <div class="searchForm">
                        <p>Search</p>
                        <div class="form">
                            <input type="search" id="searchInput" oninput="searchTable()">
                            <i class="fa fa-search"></i>
                            <a href="javascript:void(0)" id="clear-btn" onclick="clearSearch()">Clear</a>
                        </div>
                    </div>
                    <!-- <div class="form">
                        <input type="search" required>
                        <i class="fa fa-search"></i>
                        <a href="javascript:void(0)" id="clear-btn">Clear</a>
                    </div> -->
                </form>
                <form action="table-form">
                    <table class="user-table">
                        <tr class="table-head">
                            <th class="input-head">Time</th>
                            <th>Name</th>
                            <th>Bundle</th>
                            <th>Price</th>
                            <th>Proof</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($token as $user)
                        @if($user->status == 'Unpaid')
                        <tr class="table-content">
                            <td class="input-content">
                                {{ $user->created_at }}
                            </td>
                            <td>
                                <div class="user-name">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>
                                <div class="user-name">
                                    {{ $user->bundle }}
                                </div>
                            </td>
                            <td>
                                <div class="user-name">
                                    {{ $user->price }}
                                </div>
                            </td>
                            <td class="proof">
                                <a target="_blank" href='/images/proof/{{ $user->proof }}'>
                                    <img class="proof-img" src='/images/proof/{{ $user->proof }}' alt="">
                                </a>
                            </td>
                            <form action="{{ route('remove') }}" method="get">
                                <input class="hidden" name="id" type="text" value="{{ $user->id }}">
                                <td>
                                    <i class="fa-solid fa-trash"><button type="submit"></button></i>
                                </td>
                            </form>
                            <form action="{{ route('acc') }}" method="get">
                                <input class="hidden" name="id" type="text" value="{{ $user->id }}">
                                <td>
                                    <i class="fa-solid fa-check-to-slot"><button type="submit"></button></i>
                                </td>
                            </form>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        function applyTimeFilter() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.querySelector(".user-table");
            switching = true;

            var sortOrder = document.getElementById("timeFilter").value === "newest" ? -1 : 1;

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < rows.length - 1; i++) {
                    shouldSwitch = false;
                    x = rows[i].querySelector(".input-content");
                    y = rows[i + 1].querySelector(".input-content");

                    var dateX = new Date(x.textContent);
                    var dateY = new Date(y.textContent);

                    if (sortOrder === -1 ? dateX < dateY : dateX > dateY) {
                        shouldSwitch = true;
                        break;
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
            searchTable();
        }

        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector(".user-table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                var found = false;

                for (j = 1; j < tr[i].cells.length; j++) {
                    td = tr[i].cells[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;

                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }

                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

        function clearSearch() {
            document.getElementById("searchInput").value = "";
            searchTable();
        }
    </script>
</body>

</html>