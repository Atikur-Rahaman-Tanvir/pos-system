           @foreach ($category_products as $product)
                                    @if ($product->quentity > 0)
                                    <div class="col-md-3 mt-1">
                                        <a id="{{ $product->id }}" class="product">
                                            <div class="white_card position-relative mb_20 ">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/product_image/' . $product->image) }}"
                                                        alt="" class="d-block mx-auto " height="60">
                                                    <div class="row text-center ">
                                                        <div class="col-12">
                                                            <h6
                                                                class="f_w_400 color_text_3 f_s_14 d-block this_product_name">{{ $product->name }}
                                                            <h6>
                                                        </div>
                                                        <div class="col-12">
                                                            <h4 style="display: inline-block"
                                                                class="text-dark mt-0">
                                                                <small>${{ $product->selling_price }}</small>
                                                            </h4>
                                                            <span style="display: inline-block"
                                                                class="badge badge-sm bg-danger ml-3 product_stock" id="{{$product->id}}" >{{ $product->quentity }}</span>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    @else
                                     <div class="col-md-3 mt-1">
                                        <a id="{{ $product->id }}" class="product_out_of_stock">
                                            <div class="white_card position-relative mb_20 ">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/product_image/' . $product->image) }}"
                                                        alt="" class="d-block mx-auto " height="60">
                                                    <div class="row text-center ">
                                                        <div class="col-12">
                                                            <a id="{{ $product->id }}" class="product"
                                                                class="f_w_400 color_text_3 f_s_14 d-block">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="col-12">
                                                            <h4 style="display: inline-block"
                                                                class="text-dark mt-0">
                                                                <small>${{ $product->selling_price }}</small>
                                                            </h4>
                                                            <span style="display: inline-block"
                                                                class="badge badge-sm bg-danger ml-3">{{ $product->quentity }}</span>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
