  <h5 class="show_date">{{ $show_date }}</h5>
  <table class="table  text-center">
      <thead>
          <tr>
              <th scope="col">Sl No</th>
              <th scope="col">Date</th>
              <th scope="col">Quentity</th>
              <th scope="col">Grand Total</th>
              <th scope="col">Purchasing Total</th>
              <th scope="col">Expencese</th>
              <th scope="col">Calculation</th>
          </tr>
      </thead>

      <tbody id="table_body">
          @foreach ($orders as $key => $order)
              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>
                      @if ($order->day == 1)
                          Janary
                      @elseif ($order->day == 2)
                          February
                      @elseif ($order->day == 3)
                          March
                      @elseif ($order->day == 4)
                          April
                      @elseif ($order->day == 5)
                          May
                      @elseif ($order->day == 6)
                          Jun
                      @elseif ($order->day == 7)
                          July
                      @elseif ($order->day == 8)
                          Auguset
                      @elseif ($order->day == 9)
                          September
                      @elseif ($order->day == 9)
                          October
                      @elseif ($order->day == 10)
                          November
                      @elseif ($order->day == 11)
                          December
                      @endif
                  </td>

                  <td>{{ $order->product_quentity }} pcs</td>
                  <td>${{ $order->grand_total }}</td>
                  <td>${{ $order->purchasing_total }}</td>
                  <td>${{ App\Models\Expencese::select('amount')->whereMonth('created_at', $order->day)->sum('amount') }}
                  </td>

                  @if ($order->grand_total >
                      $order->purchasing_total +
                          App\Models\Expencese::select('amount')->whereMonth('created_at', $order->day)->sum('amount'))
                      <td>${{ $order->grand_total -($order->purchasing_total +App\Models\Expencese::select('amount')->whereMonth('created_at', $order->day)->sum('amount')) }}
                          <span class="badge bg-success text-white"> Profit</span></td>
                  @else
                      <td>${{ $order->purchasing_total +App\Models\Expencese::select('amount')->whereMonth('created_at', $order->day)->sum('amount') -$order->grand_total }}
                          <span class="badge bg-danger text-white"> lose</span></td>
                  @endif
              </tr>
          @endforeach
          @if ($orders->sum('grand_total') != 0)
              <tr>

                  <td colspan="2"><span class="text-danger">Total</span></td>
                  <td><span class="text-danger">{{ $orders->sum('product_quentity') }} pcs</span></td>
                  <td><span class="text-danger">${{ $orders->sum('grand_total') }}</span></td>
                  <td><span class="text-danger">${{ $orders->sum('purchasing_total') }}</span></td>

                  <td><span
                          class="text-danger">${{ App\Models\Expencese::select('amount')->whereYear('created_at', $show_date)->sum('amount') }}</span>
                  </td>

                  @if ($orders->sum('grand_total') >
                      $orders->sum('purchasing_total') +
                          App\Models\Expencese::select('amount')->whereYear('created_at', $show_date)->sum('amount'))
                      <td><span
                              class="text-danger">${{ $orders->sum('grand_total') -($orders->sum('purchasing_total') +App\Models\Expencese::select('amount')->whereYear('created_at', $show_date)->sum('amount')) }}</span>
                          <span class="badge bg-success text-white"> Profit</span></td>
                  @else
                      <td><span
                              class="text-danger">${{ $orders->sum('purchasing_total') +App\Models\Expencese::select('amount')->whereYear('created_at', $show_date)->sum('amount') -$orders->sum('grand_total') }}</span>
                          <span class="badge bg-danger text-white"> lose</span></td>
                  @endif
              </tr>
          @endif
      </tbody>
  </table>
