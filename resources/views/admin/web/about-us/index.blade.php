@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
               
          
                <div class="card">
                    <div class="card-header">
                        <h3 class="bold">Department About Us Form</h3>

                        <?php 
//                        
//  echo "<pre>";
//   echo     print_r($row);
// //echo $contact = json_decode($row->contact, true);
//  echo "</pre>";
//  exit;
$sectionAbout = json_decode($row->sectionAbout, true);
$image_file = $sectionAbout['image_file'];
$title = $sectionAbout['title'];
$description = $sectionAbout['description'];
$contact = json_decode($row->contact, true);                        
                        ?>
                    </div>
                    <div class="card-block">
                        <form id="aboutUsForm" class="needs-validation" method="POST" action="{{ route($route.'.store') }}" method="post" enctype="multipart/form-data">
                             @csrf  
                            <div class="row">
                                    <!-- Slider Section -->
                                    {{-- <div id="sliderContainer" style="display:none">
                                        <h4>Slider</h4>
                                        <div class="slider-entry row">
                                                <div class="form-group col-md-6"> <input type="text" class="form-control" name="slider[0][image_file]" placeholder="Image File" required> </div>
                                                <div class="form-group col-md-6">  <input type="text" class="form-control" name="slider[0][title]" placeholder="Title" required> </div>
                                                <div class="form-group col-md-12"> <textarea name="slider[0][description]" class="form-control texteditor" placeholder="Description" required></textarea> </div>
                                                <div class="form-group col-md-6"> <input type="text" class="form-control" name="slider[0][cta_button]" placeholder="CTA Button" required> </div>
                                                <div class="form-group col-md-6"> <input type="text" class="form-control" name="slider[0][cta_url]" placeholder="CTA URL" required> </div>
                                                <div class="form-group col-md-12 text-end"> <button type="button" class="removeSliderBtn btn btn-danger w-auto" onclick="removeSlider(this)">Remove</button> </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 text-center" style="display:none">  <button type="button" id="addSliderBtn" class="btn btn-info" onclick="addSlider()">Add Slider</button> </div> --}}

                                    <!-- Section About -->
                                     <input type="hidden" name="id" value="{{ isset($row->id)?$row->id:'' }}" />
                                    <h4>About Section</h4>
                                    <div class="form-group col-md-6">  <input type="text" class="form-control" name="sectionAbout[image_file]" placeholder="Image File" required value="{{ isset($image_file)?$image_file:'' }}" > </div>
                                    <div class="form-group col-md-6"> <input type="text"  class="form-control" name="sectionAbout[title]" placeholder="Title" required value="{{ isset($title)?$title:'' }}"> </div>
                                    <div class="form-group col-md-12">  <textarea  class="form-control texteditor" name="sectionAbout[description]" placeholder="Description" required>{{ isset($description)?$description:'' }}</textarea> </div>

                                    <!-- Vision -->
                                    <h4>Vision</h4>
                                    <div class="form-group col-md-12">  <textarea class="form-control texteditor"  name="vision" placeholder="Vision" required>{{ isset($row->vision)?$row->vision:'' }}</textarea> </div>

                                    <!-- Mission -->
                                    <h4>Mission</h4>
                                    <div class="form-group col-md-12">  <textarea class="form-control texteditor"  name="mission" placeholder="Mission" required>{{ isset($row->mission)?$row->mission:'' }}</textarea> </div>

                                    <!-- Core Values -->
                                    <h4>Core Values</h4>
                                    <div class="form-group col-md-12">  <textarea class="form-control texteditor"  name="coreValue" placeholder="Core Values" required>{{ isset($row->coreValue)?$row->coreValue:'' }}</textarea> </div>

                                    <!-- Department Section Image -->
                                    <h4>Department Section Image</h4>
                                    <div class="form-group col-md-6">  <input type="text" class="form-control texteditor"   name="departmentSectionImage" value="{{$row->departmentSectionImage}}" placeholder="Image File" required> </div>

                                    <!-- Testimonials -->
                                    {{-- 
                                    <div id="testimonialContainer" style="display:none">
                                        <h4>Testimonials</h4>
                                        <div class="testimonial-entry">
                                            <div class="form-group col-md-6">  <input class="form-control" type="text" name="testimonial[0][name]" placeholder="Name" required> </div> 
                                            <div class="form-group col-md-12">  <textarea class="form-control texteditor"  name="testimonial[0][testimonial]" placeholder="Testimonial" required></textarea> </div>
                                            <div class="form-group col-md-12 text-end">  <button type="button " class="removeTestimonialBtn  btn btn-danger w-auto" onclick="removeTestimonial(this)">Remove</button> </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 text-center" style="display:none">  <button type="button" id="addTestimonialBtn" class="btn btn-info" onclick="addTestimonial()">Add Testimonial</button> </div>
                                    --}}

                                    <!-- Programme Educational Objectives -->
                                    <div id="programmeEducationalContainer">
                                    <h4>Programme Educational Objectives</h4>
                                    <!-- <div class="form-group col-md-12">  <textarea class="form-control texteditor"  name="programmeEducationalObjectives[]" placeholder="Objectives" required></textarea> </div> -->
                                    
                                            @if(!empty($programmeEducationalObjectives))
                                                    @foreach($programmeEducationalObjectives as $index => $objective)
                                                        <div class="programmeEducational-entry row">                                    
                                                            <div class="form-group col-md-9">
                                                                <textarea class="form-control" name="programmeEducationalObjectives[{{ $index }}]" placeholder="Programme Educational Objectives" required>{{ $objective }}</textarea>
                                                            </div>
                                                            <div class="form-group col-md-3 text-end">
                                                                <button type="button" class="removeprogrammeEducationalBtn btn btn-danger w-auto" onclick="removeprogrammeEducational(this)">Remove</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                            @endif
                                            @if(empty($programmeEducationalObjectives))                           
                                                
                                                <div class="programmeEducational-entry row">                                    
                                                    <div class="form-group col-md-9">  <textarea class="form-control"  name="programmeEducationalObjectives[0]" placeholder="Programme Educational Objectives" required></textarea> </div>
                                                    <div class="form-group col-md-3 text-end">  <button type="button " class="removeprogrammeEducationalBtn  btn btn-danger w-auto" onclick="removeprogrammeEducational(this)">Remove</button> </div>
                                                    
                                                </div>
                                            @endif
                                    </div>
                                    <div class="form-group col-md-12 text-center">  <button type="button" id="addprogrammeEducationalBtn" class="btn btn-info" onclick="addprogrammeEducational()">Add </button> </div>
                                    
                                    <!-- Programme Outcomes -->

                                    <div id="programmeOutcomesContainer">
                                    <h4>Programme Outcomes</h4>

                                            @if(!empty($programmeOutcomes))
                                        
                                                    @foreach($programmeOutcomes as $Outcomesindex => $Outcomeobjective)
                                        <div class="programmeOutcomes-entry row">                                           
                                             <div class="form-group col-md-9">  <textarea class="form-control"  name="programmeOutcomes[{{ $Outcomesindex }}]" placeholder="Programme OutComes" required>{{ $Outcomeobjective }}</textarea> </div>
                                             <div class="form-group col-md-3 text-end">  <button type="button " class="removeprogrammeOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeOutcomes(this)">Remove</button> </div>
                                        </div>                                       
                                                    @endforeach
                                            @endif

                                            @if(empty($programmeOutcomes))                           
                                             <div class="programmeOutcomes-entry row">                                           
                                                 <div class="form-group col-md-9">  <textarea class="form-control"  name="programmeOutcomes[0]" placeholder="Programme OutComes" required></textarea> </div>
                                                <div class="form-group col-md-3 text-end">  <button type="button " class="removeprogrammeOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeOutcomes(this)">Remove</button> </div>
                                            </div>  
                                            @endif
                                         
                                         

                                    </div>
                                    <div class="form-group col-md-12 text-center">  <button type="button" id="addprogrammeOutcomesBtn" class="btn btn-info" onclick="addprogrammeOutcomes()">Add </button> </div>

                                    <!-- Programme Specific Outcomes -->
                                    <div id="programmeSpecificOutcomesContainer">
                                    <h4>Programme Specific Outcomes</h4>
                                    @if(!empty($programmeSpecificOutcomes))
                                        
                                        @foreach($programmeSpecificOutcomes as $SpecificOutcomesindex => $SpecificOutcomeobjective)                                    
                                             <div class="programmeSpecificOutcomes-entry row">                                             
                                                <div class="form-group col-md-9">  <textarea class="form-control"  name="programmeSpecificOutcomes[{{ $SpecificOutcomesindex }}]" placeholder="Programme OutComes" required>{{$SpecificOutcomeobjective}}</textarea> </div>
                                                <div class="form-group col-md-3 text-end">  <button type="button " class="removeprogrammeSpecificOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeSpecificOutcomes(this)">Remove</button> </div>
                                            </div>
                                            @endforeach
                                            @endif

                                            @if(empty($programmeSpecificOutcomes))  
                                            <div class="programmeSpecificOutcomes-entry row">                                             
                                                <div class="form-group col-md-9">  <textarea class="form-control"  name="programmeSpecificOutcomes[0]" placeholder="Programme OutComes" required></textarea> </div>
                                                <div class="form-group col-md-3 text-end">  <button type="button " class="removeprogrammeSpecificOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeSpecificOutcomes(this)">Remove</button> </div>
                                            </div>
                                            @endif    

                                    </div>
                                    <div class="form-group col-md-12 text-center">  <button type="button" id="addprogrammeSpecificOutcomesBtn" class="btn btn-info" onclick="addprogrammeSpecificOutcomes()">Add </button> </div>

                                    <!-- Contact -->
                                    <h4>Contact Information</h4>
                                    <div class="form-group col-md-6">  <input class="form-control" type="text" name="contact[name]" value="{{$contact['name']}}" placeholder="Name" required /> </div>
                                    <div class="form-group col-md-6">  <input class="form-control" type="email" name="contact[email]" value="{{$contact['email_id']}}" placeholder="Email" required /> </div>
                                    <div class="form-group col-md-6">  <input class="form-control" type="text" name="contact[phone]" value="{{$contact['phone_number']}}" placeholder="Phone" required /> </div>

                                    <div class="form-group col-md-12">  <button type="submit" class="btn btn-success">Submit</button> </div>

                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->
<script>

    function addSlider() {
        const sliderContainer = document.getElementById('sliderContainer');
        const index = sliderContainer.getElementsByClassName('slider-entry').length;
        const newSlider = `
            <div class="slider-entry row">
                <div class="form-group col-md-6">    <input type="text" class="form-control" name="slider[${index}][image_file]" placeholder="Image File" required> </div>
                <div class="form-group col-md-6">    <input type="text" class="form-control" name="slider[${index}][title]" placeholder="Title" required> </div>
                <div class="form-group col-md-12">    <textarea class="form-control texteditor" name="slider[${index}][description]" placeholder="Description" required></textarea> </div>
                <div class="form-group col-md-6">    <input type="text" class="form-control" name="slider[${index}][cta_button]" placeholder="CTA Button" required> </div>
                <div class="form-group col-md-6">    <input type="text" class="form-control" name="slider[${index}][cta_url]" placeholder="CTA URL" required> </div>
                <div class="form-group text-end">    <button type="button" class="removeSliderBtn  btn btn-danger w-auto" onclick="removeSlider(this)">Remove</button> </div>
            </div>`;
        sliderContainer.insertAdjacentHTML('beforeend', newSlider);
        initTextEditor();
    }

    function removeSlider(btn) {
        const sliderEntry = btn.closest('.slider-entry');
        sliderEntry.remove();
    }

    function addTestimonial() {
        const testimonialContainer = document.getElementById('testimonialContainer');
        const index = testimonialContainer.getElementsByClassName('testimonial-entry').length;
        const newTestimonial = `
            <div class="testimonial-entry">
                <div class="form-group col-md-6">  <input  class="form-control"  type="text" name="testimonial[${index}][name]" placeholder="Name" required> </div>
                <div class="form-group col-md-12">  <textarea  class="form-control texteditor"  name="testimonial[${index}][testimonial]" placeholder="Testimonial" required></textarea> </div>
                <div class="form-group col-md-12 text-end">  <button type="button" class="removeTestimonialBtn  btn btn-danger w-auto" onclick="removeTestimonial(this)">Remove</button> </div>
            </div>`;
        testimonialContainer.insertAdjacentHTML('beforeend', newTestimonial);
        initTextEditor();
    }

    function removeTestimonial(btn) {
        const testimonialEntry = btn.closest('.testimonial-entry');
        testimonialEntry.remove();
    }


    function addprogrammeEducational() {
        const programmeEducationalContainer = document.getElementById('programmeEducationalContainer');
        const index = programmeEducationalContainer.getElementsByClassName('programmeEducational-entry').length;
        const newprogrammeEducational = `
            <div class="programmeEducational-entry row">               
                <div class="form-group col-md-9">  <textarea  class="form-control "  name="programmeEducationalObjectives[${index}]" placeholder="Programme Educational Objectives" required></textarea> </div>
                <div class="form-group col-md-3 text-end">  <button type="button" class="removeprogrammeEducationalBtn  btn btn-danger w-auto" onclick="removeprogrammeEducational(this)">Remove</button> </div>
            </div>`;
        programmeEducationalContainer.insertAdjacentHTML('beforeend', newprogrammeEducational);       
    }

    function removeprogrammeEducational(btn) {
        const programmeEducationalEntry = btn.closest('.programmeEducational-entry');
        programmeEducationalEntry.remove();
    }



    function addprogrammeOutcomes() {
        const programmeOutcomesContainer = document.getElementById('programmeOutcomesContainer');
        const index = programmeOutcomesContainer.getElementsByClassName('programmeOutcomes-entry').length;
        const newprogrammeOutcomes = `
            <div class="programmeOutcomes-entry row">               
                <div class="form-group col-md-9">  <textarea  class="form-control "  name="programmeOutcomes[${index}]" placeholder="Programme OutComes" required></textarea> </div>
                <div class="form-group col-md-3 text-end">  <button type="button" class="removeprogrammeOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeOutcomes(this)">Remove</button> </div>
            </div>`;
        programmeOutcomesContainer.insertAdjacentHTML('beforeend', newprogrammeOutcomes);       
    }

    function removeprogrammeOutcomes(btn) {
        const programmeOutcomesEntry = btn.closest('.programmeOutcomes-entry');
        programmeOutcomesEntry.remove();
    }

    

    function addprogrammeSpecificOutcomes() {
        const programmeSpecificOutcomesContainer = document.getElementById('programmeSpecificOutcomesContainer');
        const index = programmeSpecificOutcomesContainer.getElementsByClassName('programmeSpecificOutcomes-entry').length;
        const newprogrammeSpecificOutcomes = `
            <div class="programmeSpecificOutcomes-entry row">               
                <div class="form-group col-md-9">  <textarea  class="form-control "  name="programmeSpecificOutcomes[${index}]" placeholder="Programme OutComes" required></textarea> </div>
                <div class="form-group col-md-3 text-end">  <button type="button" class="removeprogrammeSpecificOutcomesBtn  btn btn-danger w-auto" onclick="removeprogrammeSpecificOutcomes(this)">Remove</button> </div>
            </div>`;
        programmeSpecificOutcomesContainer.insertAdjacentHTML('beforeend', newprogrammeSpecificOutcomes);       
    }

    function removeprogrammeSpecificOutcomes(btn) {
        const programmeSpecificOutcomesEntry = btn.closest('.programmeSpecificOutcomes-entry');
        programmeSpecificOutcomesEntry.remove();
    }
    document.getElementById('aboutUsForm').addEventListener('submit', function(event) {
        // Form validation can be added here if needed
        // You can manipulate the data format here before submission
        // For now, it just submits the form as is
    });
</script>
@endsection