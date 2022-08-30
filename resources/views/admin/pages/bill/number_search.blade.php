
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
                             <a id="{{ $order->id }}" class="action_btn mr_10 invoice" data-bs-toggle="modal"
                                 data-bs-target="#myModal">
                                 <i class="fa fa-eye"></i>
                             </a>
                             <a id="{{ $order->id }}" class="action_btn delete" data-bs-toggle="modal"
                                 data-bs-target="#delete_modal">
                                 <i class="fas fa-trash"></i> </a>
                         </div>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
