<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    @include('common.validation')
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" wire:submit.prevent="submit">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">New Driver Attendance</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                         
                            <!--end::Link-->
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
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Rental Company-{{$selectedRentalCompany}}</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select wire:model="selectedRentalCompany" aria-hidden="true" aria-label="Rental Company" class="form-select form-select-solid form-select-lg fw-semibold" data-control="select2" data-kt-initialized="1" data-placeholder="Select Area/Mall" data-select2-id="select2-data-10-ewc6" name="area" tabindex="-1" >
                                    <option data-select2-id="select2-data-12-u8ev" value="">
                                        Select Rental Company...
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
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Driver</span> <i aria-label="Store of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select wire:model="selectedDriver" aria-hidden="true" aria-label="Select Driver" class="form-select form-select-solid form-select-lg fw-semibold" data-control="select2" data-kt-initialized="1" data-placeholder="Select Floor" data-select2-id="select2-data-10-ewc6" tabindex="-1">
                                    <option data-select2-id="select2-data-12-u8ev" value="" disabled>
                                        Select Driver
                                    </option>
                                  @foreach ($drivers as $driver)
                                  <option  value="{{$driver->id}}">
                                    {{$driver->name}}
                                </option>
                                  @endforeach
                                </select> 
                                @error('selectedDriver')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div>

                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Attendance Date</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" type="date" placeholder="Attendance Date" wire:model="attendanceDate"/>
                                @error('attendanceDate')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div>

                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">In Time</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" type="time" placeholder="In Time" wire:model="inTime"/>
                                @error('inTime')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Out Time</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" type="time" placeholder="Out Time" wire:model="outTime"/>
                                @error('outTime')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
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
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
           
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
</div>
