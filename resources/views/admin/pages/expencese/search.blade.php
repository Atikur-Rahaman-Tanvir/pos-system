 <div class="bg-success" style="width:220px; padding:10px">Total Expenceses : ${{$expenceses->sum('amount')}}</div>
<table class="table lms_table_active3 text-center">
    <thead>
        <tr>
            <th scope="col">Sl No</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>

        </tr>
    </thead>

    <tbody id="table_body">
        @foreach ($expenceses as $expencese)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $expencese->created_at->format('d M Y') }}</td>
                <td>{{ $expencese->name }}</td>
                <td>${{ $expencese->amount }}</td>
                <td>
                    <div class="action_btns d-flex">
                        <a id="{{ $expencese->id }}" class="action_btn mr_10 edit " data-bs-toggle="modal"
                            data-bs-target="#edit_modal"> <i class="far fa-edit"></i> </a>

                        <a id="{{ $expencese->id }}" class="action_btn delete" data-bs-toggle="modal"
                            data-bs-target="#delete_modal">
                            <i class="fas fa-trash"></i> </a>
                    </div>
                </td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
