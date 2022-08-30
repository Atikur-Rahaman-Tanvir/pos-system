  <h5 class="show_date">{{ $show_date }}</h5>
  <table class="table  text-center">
      <thead>
          <tr>
              <th scope="col">Sl No</th>
              <th scope="col">Date</th>
              <th scope="col">Amount</th>

          </tr>
      </thead>

      <tbody id="table_body">
          @foreach ($expenceses as $expencese)
              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $expencese->day }}</td>
                  <td>${{ $expencese->amount }}</td>
              </tr>
          @endforeach
          <tr style="text-align: center">
              <td></td>
              <td colspan=""><span class="text-danger" style="font-weight: bold">Total</span></td>
              <td style=""><span class="text-danger"
                      style="font-weight: bold">${{ $expencese->sum('amount') }}</span></td>
          </tr>
      </tbody>
  </table>
