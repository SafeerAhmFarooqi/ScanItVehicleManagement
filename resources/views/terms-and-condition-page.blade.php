@extends('dashboard-layout')
@section('page-content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <b>
                
               
                        Version 2.0 - Terms And Conditions
              
       
                </b>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    {{-- <div class="container mb-4">
        <div class="alert alert-warning" role="alert">
            Please complete your profile by clicking
            <a href="#" class="alert-link"> here</a>.
        </div>
    </div> --}}




    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            
            <div class="d-flex flex-column flex-root">
                <!--begin::Authentication - Sign-up -->
                <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
                    <!--begin::Content-->
                    
                    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                        <!--begin::Logo-->
                        
                        <!--end::Logo-->
                        <!--begin::Wrapper-->
                        <div class="w-lg-800px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                            @include('common.validation')
                            <!--begin::Form-->
                            <form class="form w-800" novalidate="novalidate" method="POST" action="{{route('app.purchaseorder.store')}}">
                                @csrf
                                <!--begin::Heading-->
                                <div class="mb-10 text-center">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">Write Terms And Conditions Here</h1>
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
                               
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        {{-- <input type="text"  class="form-control form-control-lg form-control-solid"   /> --}}
                                        <textarea id="tinymce1" class="form-control form-control-lg form-control-solid" name="term" value="{{old('term')?old('term') : $termAndCondition->term??''}}" placeholder="Terms And Conditions">{{old('term')?old('term') : $termAndCondition->term??''}}</textarea>
                                        @error('term')
                                        <div class="alert alert-danger">
                                                {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                               
                            
                              
                           <input type="hidden" name="type" value="addtermsandconditions">
                            
                          
                             

                              

                             

                           
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
                                        <span class="indicator-label">Add/Update</span>
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
        <!--end::Row-->

        <!--end::Row-->
    </div>

    <!--end::Container-->
</div>
@endsection

@section('pageScripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAIeDyz_v1KkoU3ZTRqK5e-9Ax1lNjSIEI"></script>
<script type="text/javascript">
    var searchInput = 'location';
    
        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode']
               
            });
        
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var near_place = autocomplete.getPlace();
            });
        });
</script>
<script src="{{asset('assets/Metronic-Theme/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script>
    
    var options1 = {selector: "#tinymce1",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };

                        var options2 = {selector: "#tinymce2",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };

                        var options3 = {selector: "#tinymce3",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };
                        
    if (KTApp.isDarkMode()) {
        options1["skin"] = "oxide-dark";
        options1["content_css"] = "dark";
        options2["skin"] = "oxide-dark";
        options2["content_css"] = "dark";
        options3["skin"] = "oxide-dark";
        options3["content_css"] = "dark";
    }
    tinymce.init(options1);
    tinymce.init(options2);
    tinymce.init(options3);
    
    </script>
@endsection