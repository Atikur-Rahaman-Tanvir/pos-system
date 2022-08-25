<table class="table lms_table_active3 text-center">
    <thead>
        <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">purchasing Price</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Selling Quentity</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
    </thead>

    <tbody id="table_body">
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><img width="50" src="{{ asset('storage/product_image/' . $product->image) }}" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->purchasing_price }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->quentity }}</td>
                <td>{{ $product->sell_quentity }}</td>
                <td>
                    @if ($product->status == 0)
                        <span class="badge badge-danger">Pending</span>
                    @else
                        <span class="badge badge-success">Active</span>
                    @endif
                </td>

                <td>
                    <div class="action_btns d-flex">


                        <a id="{{ $product->id }}" class="action_btn mr_10 status "> <i
                                class="{{ $product->status == 0 ? 'far fa-eye-slash' : 'fa fa-eye' }}"></i>
                        </a>

                        <a id="{{ $product->id }}" class="action_btn mr_10 edit " data-bs-toggle="modal"
                            data-bs-target="#edit_modal"> <i class="far fa-edit"></i> </a>


                        <a id="{{ $product->id }}" class="action_btn delete" data-bs-toggle="modal"
                            data-bs-target="#delete_modal">
                            <i class="fas fa-trash"></i> </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
