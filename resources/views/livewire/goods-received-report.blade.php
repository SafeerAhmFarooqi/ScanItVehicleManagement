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
                    <label for="" class="text-dark"><h3>Select Date Range</h3></label>
                    <input type="date" wire:model="selectedStartDate" class="form-control w-200px">
                    <!--end::Select-->
                </div>
                <h3 style="margin-top: 30px;margin-right: 20px;">to</h3>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="" class="text-dark"><h3></h3></label>
                    <input type="date" wire:model="selectedEndDate" class="form-control w-200px">
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="" class="text-dark"><h3>Search By Invoice Number</h3></label>
                    <input type="text" wire:model="searchPurchaseOrder" class="form-control w-200px">
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

    @if ($purchaseOrders->count()>0)
    <div class="card mb-5 mb-xl-10">
        @include('common.validation')
        <!--begin::Card header-->
        <div class="card-header">
            
            <!--begin::Heading-->
         
            <!--end::Heading-->
            <!--begin::Toolbar-->
            
           
           
            <!--end::Toolbar-->
        </div>
    
        
      
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-0">
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                        <tr>
                            <th class="min-w-150px">Date of Purchase</th>
                            <th class="min-w-130px">Invoice Number</th>
                            <th class="min-w-130px">Product Name</th>
                            <th class="min-w-130px">Supplier</th>
                            <th class="min-w-130px">Delivery Date</th>
                            <th class="min-w-130px">Rate</th>
                            <th class="min-w-130px">Quantity</th>
                            <th class="min-w-130px">Amount</th>
                            <th class="min-w-130px">Actions</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
                        @foreach ($purchaseOrders as $purchaseOrder)
                        <tr>
                            <td>{{$purchaseOrder->date->format('F d,y')??''}}</td>
                            <td>{{$purchaseOrder->invoicenumber??''}}</td>
                            <td>{{$purchaseOrder->product->name??''}}</td>
                            <td>{{$purchaseOrder->supplier->name??''}}</td>
                            <td>{{$purchaseOrder->deliverydate->format('F d,y')??''}}</td>
                            <td>{{$purchaseOrder->rate??''}}</td>
                            <td>{{$purchaseOrder->quantity??''}}</td>
                            <td>{{$purchaseOrder->amount??''}}</td>
                            <td><a href="javascript:;" class="btn btn-primary" wire:click="$set('selectedId', {{$purchaseOrder->id}})">Detail</a></td>
                        </tr>    
                        @endforeach
                     
                     
                       
                         
              
                           
                      
                        
                        
                       
                       
                      
                    </tbody>
                    <!--end::Tbody-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
    
      
    
    
    
        
        <!--end::Card body-->
    </div>
    @if ($currentPurchaseOrder)
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
                            <div class="fw-bold fs-3 text-gray-800 mb-8">Invoice #{{$currentPurchaseOrder->invoicenumber??''}}</div>
                            <!--end::Label-->
                            <!--begin::Row-->
                            <div class="row g-5 mb-11">
                                <!--end::Col-->
                                <div class="col-sm-6">
                                    <!--end::Label-->
                                    <div class="fw-semibold fs-7 text-gray-600 mb-1">Date Of Purchase:</div>
                                    <!--end::Label-->
                                    <!--end::Col-->
                                    <div class="fw-bold fs-6 text-gray-800">{{$currentPurchaseOrder->date->format('F d,y')??''}}</div>
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
                                        <span class="pe-2">{{$currentPurchaseOrder->deliverydate->format('F d,y')??''}}</span>
                                        <span class="fs-7 text-danger d-flex align-items-center">
                                        <span class="bullet bullet-dot bg-danger me-2"></span>Due In {{\Carbon\Carbon::now()>$currentPurchaseOrder->deliverydate?'-' : ''}} {{\Carbon\Carbon::now()->diffInDays($currentPurchaseOrder->deliverydate)}} Days</span>
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
                                    <div class="fw-bold fs-6 text-gray-800">{{$currentPurchaseOrder->supplier->name??''}}</div>
                                    <!--end::Text-->
                                    <!--end::Description-->
                                    <div class="fw-semibold fs-7 text-gray-600">{{$currentPurchaseOrder->supplier->address??''}}
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
                                                <i class="fa fa-genderless text-success fs-2 me-2"></i>{{$currentPurchaseOrder->product->name??''}}</td>
                                                <td class="pt-6">{{$currentPurchaseOrder->product->unit??''}}</td>
                                                <td class="pt-6">{{$currentPurchaseOrder->rate??''}}</td>
                                                <td class="pt-6">{{$currentPurchaseOrder->quantity??''}}</td>
                                                <td class="pt-6">{{$currentPurchaseOrder->goodsReceived->sum('amountreceived')??''}}</td>
                                                <td class="pt-6 text-dark fw-bolder">{{$currentPurchaseOrder->amount??''}}</td>

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
                                            <div class="text-end fw-bold fs-6 text-gray-800">{{$currentPurchaseOrder->amount??''}}</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Accountname-->
                                            <div class="fw-semibold pe-10 text-gray-600 fs-7">Due Amount:</div>
                                            <!--end::Accountname-->
                                            <!--begin::Label-->
                                            <div class="text-end fw-bold fs-6 text-gray-800">{{(($currentPurchaseOrder->quantity??0)-($currentPurchaseOrder->goodsReceived->sum('amountreceived')??0))*($currentPurchaseOrder->rate??0)}}</div>
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
    <div class="card mb-5 mb-xl-10" style="margin-top: 20px;">
       
        <!--begin::Card header-->
        <div class="card-header">
            
            <!--begin::Heading-->
         
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <div class="card-title">
                <h3>Received Quantity History</h3>
            </div>

           
            <!--end::Toolbar-->
        </div>
    
        
      
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-0">
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                        <tr>
                            <th class="min-w-150px">Received Date</th>
                            <th class="min-w-130px">Received Amount</th>
                          
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
                        @foreach ($currentPurchaseOrder->goodsReceived as $goodsReceived)
                        <tr>
                            <td>{{$goodsReceived->receiveddate->format('F d,y')??''}}</td>
                            <td>{{$goodsReceived->amountreceived??''}}</td>
                          
                        </tr>   
                        @endforeach
                     
                     
                       
                         
              
                           
                      
                        
                        
                       
                       
                      
                    </tbody>
                    <!--end::Tbody-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
    
      
    
    
    
        
        <!--end::Card body-->
    </div>
    @endif
    
    @endif
</div>
