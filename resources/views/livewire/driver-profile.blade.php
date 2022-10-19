<div>
    {{-- The whole world belongs to you. --}}
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
                    <input type="month" wire:model="selectedStartMonth" class="form-control w-150px">
                    <!--end::Select-->
                </div>
                <h3 style="margin-top: 30px;margin-right: 20px;">to</h3>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="" class="text-dark"><h3></h3></label>
                    <input type="month" wire:model="selectedEndMonth" class="form-control w-150px">
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="" class="text-dark"><h3>Search By Driver Name</h3></label>
                    <input type="text" wire:model="searchDriverName" class="form-control w-150px">
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="a" class="text-dark"><h3>Drivers</h3></label>
                    <select wire:model="selectedDriver" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Rental Companies" data-hide-search="true">
                        <option value="a" selected>Select Driver</option>
                        @foreach ($drivers as $driverList)
                                      <option  value="{{$driverList->id}}">
                                        {{$driverList->name}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>

             
               

            
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="a" class="text-dark"><h3>Rental Companies</h3></label>
                    <select wire:model="selectedRentalCompany" class="form-select form-select-sm form-select-solid w-150px" data-placeholder="Rental Companies" data-hide-search="true">
                        <option value="a" selected>Select Rental Company</option>
                        @foreach ($rentalCompanies as $rentalCompany)
                                      <option  value="{{$rentalCompany->id}}">
                                        {{$rentalCompany->name}}
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
    @if ($driver)
        @include('common.validation')
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
          
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <form wire:submit.prevent="updatePic" enctype="multipart/form-data">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Picture</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/Metronic-Theme/media/svg/avatars/blank.svg')}}')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{($selectedPic?$selectedPic->temporaryUrl() : (($driver->profilePic->path??false)?asset('storage/'.($driver->profilePic->path??false)) : asset('assets/Metronic-Theme/media/svg/avatars/blank.svg'))) }}')"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label  class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i  class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" wire:model="selectedPic" accept=".png, .jpg, .jpeg" />
                                        
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                   
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                   
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <button class="btn btn-primary" type="submit" style="margin-left: 50px;">Update Picture</button>
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </form>
                   
                    <!--end::Input group-->
                    <!--begin::Input group-->
            <form wire:submit.prevent="submit">
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverName" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full Name" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Vehicle</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select  wire:model.defer="selectedDriverVehicle"  class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Select a Vehicle...</option>
                                @foreach ($vehicles as $vehicle)
                                <option  value="{{$vehicle->id}}" {{$selectedDriverVehicle==$vehicle->id?'selected' : ''}}>{{$vehicle->name??''}}</option>                                    
                                @endforeach

                               
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Driver License</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverLicense" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Driver License" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nld Number</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverNldNumber" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nld Number" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverAddress" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">First Month Salary</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverSalary" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First Month Salary" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Phone</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="text" wire:model.defer="selectedDriverPhone" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Phone" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Start Time</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="time" wire:model.defer="selectedDriverStartTime" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Start Time" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">End Time</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <input type="time" wire:model.defer="selectedDriverEndTime" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="End Time" value="Max" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                               
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                   
                </form>
                </div>
              
        </div>
        <!--end::Content-->
    </div>
    <div class="card mb-5 mb-xl-10">
        @include('common.validation')
        <!--begin::Card header-->
        <div class="card-header">
            
            <!--begin::Heading-->
         
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <div class="card-title">
                <h3>Full Report</h3>
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
                            <th class="min-w-150px">Rental Company Name</th>
                            <th class="min-w-150px">Driver Name</th>
                            <th class="min-w-150px">Total Received Salary</th>
                            <th class="min-w-150px">Total Working Months</th>
                            <th class="min-w-150px">Total Attendances</th>
                            <th class="min-w-150px">Total Working Hours</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
            
                        <tr>
                            <td>{{$driver->rentalCompany->name??''}}</td>
                            <td>{{$driver->name??''}}</td>
                            <td>{{$driver->salaryRecords->sum('amount')??''}}</td>
                            <td>{{$driver->created_at->diffInMonths($driver->getLastAttendance()->attendancedate??'')}}</td>
                            <td>{{$driver->driverAttendances->count()}}</td>
                            <td>{{$totalWorkingHours}}</td>
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
    @endif

    @if ($selectedStartMonth&&$selectedEndMonth&&$driver)
    <div class="card mb-5 mb-xl-10">
        @include('common.validation')
        <!--begin::Card header-->
        <div class="card-header">
            
            <!--begin::Heading-->
         
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <div class="card-title">
         
                <h3>Month Range Report {{\Carbon\Carbon::parse($selectedStartMonth)->format('F d,Y')}} To {{\Carbon\Carbon::parse($selectedEndMonth)->endOfMonth()->format('F d,Y')}}</h3>
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
                            <th class="min-w-150px">Rental Company Name</th>
                            <th class="min-w-150px">Driver Name</th>
                            <th class="min-w-150px">Total Received Salary</th>  
                            <th class="min-w-150px">Total Attendances</th>
                            <th class="min-w-150px">Total Working Hours</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
            
                        <tr>
                            <td>{{$driver->rentalCompany->name??''}}</td>
                            <td>{{$driver->name??''}}</td>
                            <td>{{$driver->salaryRecordsWithRange($selectedStartMonth,$selectedEndMonth)->sum('amount')??''}}</td>
                            <td>{{$driver->attendanceRecordsWithRange($selectedStartMonth,$selectedEndMonth)->count()}}</td>
                            <td>{{$totalWorkingHoursWithRange}}</td>
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
    @endif
</div>
