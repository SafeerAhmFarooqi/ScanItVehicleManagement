<div>
    {{-- Be like water. --}}
    <div class="card mb-5 mb-xl-10">
        @include('common.validation')
        <div class="alert alert-danger">
            <h3>Note All Fields Are Required Empty field form will not be stored</h3>
        </div>
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
           
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <form wire:submit.prevent="submitVehicleExpenses">
        
                <div class="card-toolbar">
                    <div class="my-1 me-4">
                       
                    
                
                    <!--begin::Repeater-->
      <div id="kt_docs_repeater_basic">
        <!--begin::Form group-->
    @foreach ($forms as $key => $value)
    <div class="form-group">
        <div data-repeater-list="kt_docs_repeater_basic">
            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-label">Rental Company</label>
                        {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                        
                        <select class="form-control mb-2 mb-md-0" placeholder="Expense Group" id="sel1" wire:model="selectedRentalCompany.{{$key}}">
                          <option value="" selected>Rental Company</option>
                        @foreach ($rentalCompanies as $rentalCompany)
                            <option value="{{$rentalCompany->id}}">{{$rentalCompany->name}}</option>
                        @endforeach
                           
                      </select>
                      @error('selectedRentalCompany.{{$key}}')
                      <span class="alert alert-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Vehicle</label>
                        {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                        
                        <select class="form-control mb-2 mb-md-0" placeholder="Vehicles" id="sel1" wire:model="selectedVehicle.{{$key}}">
                          <option value="" selected>Vehicles</option>
                         @foreach ($vehicles[$key] as  $vehicle)
                             <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                         @endforeach
                           
                      </select>
                      </div>
                    <div class="col-md-2">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control mb-2 mb-md-0" placeholder="Date" wire:model="selectedDate.{{$key}}"/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Expense Head</label>
                        <input type="text" class="form-control mb-2 mb-md-0" placeholder="Expense Head" wire:model="selectedExpenseHead.{{$key}}"/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Rate</label>
                        <input type="number" class="form-control mb-2 mb-md-0" placeholder="Rate"  id="rate" wire:model="selectedRate.{{$key}}"/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control mb-2 mb-md-0" placeholder="Quantity"  id="quantity" wire:model="selectedQuantity.{{$key}}" />
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control mb-2 mb-md-0" placeholder="Amount" id="amount" wire:model="selectedAmount.{{$key}}"/>
                   
                      </div>
                      
                      
                    
                    <div class="col-md-2">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8" wire:click="deleteForm({{$key}})">
                            <i class="la la-trash-o"></i>Delete
                        </a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    @endforeach
        
        
        <!--end::Form group-->
    
        <!--begin::Form group-->
        <div class="form-group mt-5">
            <a href="javascript:;" data-repeater-create class="btn btn-light-primary" wire:click="addForm">
                <i class="la la-plus"></i>Add
            </a>
        </div>
        <!--end::Form group-->
    </div>
    
    <!--end::Repeater-->
    <div class="my-1 me-4 mt-8">
        <!--begin::Select-->
        <button type="submit" class="btn btn-primary">Save</button>    <!--end::Select-->
    </div>
                    {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
                </div>
            </form>
           
            
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        



        
        <!--end::Card body-->
    </div>
</div>
