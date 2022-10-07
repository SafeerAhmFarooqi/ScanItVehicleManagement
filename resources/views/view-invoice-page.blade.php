@extends('dashboard-layout')
@section('page-content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <b>
                
               
                        Version 2.0 - Purchase Order List
              
       
                </b>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    {{-- <div class="container mb-4">
        <div class="alert alert-warning" role="alert">
            Please complete your profile by clicking
            <a href="#" class="alert-link"> here</a>.
        </div>
    </div> --}}




    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->

            <div class="row g-6 g-xl-9 mb-8">
                <div class="col-lg-12 col-xxl-12">
                    <!--begin::Budget-->
                    <div class="card h-100">
                        <div class="card-body p-9">
                            <h1 class="">Purchase Order Invoice View <i class="fas fa-question-circle ms-2 fs-5 align-middle" data-bs-toggle="tooltip" title="" data-bs-original-title="Search/Filter/Export your Incident Report to show patterns of behavior"></i></h1>
                        </div>
                    </div>
                    <!--end::Budget-->
                </div>
            </div>
           
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <div class="card card-custom">
                            <div class="card-body p-0">
                                <!--begin::Invoice-->
                                <div class="row justify-content-center pt-8 px-8 pt-md-27 px-md-0">
                                    <div class="col-md-9">
                                        <!-- begin: Invoice header-->
                                        <div class="d-flex justify-content-center pb-0 pb-md-0 flex-column flex-md-row">
                                            <h1 class="display-4 font-weight-boldest mb-5">Company Name</h1>
                                     
                                        </div>
                                        <div class="d-flex justify-content-center pb-10 pb-md-20 flex-column flex-md-row">
                                        
                                        
                                                <!--begin::Logo-->
                                                
                                                <!--end::Logo-->
                                                <span class="d-flex flex-column align-items-md-center font-size-h5 font-weight-bold text-muted">
                                                    <span>Address Here</span>
                                                    <span></span>
                                                </span>
                                          
                                        </div>
                                        <div class="d-flex flex-column flex-md-row">
                                            <div class="d-flex flex-column mb-10 mb-md-0">
                                                <div class="font-weight-bold font-size-h6 mb-3">PO Number : {{$purchaseOrder->invoicenumber??''}}</div>
                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                    <span class="font-weight-bold mr-15">Supplier Name : </span>
                                                    <span class="text-right">{{$purchaseOrder->supplier->name??''}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between font-size-lg mb-3">
                                                    <span class="font-weight-bold mr-15">Supplier Address : </span>
                                                    <span class="text-right">{{$purchaseOrder->supplier->address??''}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between font-size-lg">
                                                    <span class="font-weight-bold mr-15">Date Of Purchase : </span>
                                                    <span class="text-right">{{$purchaseOrder->date->format('F d,y')??''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-10 ms-10">
                                            <div class="fw-bolder fs-2">Dear Sir/Madam,
                                               
                                                <br />
                                                <span class="text-muted fs-5 ms-10">Here are your order details. We thank you for your purchase.</span></div>
                                        </div>
                                        
                                            <!--begin::Message-->
                                            <!--begin::Separator-->
                                            <div class="separator"></div>
                                        <div class="rounded-xl overflow-hidden w-100 max-h-md-250px mb-30">
                                            <img src="/metronic/theme/html/demo1/dist/assets/media/bg/bg-invoice-5.jpg" class="w-100" alt="" />
                                        </div>
                                        <!--end: Invoice header-->
                                        <!--begin: Invoice body-->
                                        <div class="row border-bottom pb-10">
                                            <div class="col-md-9 py-md-10 pr-md-10">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg text-uppercase">Sr No</th>
                                                                <th class="pt-1 pb-9 pl-0 font-weight-bolder text-muted font-size-lg text-uppercase">Item Name</th>
                                                                <th class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">Specification</th>
                                                                <th class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">Category</th>
                                                                <th class="pt-1 pb-9 text-right font-weight-bolder text-muted font-size-lg text-uppercase">Quantity</th>
                                                            
                                                                
                                                                <th class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg text-uppercase">Units</th>
                                                                <th class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg text-uppercase">Rate</th>
                                                                <th class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg text-uppercase">Total Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="font-weight-bolder font-size-lg">
                                                                <td class="text-right pt-7">1</td>
                                                                <td class="border-top-0 pl-0 pt-7 d-flex align-items-center">
                                                                <span class="navi-icon mr-2">
                                                                  
                                                                </span>{{$purchaseOrder->product->name??''}}</td>
                                                                <td class="text-right pt-7">{{$purchaseOrder->product->specification??''}}</td>
                                                                <td class="text-right pt-7">{{$purchaseOrder->product->category->name??''}}</td>
                                                                <td class="text-right pt-7">{{$purchaseOrder->quantity??''}}</td>
                                                               
                                                                
                                                                <td class="text-right pt-7">{{$purchaseOrder->product->unit??''}}</td>
                                                                <td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right">{{$purchaseOrder->rate??''}}</td>
                                                                <td class="pr-0 pt-7 font-size-h6 font-weight-boldest text-right">{{$purchaseOrder->amount??''}}</td>
                                                            </tr>
                                                         
                                                        </tbody>
                                                     
                                                    </table>
                                                    Amount In Words : {{$amountInWords}} Takka
                                                </div>
                                                <div class="border-bottom w-100 mt-7 mb-13"></div>
                                                <div class="d-flex flex-column flex-md-row">
                                                    <div class="d-flex flex-column mb-10 mb-md-0">
                                                        <div class="fw-bolder fs-2">Terms And Conditions
                                                            
                                                            <br />
                                                            <span class="text-muted fs-5 ms-10">{!!$termAndCondition->term !!}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 border-left-md pl-md-10 py-md-10 text-right">
                                                <!--begin::Total Amount-->
                                             
                                                <!--end::Total Amount-->
                                                <div class="border-bottom w-100 mb-20"></div>
                                                <!--begin::Invoice To-->
                                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3 mt-15"> .</div>
                                                <div class="font-size-lg font-weight-bold mb-10">.</div>
                                                <!--end::Invoice No-->
                                                <!--begin::Invoice Date-->
                                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3">.</div>
                                                <div class="font-size-lg font-weight-bold">.</div>
                                                <!--end::Invoice Date-->
                                                <!--end::Invoice To-->
                                                <!--begin::Invoice No-->
                                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3 mt-15">Delivery Date : </div>
                                                <div class="font-size-lg font-weight-bold mb-10">{{$purchaseOrder->deliverydate->format('F d,y')??''}}</div>
                                                <!--end::Invoice No-->
                                                <!--begin::Invoice Date-->
                                                <div class="text-dark-50 font-size-lg font-weight-bold mb-3">Notes</div>
                                                <div class="font-size-lg font-weight-bold">{{$purchaseOrder->notes??''}}</div>
                                                <!--end::Invoice Date-->
                                            </div>
                                        </div>
                                        <!--end: Invoice body-->
                                    </div>
                                </div>
                                <!-- begin: Invoice action-->
                                <div class="row justify-content-center py-8 px-8 py-md-28 px-md-0">
                                    <div class="col-md-4">
                                        <div class="d-flex font-size-sm flex-wrap">
                                           <span>Prepared By____________</span>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex font-size-sm flex-wrap">
                                            <span>Approved By____________</span>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center py-8 px-8 py-md-28 px-md-0">
                                    <div class="col-md-9">
                                        <div class="d-flex font-size-sm flex-wrap">
                                            <button type="button" class="btn btn-primary font-weight-bolder py-4 mr-3 mr-sm-14 my-1" onclick="window.print();">Print Invoice</button>
                                            <button type="button" class="btn btn-light-primary font-weight-bolder mr-3 my-1">Download</button>
                                          
                                        </div>
                                    </div>
                                </div>
                                <!-- end: Invoice action-->
                                <!--end::Invoice-->
                            </div>
                        </div>
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>



          

    <!--end::Container-->
</div>
</div>
</div>
@endsection

@section('pageScripts')
<script src="{{asset('assets/Metronic-Theme/js/custom/apps/ecommerce/reports/views/views.js')}}"></script>
@endsection