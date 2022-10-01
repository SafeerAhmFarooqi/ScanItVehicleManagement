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
                    <label for=""><h3>Drivers</h3></label>
                    <select wire:model="selectedDriver" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Drivers" data-hide-search="true">
                        <option value="0" selected="selected">Select Drivers</option>
                        @foreach ($drivers as $driver)
                                      <option  value="{{$driver->id}}">
                                        {{$driver->name}}
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
@if ($selectedRentalCompany&&$selectedDriver)
<div class="row g-6 g-xl-9 mb-8">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Budget-->
        <div class="card h-100">
            <div class="card-body p-9">
                <h1 class="">Driver Salary Settings<i class="fas fa-question-circle ms-2 fs-5 align-middle" data-bs-toggle="tooltip" title="" data-bs-original-title="Search/Filter/Export your Incident Report to show patterns of behavior"></i></h1>
            </div>
        </div>
        <!--end::Budget-->
    </div>
</div>

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Advance Payment</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->

        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-bold text-muted">Current Advance Payment</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bolder fs-6 text-gray-800">{{$currentDriver->advancePayment->advancepayment??0}}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <form wire:submit.prevent="submitAddToAdvancePayment">
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Add to Advance Payment-{{$addToAdvancePayment}}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <input wire:model="addToAdvancePayment" type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Add to Advance Payment" min="0" />
                   
                </div>
                <div class="col-lg-2 fv-row">
                     <button type="submit" class="btn btn-primary">Add</button>
                    
                 </div>
                <!--end::Col-->
            </div>
        </form>
       
        <!--end::Input group-->
        <!--begin::Input group-->
        <form wire:submit.prevent="submitSubtractFromAdvancePayment">
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Subtract From Advance Payment
               </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    <input wire:model="subtractFromAdvancePayment" type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Subtract from Advance Payment" min="0"/>
                   
                </div>
                <div class="col-lg-2 fv-row">
                    <button type="submit" class="btn btn-primary">Sub</button>
                   
                </div>
                <!--end::Col-->
            </div>
        </form>
       
        <form wire:submit.prevent="submitSalaryDeduction">
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Deduct From Salary
               </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-3 fv-row">
                    
                    Salary Month <input wire:model="selectedDeductSalaryMonth" type="month" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Select Month" min="0"/>
                    @error('selectedDeductSalaryMonth')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                   
                </div>
                <div class="col-lg-2 fv-row">
                    Salary Amount <input wire:model="selectedDeductSalaryAmount" type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Amount" min="0"/>
                    @error('selectedDeductSalaryAmount')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-lg-2 fv-row">
                   Click to Deduct <button type="submit" class="btn btn-primary">Deduct</button>
                   
                </div>
                <!--end::Col-->
            </div>
        </form>
       
     
    </div>
    <!--end::Card body-->
</div>


<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Monthly Salary</h3>
        </div>
       
        <!--end::Card title-->
        <!--begin::Action-->

        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        @include('common.validation')
        <!--begin::Row-->
        <form wire:submit.prevent="submitMonthlySalary">
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">Per Month Salary</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-2 fv-row">
                    <input wire:model="perMonthSalaryAmount" type="number" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Amount" min="0" />
                    @error('perMonthSalaryAmount')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
        
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Pick Month Ranges</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-2 fv-row">
                        <input wire:model="salaryStartMonth" type="month" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Add to Advance Payment" min="0" />
                        @error('salaryStartMonth')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    To
                    <div class="col-lg-2 fv-row">
                        <input wire:model="salaryEndMonth" type="month" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Add to Advance Payment" min="0" />
                        @error('salaryEndMonth')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="col-lg-2 fv-row">
                         <button type="submit" class="btn btn-primary">Update   </button>
                        
                     </div>
                    <!--end::Col-->
                </div>
        </form>
      
    
       
   
       
     
    </div>
    <!--end::Card body-->
</div>

    <!--end: Card Body-->
    <div class="row g-6 g-xl-9 mb-8">
        <div class="col-lg-12 col-xxl-12">
            <!--begin::Budget-->
            <div class="card h-100">
                <div class="card-body p-9">
                    <h1 class="">Driver Attendance Settings<i class="fas fa-question-circle ms-2 fs-5 align-middle" data-bs-toggle="tooltip" title="" data-bs-original-title="Search/Filter/Export your Incident Report to show patterns of behavior"></i></h1>
                </div>
            </div>
            <!--end::Budget-->
        </div>
    </div>

    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder me-10">Holiday Settings</h3>
             
                
            </div>
            <div class="card-toolbar">
                <label class="form-check-label me-5" for="allowmarketing"><h3>Automatic</h3></label>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                   
                    <div class="form-check form-check-solid form-switch fv-row">
                       
                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" wire:model="holidaySettingMode"/>
                        
                    </div>
                    <!--end::Select-->
                </div>
                <label class="form-check-label ms-5" for="allowmarketing"><h3>Manual</h3></label>
        
            </div>
            <div>
              
            </div>
           
            <!--end::Card title-->
            <!--begin::Action-->
    
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            @include('common.validation')
            <!--begin::Row-->
            @if (!$holidaySettingMode)
            <form wire:submit.prevent="submitAutomaticHolidaySetting">
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-bold text-muted">Every</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-2 fv-row">
                        <select name="currnecy" aria-label="Day"  data-placeholder="Day.." class="form-select form-select-solid form-select-lg" wire:model="everyHolidayAt1">
                            <option value="">Day..</option>  
                            @foreach ($everyHolidayShow1 as $key => $everyHoliday)
                            <option value="{{$key}}">{{$everyHoliday}}</option>
                            @endforeach
                          
                        </select>
                        @error('perMonthSalaryAmount')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-2 fv-row">
                        <select name="currnecy" aria-label="Day"  data-placeholder="Day.." class="form-select form-select-solid form-select-lg" wire:model="everyHolidayAt2">
                            <option value="">Day..</option>  
                            @foreach ($everyHolidayShow2 as $key => $everyHoliday)
                            <option value="{{$key}}">{{$everyHoliday}}</option>
                            @endforeach
                          
                        </select>
                        @error('perMonthSalaryAmount')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
            
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Pick Month Ranges</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-2 fv-row">
                            <input wire:model="automaticHolidayStartMonth" type="month" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Add to Advance Payment" min="0" />
                            @error('automaticHolidayStartMonth')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        </div>
                        To
                        <div class="col-lg-2 fv-row">
                            <input wire:model="automaticHolidayEndMonth" type="month" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Add to Advance Payment" min="0" />
                            @error('automaticHolidayEndMonth')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        </div>
                        <div class="col-lg-2 fv-row">
                             <button type="submit" class="btn btn-primary">Update   </button>
                            
                         </div>
                        <!--end::Col-->
                    </div>
            </form>
            @else
                
            @endif
            
          
        
           
       
           
         
        </div>
        <!--end::Card body-->
    </div>
@endif


   
</div>
