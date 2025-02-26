@extends('app.layout')

@push('styles')

<style>
h1{color:'red'}
</style>
@endpush



@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Homepage</h1>



<form action="{{url('/add_homepage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @elseif(session('error'))

    <div style="color:red;">
        {{session('success')}}
    </div>

    @endif


    @csrf

    <section>

        <h3>Section 1 (Forests of tomorrow,prosperity for generations)</h3>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="" class="form-label">Upload video</label>
                <input type="file" name="sec1_vid" class="form-control VideoInput">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger clear-vidbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-6">
                <img class="videoThumbnail" src="{{ asset('images/default.jpg') }}" width="400" alt="Default Video Thumbnail">
                <video class="videoPreview" width="400" controls style="display:none;"></video>
            </div>
        </div>
        

        {{-- <div class="mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text</label>
                <input type="text" class="form-control ">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control ">
            </div>

        </div> --}}



    </section>

<hr>


<section>

    <h3>Section 2(Hindi/english text with quill)</h3>

    <div class="row">
       

        <div class="mb-3 col-4">
            <label for="" class="form-label">Upload video</label>
            <input type="file" name="sec2gif" class="form-control VideoInput" >
        </div>
        <div class=" mb-3 col-2">
            <button type="button" class="btn btn-danger clear-vidbtn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="videoThumbnail" src="{{ asset('images/default.jpg') }}" width="400" alt="Default Video Thumbnail">
            <video class="videoPreview" width="400" controls style="display: none;"></video>
        </div>
    </div>
    

</section>


<hr>

