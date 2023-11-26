<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/user.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    @include('admin.navbar')
    <div class="container">
        <div class="container-size">
            <div class="details">
                <div class="branch-count">
                    <p>{{ COUNT($branch) }}</p>
                    <span>Branch(es)</span>
                </div>
                <div class="room-count">
                    <p>{{ COUNT($branchroom) }}</p>
                    <span>Room(s)</span>
                </div>
                <div class="user-count">
                    <p>{{ COUNT($user) }}</p>
                    <span>User(s)</span>
                </div>
            </div>
            <div class="user">
                <form class="function" action="{{ route('search') }}">
                    <!-- <p>Filter</p> -->
                    <!-- <p>Search</p> -->
                    <div class="form">
                        <input type="search" required>
                        <button type="submit"><i class="fa fa-search"></i></button> 
                        <!-- <a href="javascript:void(0)" id="clear-btn">Clear</a> -->
                    </div>

                </form>
                <form action="table-form">
                    <table class="user-table">
                        <tr class="table-head">
                            <th class="input-head"><input type="checkbox"></th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($user as $user)
                        <tr class="table-content">

                            <td class="input-content">
                                <input type="checkbox">
                                <input class="id" type="text" name="user_id" value="{{ $user->id }}" disabled>
                            </td>
                            <td>
                                <div class="user-name">
                                    <img class="user-img" src="/images/users/{{ $user->img }}" alt="">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>
                                {{ $user->gender }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->address }}
                            </td>
                            <td>
                                <a href="">Edit</a>
                            </td>
                            <td>
                                <a href="">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>