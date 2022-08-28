   <h5 class="show_date">{{$show_date}}</h5>
 <table class="table  text-center">
     <thead>
         <tr>
             <th scope="col">Sl No</th>
             <th scope="col">Date</th>
             <th scope="col">Quentity</th>
             <th scope="col">Purchasing Total</th>
             <th scope="col">Grand Total</th>
             <th scope="col">Calculation</th>
         </tr>
     </thead>

     <tbody id="table_body">
         @foreach ($orders as $order)
             <tr>
                 <td>{{ $loop->index + 1 }}</td>
                 <td>{{ $order->day }}</td>
                 <td>{{ $order->product_quentity }}</td>
                 <td>${{ $order->purchasing_total }}</td>
                 <td>${{ $order->grand_total }}</td>
                 @if ($order->grand_total > $order->purchasing_total)
                     <td>${{ $order->grand_total - $order->purchasing_total }} <span class="badge bg-success text-white">
                             Profit</span></td>
                 @else
                     <td>${{ $order->purchasing_total - $order->grand_total }} <span class="badge bg-danger text-white">
                             lose</span></td>
                 @endif
             </tr>
         @endforeach
         @if ($orders->sum('grand_total') != 0)
             <tr>
                 <td colspan="2"><span class="text-danger">Total</span></td>
                 <td><span class="text-danger">{{ $orders->sum('product_quentity') }}</span></td>
                 <td><span class="text-danger">${{ $orders->sum('purchasing_total') }}</span></td>
                 <td><span class="text-danger">${{ $orders->sum('grand_total') }}</span></td>
                 @if ($orders->sum('grand_total') > $orders->sum('purchasing_total'))
                     <td><span
                             class="text-danger">${{ $orders->sum('grand_total') - $orders->sum('purchasing_total') }}</span>
                         <span class="badge bg-success text-white"> Profit</span></td>
                 @else
                     <td><span
                             class="text-danger">${{ $orders->sum('purchasing_total') - $orders->sum('grand_total') }}</span>
                         <span class="badge bg-danger text-white"> lose</span></td>
                 @endif
             </tr>
         @endif
     </tbody>
 </table>
