@extends('app.layout')


@push('styles')

<style>
h1{color:'red'}
</style>

{{-- <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/> --}}


<link href="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.css
" rel="stylesheet"/>

<link href="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css
" rel="stylesheet">

@endpush

@section('content')

<div class="page-header d-print-none">

   <!-- Modal -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal_content">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>

    <div class="container-xl">
        <h1>Papaya</h1>



<form action="{{url('/admin/add_papaya')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1(Premium Papaya Cultivation
with Atulye Krishi Vana)</h3>

      

        <div class="mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" name="sec1title" class="form-control" value="{{$section->sec1title??''}}">
        </div>


        
        <div class="row">

          <div class="mb-3">
            <div class="mx-2">
                <label for="" class="form-label">content</label>
                 <textarea name="sec1text" id="" cols="30" rows="10" class="form-control">{{$section->sec1text??''}}</textarea>
            </div>

        </div>


            <div class="mb-3 col-6">
                <label for="" class="form-label">banner image</label>
                <input type="file" class="form-control img_inpp" name="sec1image">
                
            </div>
            <div class="mb-3 col-2 pt-4">
                
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-4">
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset_env('images/'.$section->sec1image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>


    </section>

<hr>


<section>

    <h3>Section 2(Top Papaya Varieties for Commercial Cultivation)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec2title" class="form-control" value="{{$section->sec2title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">additional text</label>
        <input type="text" name="sec2text" class="form-control" value="{{$section->sec2text??''}}">
    </div>

    {{-- <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">main image</label>
            <input type="file" class="form-control img_inpp" name="sec2image">
        </div>
        <div class="mb-3 col-2">
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset_env('images/'.$section->sec2image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
        </div>
    </div> --}}

    <h4>papaya varieties</h4>

    <div id="sec2_images">
        <div class="mb-3 row">
            
             
            <div class="col-3">
                <input type="file" placeholder="papaya image" class="form-control" name="sec2imagel[]" >
            </div>
            
            <div class="col-3">
                
              <input type="text" placeholder="name" class="form-control" name="sec2titlel[]">
              
                
            </div>

            <div class="col-3">
                
              <textarea class="form-control" name="sec2pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec2_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec2_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>

    

    

   

    

</section>


<hr>

<section>

    

    <h3>Section 3 (Ideal Soil & Climate for Papaya Farming)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec3title" value="{{$section->sec3title??''}}">
    </div>

    {{-- now i need to give an option for multiple services along with their names and stuff in here super quick the part has to be editable in it's entirety in here  --}}

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3text" id="" cols="30" rows="10" class="form-control">{{$section->sec3text??''}}</textarea>
 
        {{-- <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea> --}}
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Soil Selection:</label>
        <input type="text" name="sec3addtext" class="form-control" value="{{$section->sec3addtext??''}}">
        
    </div>

    
    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <input type="text" class="form-control " name="sec3text" value="{{$section->sec3text??''}}">
        {{-- <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea> --}}
    </div>


    <div class="mb-3">
        <label for="" class="form-label">points</label>
        <textarea name="sec3points" id="" cols="30" rows="10" class="form-control">{{$section->sec3points??''}}</textarea>
 
        {{-- <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea> --}}
    </div>


    <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">banner image</label>
                <input type="file" class="form-control img_inpp" name="sec3image">
                
            </div>
            <div class="mb-3 col-2 pt-4">
                
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-4">
                <img class="Thumbnail" src="{{ optional($section)->sec3image ? asset_env('images/'.$section->sec3image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>
    

 {{-- need to add in image ,heading and content in here --}}



    {{-- button in the last --}}
    


</section>

<hr>

<section>

    <h3>Section 4(Sowing and Nursery Management)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div>

            <div>

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" name="sec4title" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
                </div>

                

                

            </div>
            
            
            

        </div>


    </div>


    <div class="" id="sec4_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec4imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec4titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec4pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec4_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec4_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>




    
    
    
</section>

<hr>
<section>

            <h3>Section 5(Papaya Planting & Spacing Guidelines)</h3>

           

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" class="form-control" name="sec5title" value="{{$section->sec5title??''}}">
                </div>
                
                
    
            </div>

            <h4 class="mx-2">images</h4>
    
            <div class="" id="sec5_images">
                <div class="mb-3 row">
                    
                    <div class="col-3">
                      <textarea name="" id="" cols="30" rows="10" class="form-control" name="sec5textl"></textarea>
                        
                    </div>
                    
                    
                    <div class="col-3">
                        <button class="btn btn-primary" type="button" onclick="addsec5_images()">+</button>
                    </div>     
                </div>
            </div>
        
            <table class="table" id="sec5_table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">text</th>
                    
                    {{-- <th scope="col">Url</th> --}}
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>


            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Section 6(Smart Irrigation Strategies for Maximum Yield)</h3>

    {{-- image content and other stuff --}}

            {{-- add in the cards here --}}

            {{-- add in the card stuff for this  --}}

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}

    
    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec6title" class="form-control" value="{{$section->sec6title??''}}">
    </div>

    

    
    
    


  

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec6image" >
            
        </div>
        <div class="mb-3 col-2 pt-4">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset_env('images/'.$section->sec6image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>


    <div class="" id="sec6_images">
        <div class="mb-3 row">
            
          
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec6pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec6_images()">+</button>
            </div>     
        </div>
    </div>

    <h5>points</h5>
    <table class="table" id="sec6_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>


</section>


    {{-- //input for adding in the points --}}

<hr>

<section>

    <h3>Section 7(Market Demand & Supply)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec7title" value="{{$section->sec7title??''}}">
            
        </div>
     </div>

    <h5>points</h5>
    <div class="" id="sec7_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec7imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec7titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec7pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec7_images()">+</button>
            </div>     
        </div>
    </div>
{{-- test --}}
{{-- tata --}}
{{-- comment --}}
    
    <table class="table" id="sec7_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>


</section>

<hr>

<section>

    <h3>Section 8(Aftercare & Maintenance)</h3>

    {{-- add in the multiple input fields for this  --}}



    <div class="row">

      <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec6image" >
            
        </div>
        <div class="mb-3 col-2 pt-4">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec8image ? asset_env('images/'.$section->sec8image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec8title" value="{{$section->sec8title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">content(include the points too along with subtext)</label>
            <textarea name="sec8text" id="" cols="30" rows="5" class="form-control">{{$section->sec8text??''}}</textarea>
        </div>
        

       

        
        
    </div>


</section>

<section>

    <h3>Section 9(Pest and Disease Management)</h3>


    <div class="row">

      <div class="col-12 mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec9title" value="{{$section->sec9title??''}}">
        
    </div>


    <h5>images</h5>
    <div class="" id="sec9_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec9imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec9titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec9pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec9_images()">+</button>
            </div>     
        </div>
    </div>

    </div>
    


</section>

<hr>
<section>

  <h3>Section 10(Papain Extraction – A Profitable By-Product)</h3>


  <div class="row">

    <div class="col-12 mb-3">
      <label for="" class="form-label">title</label>
      <input type="text" class="form-control" name="sec10title" value="{{$section->sec10title??''}}">
      
  </div>

  <div class="col-12 mb-3">
    <label for="" class="form-label">content</label>
    <input type="text" class="form-control" name="sec10content" value="{{$section->sec10content??''}}">
    
</div>

<div class="col-12 mb-3">
  <label for="" class="form-label">additional text(extraction process)</label>
  <input type="text" class="form-control" name="sec9title" value="{{$section->sec10addtext??''}}">
  
</div>


  <h5>boxes</h5>
  <div class="" id="sec10_images">
      <div class="mb-3 row">
          
         
          
          <div class="col-3">
              <textarea class="form-control" name="sec10pointsl[]" cols="30" rows="5"></textarea>
              
          </div>

          <div class="col-3">
            <input type="text" placeholder="link" class="form-control" name="sec10linkl[]">
        </div>
          
          <div class="col-3">
              <button class="btn btn-primary" type="button" onclick="addsec10_images()">+</button>
          </div>     
      </div>
  </div>

  </div>
  


</section>
<hr>

<section>

  <h3>Section 11(Seed Technology for high germination)</h3>


  <div class="row">

    <div class="row">
      <div class="mb-3 col-6">
          <label for="" class="form-label">banner image</label>
          <input type="file" class="form-control img_inpp" name="sec11image" >
          
      </div>
      <div class="mb-3 col-2 pt-4">
          
          <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
      </div>
      <div class="mb-3 col-4">
          <img class="Thumbnail" src="{{ optional($section)->sec11image ? asset_env('images/'.$section->sec11image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
          
      </div>
  </div>

    <div class="col-12 mb-3">
      <label for="" class="form-label">title</label>
      <input type="text" class="form-control" name="sec11title" value="{{$section->sec11title??''}}">
      
  </div>

  <div class="col-12 mb-3">
    <label for="" class="form-label">content</label>
    <textarea name="sec11text" id="" cols="30" rows="10" class="form-control">{{$section->sec11text??''}}</textarea>
    
    
</div>



  </div>
  


</section>

<hr>

<section>

  <h3>Section 12(Why Choose Atulye Krishi Vana for Papaya Farming?)</h3>


  <div class="row">

    <div class="row">
      <div class="mb-3 col-6">
          <label for="" class="form-label">banner image</label>
          <input type="file" class="form-control img_inpp" name="sec12image" >
          
      </div>
      <div class="mb-3 col-2 pt-4">
          
          <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
      </div>
      <div class="mb-3 col-4">
          <img class="Thumbnail" src="{{ optional($section)->sec12image ? asset_env('images/'.$section->sec12image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
          
      </div>
  </div>

    

  <div class="col-12 mb-3">
    <label for="" class="form-label">content</label>
    <textarea name="sec12text" id="" cols="30" rows="10" class="form-control">{{$section->sec12text??''}}</textarea>
    
    
</div>



  </div>
  


</section>


<div class="text-end p-3" style="bottom:0;position:sticky;">
  <button class="btn btn-lg btn-primary p-3"><i class="bi bi-floppy2-fill mx-2"></i>Save</button>
</div>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection


@push('scripts')



<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>

<script>

    FilePond.registerPlugin(FilePondPluginImagePreview);

    let x_token=document.querySelector("meta[name='csrf-token']").getAttribute('content');

    let field1=document.getElementById('sec2_images');
    let field2=document.getElementById('sec4_images');
    let field3=document.getElementById('sec5_images');
    let field4=document.getElementById('sec6_images');
    let field5=document.getElementById('sec7_images');
    let field6=document.getElementById('sec9_images');
    let field7=document.getElementById('sec10_images');

   

  

    function addsec2_images(){

       


field1.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
        {{-- <div class="col-3">
            <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
        </div> --}}
       
<div class="col-3">
                <input type="file" placeholder="papaya image" class="form-control" name="sec2imagel[]" >
            </div>
            
            <div class="col-3">
                
              <input type="text" placeholder="name" class="form-control" name="sec2titlel[]">
              
                
            </div>

            <div class="col-3">
                
              <textarea class="form-control" name="sec2pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
            
        
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec2_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec4_images(){

       


field2.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
   <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec4imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec4titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec4pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec4_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec5_images(){

       


field3.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                      <textarea name="" id="" cols="30" rows="10" class="form-control" name="sec5textl"></textarea>
                        
                    </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec5_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);}


function addsec6_images(){

       


field4.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec6pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec6_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec7_images(){

       


field5.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
<div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec7imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec7titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec7pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec7_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}



function addsec9_images(){

       


field6.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec9imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec9titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec9pointsl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec9_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec10_images(){

       


field7.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
              <textarea class="form-control" name="sec10pointsl[]" cols="30" rows="5"></textarea>
              
          </div>

          <div class="col-3">
            <input type="text" placeholder="link" class="form-control" name="sec10linkl[]">
        </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec6_images()">+</button>
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

  
    img.src=`{{asset_env('images/default.jpg')}}`;
    
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


// datatable part

var table1=$('#sec2_table').DataTable({
              ajax:"{{url('admin/papayatable/section2')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"title"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  });

  var table2=$('#impacthighlight_table').DataTable({
              ajax:"{{url('/hometable/section4')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"text"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  });

  var table3=$('#ourbusiness_table').DataTable({
              ajax:"{{url('/hometable/section5')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"image"},
                {"data":"title"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  });

  var table4=$('#ourjourney_table').DataTable({
              ajax:"{{url('/hometable/section6')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"year"},
                {"data":"title"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })


  var table5=$('#purposeNvision_table').DataTable({
              ajax:"{{url('/hometable/section7')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"image"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })


  var table6=$('#whatwork_table').DataTable({
              ajax:"{{url('/hometable/section8')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"logo"},
                {"data":"content"},
                {"data":"link"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })


  var table7=$('#techimg_table').DataTable({
              ajax:"{{url('/hometable/section9')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"image"},
                {"data":"content"},
                // {"data":"description"},
                {"data":"actions"}
              ],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })


  var table8=$('#pvalue_table').DataTable({
              ajax:"{{url('/hometable/section10')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"image"},
                {"data":"title"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })


  var table9=$('#badge_table').DataTable({
              ajax:"{{url('/hometable/section12')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"content"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  });


  var table10=$('#partchange_table').DataTable({
              ajax:"{{url('/hometable/section13')}}",
              processing:true,
              columns:[
                {"data":"id"},
                {"data":"content"},
                {"data":"link"},
                // {"data":"description"},
                {"data":"actions"}],
              order:[],
              dom:'Bfrtip',
              buttons:[{
                       extend:'copy',
                       exportOptions:{modifier:{
                        page:'current'
                       }}
              },{
                extend:'csv',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'excel',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'pdf',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              },{
                extend:'print',
                exportOptions:{
                  modifier:{
                    page:'current'
                  }
                }
              }]
  })

  //mapping section tables

  const tableMap = {
    "section2": table1,
    "section4": table2,
    "section5": table3,
    "section6": table4,
    "section7": table5,
    "section9": table6,
    "section10": table7,
    
};


// Function to reload the correct table
function reloadTable(sectionName) {
    if (tableMap[sectionName]) {
        tableMap[sectionName].ajax.reload(null, false); // Reload the specific table
    } else {
        console.error("No matching table found for section:", sectionName);
    }
}

  //code for editer button modal

  let modal_body=document.getElementById('modal_content');
  let labelmod=document.getElementById('staticBackdropLabel');

  

  async function changeModal_content(type,button,id){

    if(button=='editor'){
      labelmod.textContent='EDIT';
    }else{
      labelmod.textContent='DELETE';
    }

    console.log('this is the button',button);

    modal_body.innerHTML=`<div class="d-flex justify-content-center">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>`;

   //resource call

  //  type in loading for loading in the resource..

  let fet=await fetch(`{{url('/admin')}}/get_resource_papaya/${type}/${id}`);
  
  let res=await fet.json();

  console.log(res);

  // console.log('this is the url'+`{{url('/')}}/get_resource/${type}`);



    FilePond.destroy(document.querySelector('.filepond')); 

    let content=null;
    let img=false;
    let pond=null;
    let imglink=null;

  //   let icon_url=document.getElementById('icon_url');
  // const pond2=FilePond.create(icon_url);

   if(button!='eradicator'){

    switch(type){

case "section2":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.title}" name="sec5_stitle">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec5_scontent">${res.sectionData.points}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod">Update</button>
      
      </form>`;
      img=true;
      imglink=`{{asset_env('/images')}}/${res.sectionData.image}`;
break;
case "section4":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.title}" name="sec5_stitle">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec5_scontent">${res.sectionData.points}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">   
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
break;d
case "section5":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec5_stitle}" name="sec5_stitle">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec5_scontent">${res.sectionData.sec5_scontent}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec5_img}`;
break;
case "section6":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Year</label>
      <input class="form-control" type="text" value="${res.sectionData.sec6year}" name="sec6year">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec6stitle}" name="sec6stitle">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec6scontent">${res.sectionData.sec6scontent}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
break;
case "section7":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec7_scontent">${res.sectionData.sec7_scontent}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec7_simg}`;
break;
case "section9":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec8_scontent">${res.sectionData.sec8_scontent}</textarea>
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Link</label>
      <input class="form-control" type="text" value="${res.sectionData.sec8_slink}" name="sec8_slink">
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec8_slogo}`;
break;
case "section10":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec9_scontent">${res.sectionData.sec9_scontent}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      d
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec9_simg}`;
break;

default:
content=`utc`;
  break;


}


   }else{

    
    content=`<form id="dynForm"><h4 class="text-center">You sure you want to delete this ?</h4>
              <div class="d-flex justify-content-center"> <input type="hidden" value="${id}" name="id"><button class="btn btn-primary" id="delete_btnmod">Yes</button></div></form>`;
   } 


    
    console.log('value of content is',content);

    modal_body.innerHTML=content;

    if(img){

      let imz=document.querySelector('.filepond');
      pond=FilePond.create(imz);

      pond.addFile(imglink);

      


    }

    let dynform=document.getElementById('dynForm');

    dynform.addEventListener('submit',async(e)=>{

      e.preventDefault();

      let data=new FormData(dynform);

      if(button=='editor'){

        let update_btnmod=document.getElementById('update_btnmod');
      

      update_btnmod.textContent='Updating...';

      // console.log('form submission');
      

      if(img){
        if(pond.getFile(0)){

console.log('file is there');

data.append('image',pond.getFile().file);
}else{
console.log('file is not there');
}
      }
      

      let fetchf=await fetch(`{{url('/update_homesection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
      

      let resf=await fetchf.json();

      console.log('this is the response',resf);

      update_btnmod.textContent='Update';

      Swal.fire({
  title: `${resf.status.charAt(0).toUpperCase()+resf.status.slice(1)}!`,
  text: `${resf.message}`,
  icon: `${resf.status}`,
  confirmButtonText: 'OK'
});

      reloadTable(type);

      }else{

        let delete_btnmod=document.getElementById('delete_btnmod');

        delete_btnmod.textContent='Deleting...';
        let mod_close=document.querySelector('.btn-bs-close');
      



        let fetchf=await fetch(`{{url('/remove_homesection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
        let resf=await fetchf.json();

        Swal.fire({
  title: `${resf.status.charAt(0).toUpperCase()+resf.status.slice(1)}!`,
  text: `${resf.message}`,
  icon: `${resf.status}`,
  confirmButtonText: 'OK'
});

mod_close.click();

reloadTable(type);



      }

      

      

      // let routeUrl=getrouteUrl(button,type);

    })





  }

  $(document).on('click','.editer',async function(){

      console.log('you clicked on an editor');

      console.log('this is the section',this.getAttribute('data-type'));

      changeModal_content(this.getAttribute('data-type'),'editor',this.getAttribute('data-id'));


  });

  $(document).on('click','.eradicator',async function(){

    console.log('you clicked on eradicator');

    console.log('this is the section',this.getAttribute('data-type'));

    changeModal_content(this.getAttribute('data-type'),'eradicator',this.getAttribute('data-id'));

  });

</script>

@endpush