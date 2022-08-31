  <div class="col-xl-12">
      <div class="white_card  mb_30">

          <div class="white_card_body  p-4">
              <div class="row">
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Total Bill</h6>
                          <h3><span class="counter">{{ $supplyers->count() }}</span> </h3>
                          <h6>$<span class="counter">{{ $supplyers->sum('total') }}</span> </h6>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Paid</h6>
                          <h3><span class="counter">{{ $supplyers->where('status', 'paid')->count() }}</span>
                          </h3>
                          <h6>$<span class="counter">{{ $supplyers->where('status', 'paid')->sum('payment') }}</span>
                          </h6>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Unpaid</h6>
                          <h3><span class="counter">{{ $supplyers->where('status', 'unpaid')->count() }}</span>
                          </h3>
                          <h6>$<span class="counter">{{ $supplyers->where('status', 'unpaid')->sum('due') }}</span>
                          </h6>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Partial Paid</h6>
                          <h3><span class="counter">{{ $supplyers->where('status', 'partial paid')->count() }}</span>
                          </h3>
                          <h6>$<span
                                  class="counter">{{ $supplyers->where('status', 'partial paid')->sum('due') }}</span>(due)
                          </h6>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Total Payment</h6>
                          <h3>$<span class="counter">{{ $supplyers->sum('payment') }}</span></h3>
                      </div>
                  </div>
                  <div class="col-lg-2">
                      <div class="single_analite_content text-center">
                          <h6>Total Due</h6>
                          <h3>$<span class="counter">{{ $supplyers->sum('due') }}</span></h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-lg-12">
      <div class="white_card card_height_100 mb_30">

          <div class="white_card_body">
              <div class="QA_section">

                  <div class="QA_table mb_30" id="">
                      <table class="table lms_table_active3 text-center">
                          <thead>
                              <tr>
                                  <th scope="col">Sl No</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Invoice No</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Contact Number</th>
                                  <th scope="col">Company Name</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Payment</th>
                                  <th scope="col">Due</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>

                              </tr>
                          </thead>

                          <tbody id="table_body">
                              @foreach ($supplyers as $supplyer)
                                  <tr>
                                      <td>{{ $loop->index + 1 }}</td>
                                      <td>{{ $supplyer->created_at->format('d M Y') }}</td>
                                      <td>{{ $supplyer->invoice_no }}</td>
                                      <td>{{ $supplyer->name }}</td>
                                      <td>{{ $supplyer->number }}</td>
                                      <td>{{ $supplyer->company_name }}</td>
                                      <td>${{ $supplyer->total }}</td>
                                      @if (is_null($supplyer->payment))
                                          <td>$0</td>
                                      @else
                                          <td>{{ $supplyer->payment }}</td>
                                      @endif
                                      <td>${{ $supplyer->due }}</td>
                                      <td class="">
                                          @if ($supplyer->status == 'paid')
                                              <span
                                                  class="badge bg-success text-uppercase">{{ $supplyer->status }}</span>
                                          @elseif ($supplyer->status == 'unpaid')
                                              <span
                                                  class="badge bg-danger text-uppercase">{{ $supplyer->status }}</span>
                                          @else
                                              <span
                                                  class="badge bg-info  text-uppercase">{{ $supplyer->status }}</span>
                                          @endif
                                      </td>
                                      <td>
                                          <div class="action_btns d-flex">
                                              <a id="{{ $supplyer->id }}" class="action_btn mr_10 edit "
                                                  data-bs-toggle="modal" data-bs-target="#edit_modal"> <i
                                                      class="far fa-edit"></i> </a>


                                              <a id="{{ $supplyer->id }}" class="action_btn delete"
                                                  data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                  <i class="fas fa-trash"></i> </a>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
