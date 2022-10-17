<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
        @include('common.validation')
        <!--begin::Form-->
        <form class="form w-100" wire:submit.prevent="submit" enctype="multipart/form-data">
        
            <!--begin::Heading-->
            <div class="mb-10 text-center">
                <!--begin::Title-->
                <h1 class="text-dark mb-3">Add New Driver</h1>
              
            </div>
            <!--end::Heading-->
            <!--begin::Action-->
         
            <!--end::Action-->
            <!--begin::Separator-->
            <div class="d-flex align-items-center mb-10">
                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                
                <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            </div>
            <!--end::Separator-->
            <!--begin::Input group-->
          
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Rental Company</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <select aria-hidden="true" aria-label="Select Area/Mall" class="form-select form-select-solid form-select-lg fw-semibold" data-kt-initialized="1" data-placeholder="Select Area/Mall" wire:model="selectedRentalCompany">
                        <option  value="">
                            Select Rental Company
                        </option>
                      @foreach ($rentalCompanies as $rentalCompany)
                      <option  value="{{$rentalCompany->id}}">
                        {{$rentalCompany->name}}
                    </option>
                      @endforeach
                    </select> 
                    @error('selectedRentalCompany')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
           
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Driver Name</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Driver Name" wire:model="selectedName"/>
                    @error('selectedName')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Vehicle-{{$selectedVehicle}}</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <select   class="form-select form-select-solid form-select-lg fw-semibold" wire:model="selectedVehicle" >
                        <option  value="">
                            Select Vehicle
                        </option>
                      @foreach ($vehicles as $vehicle)
                      <option  value="{{$vehicle->id}}">
                        {{$vehicle->name}}
                    </option>
                      @endforeach
                    </select> 
                    @error('selectedVehicle')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">License</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="License" wire:model="selectedLicense"/>
                    @error('selectedLicense')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">NLD Number</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="NLD Number" wire:model="selectedNldNumber"/>
                    @error('selectedNldNumber')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Address</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Address" wire:model="selectedAddress"/>
                    @error('selectedAddress')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Phone Number</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Phone Number" wire:model="selectedPhoneNumber"/>
                    @error('selectedPhoneNumber')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Salary</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Salary" wire:model="selectedSalary"/>
                    @error('selectedSalary')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Start Time</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="time" placeholder="Start Time" wire:model="selectedStartTime"/>
                    @error('selectedStartTime')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                 <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">End Time</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                 <!--begin::Col-->
                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input class="form-control form-control-lg form-control-solid" type="time" placeholder="End Time" wire:model="selectedEndTime"/>
                    @error('selectedEndTime')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div><!--end::Col-->
            </div>
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Photo</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="file" wire:model="selectedImage" class="form-control form-control-lg form-control-solid" accept=".png, .jpg, .jpeg, .bmp"/> 
                    @error('selectedImage')
                    <span class="alert alert-danger" role="alert">
                        <strong style="font-size: 10px;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
          
       
        
      
         

          

         

       
            <!--end::Input group-->
            <!--begin::Input group-->
          
            <!--end::Input group=-->
            <!--begin::Input group-->
          
            <!--end::Input group-->
            <!--begin::Input group-->
           
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
                <button type="submit"  class="btn btn-lg btn-primary">
                    <span class="indicator-label">Add</span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
</div>
