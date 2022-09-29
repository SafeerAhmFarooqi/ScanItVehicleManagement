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
                    <label for="">Rental Companies</label>
                    <select wire:model="selectedRentalCompany" class="form-select form-select-sm form-select-solid w-200px" data-placeholder="Rental Companies" data-hide-search="true">
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
                    <label for="">Drivers</label>
                    <select wire:model="selectedDriver" class="form-select form-select-sm form-select-solid w-200px" data-placeholder="Drivers" data-hide-search="true">
                        <option value="0" selected="selected">Select Drivers</option>
                        @foreach ($drivers as $driver)
                                      <option  value="{{$driver->id}}">
                                        {{$driver->name}}
                                    </option>
                                      @endforeach
                    </select>
                    <!--end::Select-->
                </div>
               

               
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">From Month</label>
                    <input type="month" class="form-control form-control-lg form-control-solid" wire:model="selectedFromMonth">
                    <!--end::Select-->
                </div>
                <div class="my-1 me-4">
                    <!--begin::Select-->
                    <label for="">To Month</label>
                    <input type="month" class="form-control form-control-lg form-control-solid" wire:model="selectedToMonth">
                    <!--end::Select-->
                </div>
            
            
                
             
                {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
            </div>
            <div class="card-toolbar">
                <a href="javascript:;" wire:click="$set('generateReport', true)" class="btn btn-primary">Generate Report</a>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        



        
        <!--end::Card body-->
    </div>
@if ($attendances)
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
     
        <!--end::Heading-->
        <!--begin::Toolbar-->
        <div class="card-title">
            <h6>Report Date :  {{\Carbon\Carbon::parse($selectedFromMonth)->format('F d,y')}} to {{\Carbon\Carbon::parse($selectedToMonth)->format('F d,y')}}</h3>

        </div>
        <div class="card-title">
            <h6>Rental Company Name : {{$attendances->first()->rentalCompany->name??''}}</h3>

        </div>
        <div class="card-title">
            <h6>Driver Name : {{$selectedDriver?($attendances->first()->driver->name??'') : ''}}</h3>

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
                        <th class="min-w-250px">Date of Attendance</th>
                        <th class="min-w-250px">Name</th>
                        <th class="min-w-250px">In Time</th>
                        <th class="min-w-250px">Out Time</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                  
                  @foreach ($attendances as $attendance)
                  <tr>
                    <td>{{$attendance->attendancedate->format('F d,y')??''}}</td>
                    <td>{{$attendance->driver->name??''}}</td>
                    <td>{{$attendance->intime->format('H:i')}}</td>
                    <td>{{$attendance->outtime->format('H:i')}}</td>
                </tr>    
                @php
                  ($totalWorkingHours+=$attendance->intime->diffInMinutes($attendance->outtime))
                @endphp
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
                                    <span  class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Present</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-success fs-7 fw-bolder">{{$attendances->count()}}</span>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6">Total Working Hours</a>
                                </td>
                                <td class="text-end">
                                    <span class="badge badge-light-primary fs-7 fw-bolder">{{$totalWorkingHours/60}}</span>
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
    <!--end: Card Body-->
</div>
@endif

   
</div>
