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
                <button class="MainButt btn" data-bs-toggle="modal" data-bs-target="#Edit">Edit</button>
                <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditDealModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2><b>Coming soon :)</b></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        </tbody>
    @endforeach
</table>
