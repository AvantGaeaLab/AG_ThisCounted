<!--add new category -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Add new category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.store')}}"  method="post">
                    @csrf
                    <div class="form-group" >
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="MainButt btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END add new category -->
<!-- category list table -->
<h3>Categories list</h3>
<button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#categoryModal" >New category</button>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($categories as $key => $title)
        <tbody>
        <tr>
            <td>
                {{$key}}
            </td>
            <td>
                {{$title}}
            </td>
            <!-- Edit Category -->
            <td>
                <div class="row">
                    <div class="col-6" >
                        <a class="btn MainButt" data-bs-toggle="modal" data-bs-target="#EditCategory{{$key}}">Edit</a>
                    </div>
                    <div class="modal fade" id="EditCategory{{$key}}" tabindex="-1" aria-labelledby="EditCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="EditCategoryModalLabel">Edit Category <br> {{$title}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('categories.update', $key)}}"  method="post">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group" >
                                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$title}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="MainButt btn">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Category -->
                    <form class="col-6" method='post' action="{{route('categories.destroy', $key)}}">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want delete ({{$title}}) ?')" >Delete</a>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    @endforeach
</table>
<!-- END Category list table -->