<section>

    

    <h3>Section 3(What we do)</h3>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">title</label>
                <input type="text" class="form-control " name="sec3title" value="{{$section->sec3title??''}}">
                
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">logo over box</label>
                <input type="file" class="form-control img_inpp" name="sec3logo">
                
            </div>
            <div class="mb-3 col-2">
                
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-4">
                <img class="Thumbnail" src="{{ asset('images/default.jpg') }}" width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>
    </div>
    

    

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3content" id="" cols="30" rows="5" class="form-control">{{$section->sec3content??''}}</textarea>
    </div>


    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control " name="sec3btn_text" value="{{$section->sec3btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control " name="sec3btn_url" value={{$section->sec3btn_url??''}}>
        </div>

    </div>

    <h4 class="mx-2">images</h4>
    
    <div class="" id="whatwedo_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="whatwe_doimg[]">
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addwhatwedo_images()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Section 4(Making a difference, one tree at a time)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control" name="sec4_title" value={{$section->sec4_title??''}}>
            </div>
            
            

        </div>

        {{-- content 
    highlights --}}

        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">content</label>
                <textarea id="" class="form-control" name="sec4_content" value={{$section->sec4_content??''}}></textarea>
                
            </div>
            

        </div>

        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">impact hightlights text</label>
                <input type="text" class="form-control" name="sec4_tinytitle" value={{$section->sec4_tinytitle??''}}> 
                
            </div>
            

        </div>


        <div class="" id="impact_highlights">
            <div class="mb-3 row">
                
                {{-- <div class="col-3">
                    <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                </div> --}}
                <div class="col-3">
                    <textarea class="form-control" name="sec4_text[]" cols="30" rows="5"></textarea>
                    
                </div>
                
                <div class="col-3">
                    <button class="btn btn-primary" type="button" onclick="addimpact_highlights()">+</button>
                </div>     
            </div>
        </div>

    

    <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button text(join the mission)</label>
            <input type="text" class="form-control" name="sec4btn_text" value={{$section->sec4btn_text??''}}>
        </div>
    </div>

    <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button url(join the mission)</label>
            <input type="text" class="form-control" name="sec4btn_url" value={{$section->sec3btn_url??''}}>
        </div>
    </div>

    </div>



    
    
    
</section>

<hr>

<section>

            <h3>Section 5(Our Business)</h3>

            {{-- add in the cards here --}}

            <div class="col-6">

                <div class="mb-3">
                    <label for="" class="form-label">title</label>
                    <input type="text" class="form-control" name="sec5_title" value={{$section->sec5_title??''}}>
                </div>
            </div>

            
            <div class="" id="ourbusiness_cards">
                <div class="mb-3 row">
                    
                    <div class="col-3">
                        <input type="file" placeholder="icon" class="form-control" name="sec5_img[]">
                    </div>
                    <div class="col-3">
                        <input type="text" placeholder="icon" class="form-control" name="sec5_stitle[]">
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" name="sec5_scontent[]" cols="30" rows="5"></textarea>
                        
                    </div>
                    
                    <div class="col-3">
                        <button class="btn btn-primary" type="button" onclick="addourbusiness_cards()">+</button>
                    </div>     
                </div>
            </div>

            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Section 6(Our Journey)</h3>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">title</label>
                <input type="text" class="form-control" name="sec6_title" value={{$section->sec6_title??''}}>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control" name="sec6_image">
        
            </div>
        </div>
    </div>

    <div class="col-6">
        <label for="" class="form-label">Text(Steps Towards a thriving tomorrow)</label>
        <input type="text" name="sec6_addtext" class="form-control" value={{$section->sec6_addtext??''}}>


    </div>

    <h4>our journey timestamps</h4>

    <div class="" id="ourjourney_leaves">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="text" placeholder="year" class="form-control" name="sec6year[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="icon" class="form-control" name="sec6stitle[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec6scontent[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addourjourney_leaves()">+</button>
            </div>     
        </div>
    </div>
    

    
</section>



<section>

    <h3>Section 7(Our Purpose & Vision)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec7_title" value={{$section->sec7_title??''}}>
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec7_content" id="" cols="30" rows="5" class="form-control">{{$section->sec7_content??''}}</textarea>
            
        </div>

        <div class="" id="ourpurpose_tabs">
            <div class="mb-3 row">
                
                
                <div class="col-3">
                    <input type="file" placeholder="image" class="form-control" name="sec7_simg[]">
                </div>
                <div class="col-3">
                    <textarea class="form-control" name="sec7_scontent[]" cols="30" rows="5"></textarea>
                    
                </div>
                
                <div class="col-3">
                    <button class="btn btn-primary" type="button" onclick="addourpurpose_tabs()">+</button>
                </div>     
            </div>
        </div>

        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control" name="sec7btn_text" value={{$section->sec7btn_text??''}}>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec7btn_url" value={{$section->sec7btn_url??''}}>
            
        </div>
    </div>


</section>

<section>

    <h3>Section 8(What we are working on)</h3>

    <div class="row">
      {{-- cards part --}}
      <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec8_title" value={{$section->sec8_title??''}}>

      </div>
    </div>

    <div class="" id="whatwork_tabs">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="sec8_slogo[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec8_scontent[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <input type="text" placeholder="icon" class="form-control" name="sec8_slink[]">
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addwhatwork_tabs()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Section(Technology-Driven Agriculture)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec9title" value={{$section->sec9title??''}}>
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec9content" id="" cols="30" rows="5" class="form-control">{{$section->sec9content??''}}</textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(Learn about our technology text)</label>
            <input type="text" class="form-control" name="sec9btn_text" value={{$section->sec9btn_text??''}}>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec9btn_url" value={{$section->sec9btn_url??''}}>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">features text</label>
            <input type="text" class="form-control" name="sec9_featurestext" value={{$section->sec9_featurestext??''}}>
            
        </div>
    </div>

    <div class="" id="techimg_tabs">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec9_simg[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec9_scontent[]" cols="30" rows="5"></textarea>
                
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addtechimg_tabs()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Section(Our Purpose & Values)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec10_title" value={{$section->sec10_title??''}}>
    </div>

    <div class="" id="pvalue_tabs">
        <div class="mb-3 row">
            <div class="col-3">
                <input type="text" placeholder="tab name" class="form-control" name="sec10_stitle[]">
            </div>
            
            <div class="col-3">
                <input type="file" placeholder="tab image" class="form-control" name="sec10_simg[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec10_scontent[]" cols="30" rows="5"></textarea>
                
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addpvalue_tabs()">+</button>
            </div>     
        </div>
    </div>

</section>

<hr>

<section>

    <h3>Section(Empowering Communities & the Planet)</h3>

    <div class="row">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">banner image</label>
                    <input type="file" class="form-control img_inpp" name="sec11_image">
                    
                </div>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-4">
                <img class="Thumbnail" src="{{ asset('images/default.jpg') }}" width="400" alt="Default Video Thumbnail">
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control"  name="sec11_title" value={{$section->sec11_title??''}}>
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="sec11_content" id="" cols="30" rows="5" class="form-control">{{$section->sec11_content??''}}</textarea>
            
        </div>
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>


</section>

<section>

    <h3>Section(Badges)</h3>

    {{-- cards for the other part as well --}}


    <div class="" id="badge_tabs">
        <div class="mb-3 row">
            
            
            
            <div class="col-3">
                <textarea class="form-control" name="sec12_scontent[]" cols="30" rows="5"></textarea>
                
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addbadge_tabs()">+</button>
            </div>     
        </div>
    </div>


</section>

<section>

    <h3>Section(Be a part of the change)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec13_title" value={{$section->sec13_title??''}}>
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec13_content" id="" cols="30" rows="5" class="form-control">value={{$section->sec13_content??''}}</textarea>
            
        </div>
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>

    <hr>

    <div class="" id="partchange_tabs">
        <div class="mb-3 row">
            
            
            
            <div class="col-3">
                <textarea class="form-control" name="sec13_scontent[]" cols="30" rows="5"></textarea>
                
            </div>

            <div class="col-3">
                <input type="text" class="form-control" name="sec13_slink[]">
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addpartchange_tabs()">+</button>
            </div>     
        </div>
    </div>

    {{-- add in the cards for the rest --}}


</section>

<section>

    <h3>Section(Get in touch)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec14_title" value={{$section->sec14_title??''}}>
            
        </div>
        <div class="col-12 mb-3">
            
            <label for="" class="form-label">text</label>
            <textarea name="sec14_content" id="" cols="30" rows="5" class="form-control">{{$section->sec14_content??''}}</textarea>
            
        </div>
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>

</section>

    <hr>

    <section>

        <h3>Map link google (section)</h3>
    
        <div class="row">
            <div class="col-12 mb-3">
                <label for="" class="form-label">map link</label>
                <input type="text" class="form-control" name="map_code" value={{$section->map_code??''}}>
                
            </div>
          
        </div>
    
    
    </section>




<button class="btn btn-primary">submit</button>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection


@push('scripts')

<script>
    let field1=document.getElementById('whatwedo_images');

    let field2=document.getElementById('impact_highlights');

    let field3=document.getElementById('ourbusiness_cards');

    let field4=document.getElementById('ourjourney_leaves');

    let field5=document.getElementById('ourpurpose_tabs');

    let field6=document.getElementById('whatwork_tabs');

    let field7=document.getElementById('techimg_tabs');

    let field8=document.getElementById('pvalue_tabs');

    let field9=document.getElementById('badge_tabs');

    let field10=document.getElementById('partchange_tabs');

    function addwhatwedo_images(){

       


field1.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
        {{-- <div class="col-3">
            <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
        </div> --}}
       
        <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="whatwe_doimg[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="add_input_service()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addimpact_highlights(){

       


field2.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                    <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                    
                </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addimpact_highlights()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addourbusiness_cards(){

       


field3.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                        <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                    </div>
                    <div class="col-3">
                        <input type="text" placeholder="icon" class="form-control" name="icon_service[]">
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                        
                    </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addourbusiness_cards()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addourjourney_leaves(){

       


field4.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                <input type="text" placeholder="icon" class="form-control" name="icon_service[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="icon" class="form-control" name="icon_service[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addourjourney_leaves()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addourpurpose_tabs(){

       


field5.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                    <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                </div>
                <div class="col-3">
                    <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                    
                </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addourpurpose_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addwhatwork_tabs(){

       


field6.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <input type="text" placeholder="icon" class="form-control" name="link[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addourpurpose_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addtechimg_tabs(){

       


field7.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addtechimg_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addpvalue_tabs(){

       


field8.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    <div class="col-3">
                    <input type="text" placeholder="icon" class="form-control" name="icon_service[]">
                </div>
    <div class="col-3">
                    <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                </div>
                <div class="col-3">
                    <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                    
                </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addpvalue_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addbadge_tabs(){

       


field9.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addbadge_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addpartchange_tabs(){

       


field10.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
    <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>

            <div class="col-3">
                <input type="text" class="form-control">
            </div>
         
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addpartchange_tabs()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}










function remove_input(el){

console.log(el.parentElement);

let parent=el.parentElement;
let superparent=parent.parentElement

superparent.remove();


}



//script for the video preview part 


let videothumb=document.querySelectorAll('.videoThumbnail');
let videoprev=document.querySelectorAll('.videoPreview');

console.log(videothumb);
console.log(videoprev);

let videoinputs=document.querySelectorAll('.VideoInput');

videoinputs.forEach((v,i)=>{

    console.log('videoinput');

    v.addEventListener('change',(e)=>{

        let file = event.target.files[0]; // Get the selected file
        // let videoElement = document.getElementById('videoPreview');
        // let thumbnail = document.getElementById('videoThumbnail');

        if (file) {
            let videoUrl = URL.createObjectURL(file); // Create object URL

            videoprev[i].src = videoUrl; // Set video source
            videoprev[i].style.display = 'block'; // Show video
            videothumb[i].style.display = 'none'; // Hide the thumbnail
        }

    })
});


//script for video clear button

let vidclear=document.querySelectorAll('.clear-vidbtn');

vidclear.forEach((v,i)=>{
    v.addEventListener('click',()=>{
        videothumb[i].style.display = 'block'; // Hide the thumbnail
        videoprev[i].style.display = 'none'; // Show video
        videoinputs[i].value='';
        videoprev[i].src ='';
    })
})


//script for photo clear button

let clearBtns=document.querySelectorAll('.clear-btn');

clearBtns.forEach((v,i)=>{
  v.addEventListener('click',function(){

    const img = document.querySelectorAll('.Thumbnail')[i];

  
    img.src=`{{asset('images/default.jpg')}}`;
    
console.log(document.querySelectorAll('.img_inpp'));
    document.querySelectorAll('.img_inpp')[i].value='';

  });
})


//script for the image inputs preview

// Loop through each file input

let imageInputs=document.querySelectorAll('.img_inpp');
let thumb=document.querySelectorAll('.Thumbnail');

imageInputs.forEach((input, index) => {
  console.log('this isthe index first',index);
    input.addEventListener('change', function(event) {
      console.log('this the index real',index);
        const file = event.target.files[0]; // Get the selected file

        if (file) {
            const reader = new FileReader(); // Create a FileReader object

            reader.onload = function(e) {
                // Get the corresponding image preview element
                const img = thumb[index];
                console.log('this is the index',index,img);
                img.src = e.target.result; // Set the image source to the file's data URL
                img.style.display = 'block'; // Show the image
            }

            reader.readAsDataURL(file); // Read the file as a data URL
        }
    });

   
});




</script>
@endpush