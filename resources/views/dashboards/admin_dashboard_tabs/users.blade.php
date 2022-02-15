<div>
    <a class="btn MainButt" href="{{route('UsersExport')}}">Download users list</a>
    <!-- Search Field -->
    <div class="mb-2" style="display: inline-block">
        <input wire:model.debounce.100ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search user...">
        <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="0">Descending</option>
            <option value="1">Ascending</option>
        </select>
        <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
        </select>
    </div>
    <!--END Search Field -->

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Orders count</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($users as $user)
            <tbody>
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phone_number}}
                </td>
                <td>
                    {{$user->orders->count()}}
                </td>
                <!-- Edit User -->
                <td>
                    <button class="MainButt btn" data-bs-toggle="modal" data-bs-target="#Edit{{$user->id}}">Edit</button>
                    <div class="modal fade" id="Edit{{$user->id}}" tabindex="-1" aria-labelledby="EditDealModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User <b>({{$user->name}})</b></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('users.update')}}"  method="post">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">User name</label>
                                        <input type="text" class="form-control" id="name" placeholder="User name" name="name" value="{{$user->name}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Email">User email</label>
                                        <input type="email" class="form-control" id="Email" placeholder="User email" name="email" value="{{$user->email}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone_number">User phone number</label>
                                        <input type="number" class="form-control" id="phone_number" placeholder="User phone number" name="phone_number" value="{{$user->phone_number}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">User password</label>
                                        <input type="password" class="form-control" id="password" placeholder="User phone number" name="password">
                                    </div>
                                        <hr>
                                        <button type="submit" class="btn MainButt">Update</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    {!! $users->links() !!}
</div>
