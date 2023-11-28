<div>
    <form wire:submit.prevent="">
        <!-- <p>Filter</p> -->
        <!-- <p>Search</p> -->
        <div class="form">
            <input type="text" wire:model.lazy="search">
            <i class="fa fa-search"></i>
            <!-- <a href="javascript:void(0)" id="clear-btn">Clear</a> -->
        </div>
        <table class="styled-table">
            <thead>
                <tr class="table-head">
                    <!-- <th class="input-head">No</th> -->
                    <th class="head-content name">Name</th>
                    <th class="head-content">Gender</th>
                    <th class="head-content">Email</th>
                    <th class="head-content">Address</th>
                    <th class=""></th>
                    <th class=""></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="table-content">
                    <!-- <td class="input-content">
                        <input class="id" type="text" name="user_id" value="{{ $user->id }}" disabled>
                    </td> -->
                    <td class="head-content">
                        <div class="user-name">
                            <img class="user-img" src="/images/users/{{ $user->img }}" alt="">
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="head-content">
                        {{ $user->gender }}
                    </td>
                    <td class="head-content">
                        {{ $user->email }}
                    </td>
                    <td class="head-content">
                        {{ $user->address }}
                    </td>
                    <td class="head-content">
                        <a href="">Edit</a>
                    </td>
                    <td class="head-content">
                        <a href="">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </form>
</div>