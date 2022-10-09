<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
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
                            <th class="min-w-150px">Category</th>
                            <th class="min-w-130px">Supplier</th>
                            <th class="min-w-130px">Product Name</th>
                            <th class="min-w-130px">Date Of Purchase</th>
                            <th class="min-w-130px">Delivery Date</th>
                            <th class="min-w-130px">Invoice Number</th>
                            <th class="min-w-130px">Unit</th>
                            <th class="min-w-130px">Rate</th>
                            <th class="min-w-130px">Quantity</th>
                            <th class="min-w-130px">Amount</th>
                            <th class="min-w-130px">Notes</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
       
                      <tr>
                        <td>{{$purchaseOrder->category->name??''}}</td>
                        <td>{{$purchaseOrder->supplier->name??''}}</td>
                        <td>{{$purchaseOrder->product->name??''}}</td>
                        <td>{{$purchaseOrder->date->format('F d,y')??''}}</td>
                        <td>{{$purchaseOrder->deliverydate->format('F d,y')??''}}</td>
                        <td>{{$purchaseOrder->invoicenumber??''}}</td>
                        <td>{{$purchaseOrder->product->unit??''}}</td>
                        <td>{{$purchaseOrder->rate??''}}</td>
                        <td>{{$purchaseOrder->quantity??''}}</td>
                        <td>{{$purchaseOrder->amount??''}}</td>
                        <td>{{$purchaseOrder->notes??''}}</td>
                    </tr>    
                     
                       
                         
              
                           
                      
                        
                        
                       
                       
                      
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
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Quantity Received</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{$purchaseOrder->goodsReceived->sum('amountreceived')??''}}</span>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td>
                                        <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Pending Quantity</span>
                                    </td>
                                    <td class="text-end">
                                        <span class="badge badge-light-success fs-7 fw-bolder">{{($purchaseOrder->quantity??0)-$purchaseOrder->goodsReceived->sum('amountreceived')??''}}</span>
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

    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Received Goods Amount</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
    
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
          
          
           
            <form wire:submit.prevent="submit">
                <div class="row mb-7">
                    <!--begin::Label-->
                    
                    <label class="col-lg-4 fw-bold text-muted">Received Amount
                   </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-3 fv-row">
                        
                        Received Date <input wire:model="selectedReceivedDate" type="date" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Received Amount" min="0"/>
                        @error('selectedReceivedDate')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                       
                    </div>
                    <div class="col-lg-3 fv-row">
                        
                        Received Amount <input wire:model="selectedReceivedAmount" type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Received Amount" min="0"/>
                        @error('selectedReceivedAmount')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                       
                    </div>
                 
                   
                    <div class="col-lg-2 fv-row">
                        <button type="submit" class="btn btn-primary mt-6">Pay</button>
                       
                    </div>
               
                    
                    <!--end::Col-->
                </div>
            </form>
           
         
        </div>
        <!--end::Card body-->
    </div>
    <div class="card mb-5 mb-xl-10">
       
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
                      
                        @foreach ($purchaseOrder->goodsReceived as $goodsReceived)
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
</div>
