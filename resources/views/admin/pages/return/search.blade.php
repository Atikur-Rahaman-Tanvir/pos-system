 <table class="table  text-center">
     <thead>
         <tr>
             <th scope="col">Sl No</th>
             <th scope="col">Date</th>
             <th scope="col">Invoice No</th>
             <th scope="col">Quentity</th>
             <th scope="col">Grand Total</th>
             <th scope="col">Purchasing Total</th>
             <th>Action</th>

         </tr>
     </thead>

     <tbody id="table_body">
         @foreach ($orders as $order)
             <tr>
                 <td>{{ $loop->index + 1 }}</td>
                 <td>{{ $order->created_at->format('d M Y') }}</td>

                 <td>#{{ $order->invoice_no }}</td>

                 <td>{{ $order->product_quentity }} pcs</td>
                 <td>${{ $order->grand_total }}</td>
                 <td>${{ $order->purchasing_total }}</td>
                 <a href="" class="btn btn-sm">Go To Return</a>
             </tr>
         @endforeach
     </tbody>
 </table>
