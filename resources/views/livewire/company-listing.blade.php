<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
                    <label for="" class="text-dark"><h3>Search By Name/Address/Phone</h3></label>
                    <input type="text" wire:model="searchCompany" class="form-control w-300px">
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

    @if ($companies->count()>0)
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
                            <th class="min-w-200px">Name</th>
                            <th class="min-w-200px">Address</th>
                            <th class="min-w-200px">Phone Number</th>
                            <th class="min-w-200px">Actions</th>
                       
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-bold text-gray-600">
                      
                        @foreach ($companies as $company)
                        <tr>     
                            <td><input type="text" class="form-control form-control-lg form-control-solid w-200px me-5" wire:model.defer="selectedName.{{$company->id}}"></td>
                            <td><input type="text" class="form-control form-control-lg form-control-solid w-200px me-5" wire:model.defer="selectedAddress.{{$company->id}}"></td>
                            <td><input type="text" class="form-control form-control-lg form-control-solid w-200px me-5" wire:model.defer="selectedPhone.{{$company->id}}"></td>
                            <td><a href="javascript:;" class="btn btn-primary" wire:click="edit({{$company->id}})">Apply</a>
                                <a href="javascript:;" class="btn btn-danger" wire:click="delete({{$company->id}})">Delete</a>
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
</div>
