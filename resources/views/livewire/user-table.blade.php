<div>
    <form class="function" wire:submit.prevent="">
        <i class="bx bx-search"></i>
        <input type="text" wire:model.lazy="search" placeholder="Search...">
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
            @foreach($users as $user)
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
        {{ $users->links() }}
    </form>
</div>