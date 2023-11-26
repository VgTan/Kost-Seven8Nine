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
                <div class="branch-count">
                    <p>{{ COUNT($user) }}</p>
                    <span>User(s)</span>
                </div>
                <div class="room-count">
                    <p>{{ COUNT($book) }}</p>
                    <span>Book List(s)</span>
                </div>
            </div>
            <div class="user">
                <form class="function" action="">
                    @csrf
                    <p>Filter</p>
                    <p>Search</p>
                    <!-- <div class="form">
                        <input type="search" required>
                        <i class="fa fa-search"></i>
                        <a href="javascript:void(0)" id="clear-btn">Clear</a>
                    </div> -->
                </form>
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
                                    <button type="submit">Done</button>
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
</body>

</html>