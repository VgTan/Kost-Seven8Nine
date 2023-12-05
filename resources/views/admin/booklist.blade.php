<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/check.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    @include('admin.navbar')
    <div class="container">
        <div class="container-size">
            <div class="details">
                <!-- <div class="branch-count">
                    <p>{{ COUNT($user) }}</p>
                    <span>User(s)</span>
                </div>
                <div class="room-count">
                    <p>{{ COUNT($book) }}</p>
                    <span>Book List(s)</span>
                </div> -->
                @foreach($branchBooks as $branch)
                <div class="room-count">
                    <p>{{ COUNT($branch) }}</p>
                    <span>{{ $branch->branch }} Book List(s)</span>
                </div>
                @endforeach

            </div>
            <div class="user">
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
                <div class="table-form">
                    <table class="user-table">
                        <tr class="table-head">
                            <th class="input-head">User</th>
                            <th>Branch</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($book as $booklist)
                        @if($booklist->status == 'in progress')
                        <tr class="table-content">
                            <!-- <td class="input-content">
                                {{ $booklist->created_at }}
                            </td> -->
                            <td>
                                <div class="user-name">
                                    {{ $booklist->name }}
                                </div>
                            </td>
                            <td class="">
                                {{ $booklist->branch }}
                            </td>
                            <td class="">
                                {{ $booklist->room }}
                            </td>
                            <td class="">
                                {{ $booklist->date }}
                            </td>
                            <td class="">
                                {{ $booklist->time }}
                            </td>
                            <td class="">
                                {{ $booklist->status }}
                            </td>
                            <!-- <form action="{{ route('remove') }}" method="get">
                            @csrf
                                <input class="hidden" name="id" type="text" value="{{ $booklist->id }}">
                                <td>
                                    <button type="submit">Remove</button>
                                </td>
                            </form> -->
                            <form action="{{ route('done') }}" method="get">
                                @csrf
                                <input class="hidden" name="id" type="text" value="{{ $booklist->id }}">
                                <td>
                                    <button class="done-btn" type="submit">Done</button>
                                </td>
                            </form>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
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