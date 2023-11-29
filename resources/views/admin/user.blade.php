<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/user.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">\
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN5P0t73vHcF5a5q2QST6uP05qFfFqEA" crossorigin="anonymous">
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
                
                    <!-- @livewire('user-table') -->
                
                <form class="function" action="">
                    <i class="bx bx-search"></i>
                    <input type="text" placeholder="Search...">
                    <span class="tooltip">Search</span>
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
                            <td class="edit">
                                <a href=""><i class="fa-solid fa-pen"></i></a>
                            </td>
                            <td class="remove">
                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>