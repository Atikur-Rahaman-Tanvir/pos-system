 <div class="QA_table mb_30" id="data_table">
     <h6 class="bg-danger text-white p-2" style="width: 150px;display:inline-block">Totla Bill : <span
             class="badge">${{ $orders->count() }}</span></h6>
     <h6 class="bg-success text-white p-2" style="width: 250px;display:inline-block">Purchasing Total : <span
             class="badge">${{ $orders->sum('purchasing_total') }}</span></h6>
     <h6 class="bg-primary text-white p-2" style="width: 250px;display:inline-block">Selling Total : <span
             class="badge">${{ $orders->sum('grand_total') }}</span></h6>

     @if ($orders->sum('grand_total') < $orders->sum('purchasing_total'))
         <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">Loss : <span
                 class="badge">${{ $orders->sum('purchasing_total') - $orders->sum('grand_total') }}</span></h6>

     @elseif ($orders->sum('grand_total') == $orders->sum('purchasing_total'))
         <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">No profit No loss</span></h6>
     @else
         <h6 class="bg-danger text-white p-2" style="width: 200px;display:inline-block">Profit : <span
                 class="badge">${{ $orders->sum('grand_total') - $orders->sum('purchasing_total') }}</span></h6>
     @endif
     <table class="table lms_table_active3 text-center">
         <thead>
             <tr>
                 <th scope="col">Sl No</th>
                 <th scope="col">Date</th>
                 <th scope="col">Invoice No</th>
                 <th scope="col">Quentity</th>
                 <th scope="col">Sub Total</th>
                 <th scope="col">Discount</th>
                 <th scope="col">Grand Total</th>
                 <th scope="col">Action</th>
             </tr>
         </thead>

         <tbody id="table_body">
             @foreach ($orders as $order)
                 <tr>
                     <td>{{ $loop->index + 1 }}</td>
                     <td>{{ $order->created_at->format('d M Y') }}</td>
                     <td>#{{ $order->invoice_no }}</td>
                     <td>{{ $order->product_quentity }}</td>
                     <td>{{ $order->sub_total }}</td>
                     <td>{{ $order->discount }}</td>
                     <td>{{ $order->grand_total }}</td>


                     <td>
                         <div class="action_btns d-flex">


                             <a id="{{ $order->id }}" class="action_btn mr_10 status "> <i class="fa fa-eye"></i>
                             </a>

                             <a id="{{ $order->id }}" class="action_btn mr_10 edit " data-bs-toggle="modal"
                                 data-bs-target="#edit_modal"> <i class="far fa-edit"></i> </a>


                             <a id="{{ $order->id }}" class="action_btn delete" data-bs-toggle="modal"
                                 data-bs-target="#delete_modal">
                                 <i class="fas fa-trash"></i> </a>
                         </div>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>
