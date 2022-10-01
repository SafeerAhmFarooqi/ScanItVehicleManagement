<div>
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
                    <label for="" class="text-dark"><h3>Rental Companies</h3></label>
                    <select wire:model="selectedRentalCompany" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Rental Companies" data-hide-search="true">
                        <option value="0" selected="selected">Select Rental Companies</option>
                        @foreach ($rentalCompanies as $rentalCompany)
                                      <option  value="{{$rentalCompany->id}}">
                                        {{$rentalCompany->name}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>

                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for=""><h3>Companies</h3></label>
                    <select wire:model="selectedCompany" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Company" data-hide-search="true">
                        <option value="0" selected="selected">Select Company</option>
                        @foreach ($companies??[] as $company)
                       
                                      <option  value="{{$company->id}}">
                                        {{$company->name}}
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

    @if ($rentAgreements)
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
         
            <!--end::Heading-->
            <!--begin::Toolbar-->
            
            <div class="card-title">
                <h6>Rental Company Name : {{$currentRentalCompany->name??''}}</h3>
    
            </div>
            <div class="card-title">
                <h6>Company Name : {{$rentAgreements->first()->company->name??''}}</h3>
    
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
                            <th class="min-w-150px">Date of Agreement</th>
                            <th class="min-w-130px">Vehicle</th>
                            <th class="min-w-130px">Driver</th>
                            <th class="min-w-130px">Duration</th>
                            <th class="min-w-130px">Quantity</th>
                            <th class="min-w-130px">Rate</th>
                            <th class="min-w-130px">Amount</th>
                            <th class="min-w-130px">Status</th>
                            <th class="min-w-130px">Action</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
                      @foreach ($rentAgreements as $rentAgreement)
                      <tr>
                        <td>{{$rentAgreement->date->format('F d,y')??''}}</td>
                        <td>{{$rentAgreement->vehicle->name??''}}</td>
                        <td>{{$rentAgreement->driver->name??''}}</td>
                        <td>{{$rentAgreement->duration??''}}</td>
                        <td>{{$rentAgreement->quantity??''}}</td>
                        <td>{{$rentAgreement->rate??''}}</td>
                        <td>{{$rentAgreement->amount??''}}</td>
                        <td>{{$rentAgreement->paid?'Paid' : 'Unpaid'}}</td>
                        <td>
                            @if (!$rentAgreement->paid)
                            <a href="javascript:;" class="btn btn-primary" type="reset" wire:click="getRentAgreement({{$rentAgreement->id}})" data-bs-toggle="modal" data-bs-target="#kt_modal_pay">Pay Now</a>                                
                            @else
                            <a href="javascript:;" class="btn btn-primary">UnPay Now</a>                                
                            @endif
                        </td>
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

    <div class="modal fade" tabindex="-1" id="kt_modal_pay" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Date : {{$currentRentAgreement?$currentRentAgreement->date->format('F d,y') : ''}}	</h3>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to Credit {{$currentRentAgreement->amount??''}} to Company Current Account </p>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:;" class="btn btn-primary" wire:click="payAgreementAmount({{$currentRentAgreement->id??''}})">Yes</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

@section('pageScripts')
<script> 
    window.addEventListener('hideModel', event => {
       
        $('#kt_modal_pay').modal('hide');  
        $('#kt_modal_invite_friends_update').modal('hide');  
        $('#kt_modal_invite_friends_delete').modal('hide');  

})
</script> 
@endsection
