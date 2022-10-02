<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
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
                    <select wire:model="selectedDriver" class="form-select form-select-sm form-select-solid w-300px" data-placeholder="Driver" data-hide-search="true">
                        <option value="0" selected="selected">Select Driver</option>
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
                    <h1 class="">Company Total Balance {{$this->currentDriver->rentalCompany->currentAccount->currentbalance??'' }}</h1>
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
    @endif
</div>
