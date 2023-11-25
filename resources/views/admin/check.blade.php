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
                    <p>{{ COUNT($token) }}</p>
                    <span>Transaction(s)</span>
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
                <form action="table-form">
                    <table class="user-table">
                        <tr class="table-head">
                            <th class="input-head">Time</th>
                            <th>Name</th>
                            <th>Transaction</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($token as $user)
                        @if($user->status == 'pending')
                        <tr class="table-content">
                            <td class="input-content">
                                {{ $user->created_at }}</td>
                            <td>
                                <div class="user-name">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="proof">
                                <a target="_blank" href='/images/proof/{{ $user->proof }}'>
                                    <img class="proof-img" src='/images/proof/{{ $user->proof }}' alt="">
                                </a>
                            </td>
                            <form action="{{ route('remove') }}" method="get">
                            @csrf
                                <input class="hidden" name="id" type="text" value="{{ $user->id }}">
                                <td>
                                    <button type="submit">Remove</button>
                                </td>
                            </form>
                            <form action="{{ route('acc') }}" method="get">
                            @csrf
                                <input class="hidden" name="id" type="text" value="{{ $user->id }}">
                                <td>
                                    <button type="submit">Done</button>
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
</body>

</html>