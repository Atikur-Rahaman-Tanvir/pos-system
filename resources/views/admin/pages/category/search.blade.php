<table class="table lms_table_active3 " id="data_table">
    <thead>
        <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
    </thead>

    <tbody id="table_body">
        @foreach ($categorys as $category)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if ($category->status == 0)
                        <span class="badge badge-danger">Pending</span>
                    @else
                        <span class="badge badge-success">Active</span>
                    @endif
                </td>

                <td>
                    <div class="action_btns d-flex">


                        <a id="{{ $category->id }}" class="action_btn mr_10 status "> <i
                                class="{{ $category->status == 0 ? 'far fa-eye-slash' : 'fa fa-eye' }}"></i>
                        </a>

                        <a id="{{ $category->id }}" class="action_btn mr_10 edit " data-bs-toggle="modal"
                            data-bs-target="#edit_modal"> <i class="far fa-edit"></i> </a>


                        <a id="{{ $category->id }}" class="action_btn delete" data-bs-toggle="modal"
                            data-bs-target="#delete_modal">
                            <i class="fas fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
