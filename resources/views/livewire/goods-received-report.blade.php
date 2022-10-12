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
                            <th class="min-w-150px">Date of PO</th>
                            <th class="min-w-150px">PO Number</th>
                            <th class="min-w-150px">Supplier</th>
                            <th class="min-w-150px">Product Name</th>
                            <th class="min-w-150px">Quantity</th>
                            <th class="min-w-150px">Unit</th>
                            <th class="min-w-150px">Rate</th>
                            <th class="min-w-150px">Total PO Amount</th>
                            <th class="min-w-150px">Received Amount Quantity</th>
                            <th class="min-w-150px">Received Units</th>
                            <th class="min-w-150px">Balance</th>
                           
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
                        @foreach ($purchaseOrders as $purchaseOrder)
                        <tr>
                            <td>{{$purchaseOrder->date->format('F d,y')??''}}</td>
                            <td>{{$purchaseOrder->invoicenumber??''}}</td>
                            <td>{{$purchaseOrder->supplier->name??''}}</td>
                            <td>{{$purchaseOrder->product->name??''}}</td>
                            <td>{{$purchaseOrder->quantity??''}}</td>
                            <td>{{$purchaseOrder->product->unit??''}}</td>
                            <td>{{$purchaseOrder->rate??''}}</td>
                            <td>{{$purchaseOrder->amount??''}}</td>
                            <td>{{$purchaseOrder->goodsReceived->sum('amountreceived')*($purchaseOrder->rate)}}</td>
                            <td>{{$purchaseOrder->goodsReceived->sum('amountreceived')??0}}</td>
                            <td>{{($purchaseOrder->amount)-($purchaseOrder->goodsReceived->sum('amountreceived')*$purchaseOrder->rate)}}</td>
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
    <div class="card card-flush mb-xxl-10">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Total Calculations</span>
                <span class="text-gray-400 pt-2 fw-bold fs-6"></span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
           
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Nav-->
          
            <!--end::Nav-->
            <!--begin::Tab Content-->
            <div class="tab-content">
                <!--begin::Tap pane-->
                <div class="tab-pane fade show active" id="kt_stats_widget_1_tab_1">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4 my-0">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fs-7 fw-bolder text-gray-500">
                                    <th class="p-0 min-w-150px d-block pt-3"></th>
                                    <th class="text-end min-w-140px pt-3"></th>
                                  
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Purchase Orders</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$purchaseOrders->count()}}</span>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total POs Amount</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$purchaseOrders->sum('amount')}}</span>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total POs Received Amount Quantity</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$totalReceivedAmounQuantity}}</span>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Received Units</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$totalReceivedUnits}}</span>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Balance</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$totalBalance}}</span>
                                    </td>
                                   
                                </tr>
                               
                              
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
                <!--begin::Tap pane-->
               
                <!--end::Tap pane-->
                <!--begin::Tap pane-->
             
                </div>
                <!--end::Tap pane-->
                <!--begin::Tap pane-->
              
                <!--end::Tap pane-->
            </div>
            <!--end::Tab Content-->
        </div>
    
    @endif
</div>
