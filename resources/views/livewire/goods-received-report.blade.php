<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Select</h3>
            </div>
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="" class="text-dark"><h3>Search By Invoice Number</h3></label>
                    <input type="text" wire:model="searchPurchaseOrder" class="form-control w-300px">
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="a" class="text-dark"><h3>Invoices</h3></label>
                    <select wire:model="selectedPurchaseOrder" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Rental Companies" data-hide-search="true">
                        <option value="a" selected>Select Invoice</option>
                        @foreach ($invoices as $invoice)
                                      <option  value="{{$invoice->id}}">
                                        {{$invoice->invoicenumber}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        



        
        <!--end::Card body-->
    </div>

    @if ($purchaseOrder)
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-20">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                    <!--begin::Invoice 2 content-->
                    <div class="mt-n1">
                        <!--begin::Top-->
                        <div class="d-flex flex-stack pb-10">
                            <!--begin::Logo-->
                            <a href="#">
                                <img alt="Logo" src="/metronic8/demo1/assets/media/svg/brand-logos/code-lab.svg" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Action-->
                         
                            <!--end::Action-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Wrapper-->
                        <div class="m-0">
                            <!--begin::Label-->
                            <div class="fw-bold fs-3 text-gray-800 mb-8">Invoice #{{$purchaseOrder->invoicenumber??''}}</div>
                            <!--end::Label-->
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                                <!--end::Col-->
                                <div class="col-sm-6">
                                    <!--end::Label-->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Date Of Purchase:</div>
                                    <!--end::Label-->
                                    <!--end::Col-->
                                    <div class="fw-bold fs-6 text-gray-800">{{$purchaseOrder->date->format('F d,y')??''}}</div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Col-->
                                <!--end::Col-->
                                <div class="col-sm-6">
                                    <!--end::Label-->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Delivery Date:</div>
                                    <!--end::Label-->
                                    <!--end::Info-->
                                    <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
                                        <span class="pe-2">{{$purchaseOrder->deliverydate->format('F d,y')??''}}</span>
                                        <span class="fs-7 text-danger d-flex align-items-center">
                                        <span class="bullet bullet-dot bg-danger me-2"></span>Due In {{\Carbon\Carbon::now()>$purchaseOrder->deliverydate?'-' : ''}} {{\Carbon\Carbon::now()->diffInDays($purchaseOrder->deliverydate)}} Days</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row g-5 mb-12">
                                <!--end::Col-->
                                <div class="col-sm-6">
                                    <!--end::Label-->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
                                    <!--end::Label-->
                                    <!--end::Text-->
                                    <div class="fw-bold fs-6 text-gray-800">Company Name</div>
                                    <!--end::Text-->
                                    <!--end::Description-->
                                    <div class="fw-semibold fs-7 text-gray-600">8692 Wild Rose Drive 
                                    <br />Livonia, MI 48150</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Col-->
                                <!--end::Col-->
                                <div class="col-sm-6">
                                    <!--end::Label-->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Supplier Name:</div>
                                    <!--end::Label-->
                                    <!--end::Text-->
                                    <div class="fw-bold fs-6 text-gray-800">{{$purchaseOrder->supplier->name??''}}</div>
                                    <!--end::Text-->
                                    <!--end::Description-->
                                    <div class="fw-semibold fs-7 text-gray-600">{{$purchaseOrder->supplier->address??''}}
                                    <br /></div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
                                    <table class="table mb-3">
                                        <thead>
                                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                                <th class="min-w-175px pb-2">Product Name</th>
                                                <th class="min-w-80px text-end pb-2">Unit</th>
                                                <th class="min-w-80px text-end pb-2">Rate</th>
                                                <th class="min-w-70px text-end pb-2">Quantity</th>
                                                <th class="min-w-70px text-end pb-2">Received Quantity</th>
                                                <th class="min-w-100px text-end pb-2">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                <td class="d-flex align-items-center pt-6">
                                                <i class="fa fa-genderless text-success fs-2 me-2"></i>{{$purchaseOrder->product->name??''}}</td>
                                                <td class="pt-6">{{$purchaseOrder->product->unit??''}}</td>
                                                <td class="pt-6">{{$purchaseOrder->rate??''}}</td>
                                                <td class="pt-6">{{$purchaseOrder->quantity??''}}</td>
                                                <td class="pt-6">{{$purchaseOrder->goodsReceived->sum('amountreceived')??''}}</td>
                                                <td class="pt-6 text-dark fw-bolder">{{$purchaseOrder->amount??''}}</td>

                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                                <!--begin::Container-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Section-->
                                    <div class="mw-300px">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Accountname-->
                                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Amount:</div>
                                            <!--end::Accountname-->
                                            <!--begin::Label-->
                                            <div class="text-end fw-bold fs-6 text-gray-800">{{$purchaseOrder->amount??''}}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Accountname-->
                                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Due Amount:</div>
                                            <!--end::Accountname-->
                                            <!--begin::Label-->
                                            <div class="text-end fw-bold fs-6 text-gray-800">{{(($purchaseOrder->quantity??0)-($purchaseOrder->goodsReceived->sum('amountreceived')??0))*($purchaseOrder->rate??0)}}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                      
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                      
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Invoice 2 content-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="m-0">
                    <!--begin::Invoice 2 sidebar-->
                    <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                        <!--begin::Labels-->
                        <div class="mb-8">
                            <span class="badge badge-light-success me-2">Approved</span>
                            <span class="badge badge-light-warning">Pending Payment</span>
                        </div>
                        <!--end::Labels-->
                        <!--begin::Title-->
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">PAYMENT DETAILS</h6>
                        <!--end::Title-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Paypal:</div>
                            <div class="fw-bold text-gray-800 fs-6">codelabpay@codelab.co</div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Account:</div>
                            <div class="fw-bold text-gray-800 fs-6">Nl24IBAN34553477847370033 
                            <br />AMB NLANBZTC</div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-15">
                            <div class="fw-semibold text-gray-600 fs-7">Payment Term:</div>
                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center">14 days 
                            <span class="fs-7 text-danger d-flex align-items-center">
                            <span class="bullet bullet-dot bg-danger mx-2"></span>Due in 7 days</span></div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Title-->
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">PROJECT OVERVIEW</h6>
                        <!--end::Title-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Project Name</div>
                            <div class="fw-bold fs-6 text-gray-800">SaaS App Quickstarter 
                            <a href="#" class="link-primary ps-1">View Project</a></div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Completed By:</div>
                            <div class="fw-bold text-gray-800 fs-6">Mr. Dewonte Paul</div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="m-0">
                            <div class="fw-semibold text-gray-600 fs-7">Time Spent:</div>
                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center">230 Hours 
                            <span class="fs-7 text-success d-flex align-items-center">
                            <span class="bullet bullet-dot bg-success mx-2"></span>35$/h Rate</span></div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Invoice 2 sidebar-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Body-->
    </div>
    @endif
</div>
