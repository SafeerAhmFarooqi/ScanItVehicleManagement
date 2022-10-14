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
                            <td>{{$driver->created_at->diffInMonths($driver->getLastAttendance()->attendancedate)}}</td>
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
