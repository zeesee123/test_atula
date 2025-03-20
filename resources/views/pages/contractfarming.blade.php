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
        <h1>Contract Farming</h1>



<form action="{{url('/add_ecoinitiativepage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1(A Journey Towards Prosperous Sustainability)</h3>

      

        <div class="mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" name="sec1title" class="form-control" value="{{$section->sec1title??''}}">
        </div>


        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text(Join Our Mission)</label>
                <input type="text" class="form-control " name="sec1btn_text" value="{{$section->sec1btn_text??''}}">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control " name="sec1btn_url" value="{{$section->sec1btn_url??''}}">
            </div>

        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">banner image</label>
                <input type="file" class="form-control img_inpp" name="sec1image">
                
            </div>
            <div class="mb-3 col-2">
                
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-4">
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset('ecoinitiative/'.$section->sec1image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>


    </section>

<hr>


<section>

    <h3>Section 2(Reviving Ecosystems,Empowering Communities)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec2title" class="form-control" value="{{$section->sec2title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <input type="text" name="sec2text" class="form-control" value="{{$section->sec2text??''}}">
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">main image</label>
            <input type="file" class="form-control img_inpp" name="sec2image">
        </div>
        <div class="mb-3 col-2">
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('ecoinitiative/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
        </div>
    </div>

    <h4>points</h4>

    <div id="sec2_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec2titlel[]" >
            </div>
            
            <div class="col-3">
                <textarea class="form-control" name="sec2textl[]" cols="30" rows="5"></textarea>
                
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

    <div class="mb-3 d-flex">
        
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" name="sec2btn_text" class="form-control" value="{{$section->sec2btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" name="sec2btn_url" class="form-control" value="{{$section->sec2btn_url??''}}">
        </div>

    </div>

    <h4>Inputs for badge(green one with yellow logo)</h4>

    <div class="mb-3">
        <label for="" class="form-label">text</label>
        <input type="text" name="sec2badgetext" class="form-control" value="{{$section->sec2badgetext??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">figure</label>
        <input type="text" name="sec2badgefigure" class="form-control" value="{{$section->sec2badgefigure??''}}">
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec2badgelogo">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2badgelogo ? asset('ecoinitiative/'.$section->sec2badgelogo) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    

</section>


<hr>

<section>

    

    <h3>Section 3 (Objectives)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec3title" value="{{$section->sec3title??''}}">
    </div>

    {{-- now i need to give an option for multiple services along with their names and stuff in here super quick the part has to be editable in it's entirety in here  --}}

    <div class="mb-3">
        <label for="" class="form-label">subtitle</label>
        <input type="text" class="form-control " name="sec3addtext" value="{{$section->sec3addtext??''}}">
        {{-- <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea> --}}
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3text" id="" cols="30" rows="5" class="form-control">{{$section->sec3text??''}}</textarea>
    </div>


    <div class="" id="sec3_images">
        <div class="mb-3 row">
            
            <div class="col-6 mb-2">
                <input type="file" placeholder="image" class="form-control" name="sec3imagel[]">
            </div>
            <div class="col-6 mb-2">
                <input type="text" placeholder="title" class="form-control" name="sec3titlel[]">
            </div>
            <div class="col-5">
                <textarea class="form-control" name="sec3textl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec3_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec3_table">
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

 {{-- need to add in image ,heading and content in here --}}



    {{-- button in the last --}}
    


</section>

<hr>

<section>

    <h3>Section 4(CSR Projects)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div>

            <div>

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" name="sec4title" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
                </div>

                <div class="mb-3">
                    <label class="form-label">subtitle</label>
                    <input type="text" class="form-control" name="sec4addtext" value="{{$section->sec4addtext??''}}">
                </div>

                <div class="mb-3">
                    <label class="form-label">content</label>
                    <textarea name="sec4text"  cols="30" rows="5" class="form-control">{{$section->sec4text??''}}</textarea>
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
                <textarea class="form-control" name="sec4contentl[]" cols="30" rows="5"></textarea>
                
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

            <h3>Section 5(CSR Activities)</h3>

           

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
                        <input type="file" placeholder="add image" class="form-control" name="sec5imagel[]">
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
                    <th scope="col">image</th>
                    
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

    <h3>Section 6(Agroforestry & Sustainability)</h3>

    {{-- image content and other stuff --}}

            {{-- add in the cards here --}}

            {{-- add in the card stuff for this  --}}

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}

    
    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec6title" class="form-control" value="{{$section->sec6title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">subheading</label>
        <textarea name="sec6text" id="" cols="30" rows="10" class="form-control">{{$section->sec6text??''}}</textarea>
    </div>

    
    <div class="" id="sec6_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec6imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec6contentl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec4_images()">+</button>
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

    


    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(explore our agroforestry projects)</label>
            <input type="text" class="form-control " name="sec6btn_text" value="{{$section->sec6btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control " name="sec6btn_url" value="{{$section->sec6btn_url??''}}">
        </div>

    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec6image" >
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset('ecoinitiative/'.$section->sec6image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

</section>


    {{-- //input for adding in the points --}}

<hr>

<section>

    <h3>Section 7(Achievements)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec7title" value="{{$section->sec7title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">sub text</label>
            <input type="text" class="form-control" name="sec7addtext" value="{{$section->sec7addtext??''}}">
            
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
                <textarea class="form-control" name="sec7contentl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec7_images()">+</button>
            </div>     
        </div>
    </div>

    
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

    <h3>Section 8(Future Vision)</h3>

    {{-- add in the multiple input fields for this  --}}

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec8title" value="{{$section->sec8title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">subtitle</label>
            <textarea name="sec8text" id="" cols="30" rows="5" class="form-control">{{$section->sec8text??''}}</textarea>
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">another additional text</label>
            <textarea name="sec8addtext" id="" cols="30" rows="5" class="form-control">{{$section->sec8addtext??''}}</textarea>
        </div>

        <h5>points</h5>

        <div class="" id="sec8_images">
            <div class="mb-3 row">
                
                
                <div class="col-3">
                    <textarea class="form-control" name="sec8contentl[]" cols="30" rows="5"></textarea>
                    
                </div>
                
                <div class="col-3">
                    <button class="btn btn-primary" type="button" onclick="addsec8_images()">+</button>
                </div>     
            </div>
        </div>
    
        
        <table class="table" id="sec8_table">
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
        
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the movemement)</label>
            <input type="text" class="form-control" name="sec8btn_text" value="{{$section->sec8btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec8btn_url" value="{{$section->sec8btn_url??''}}">
            
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

    let field1=document.getElementById('sec1_images');

    let field2=document.getElementById('sec3_images');

    let field3=document.getElementById('sec4_images');

    let field4=document.getElementById('sec5_images');

    let field5=document.getElementById('sec6_images');

  

    function addsec1_images(){

       


field1.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
        {{-- <div class="col-3">
            <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
        </div> --}}
       
       <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="sec1imagel[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec1_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec3_images(){

       


field2.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
   <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="sec3imagel[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec3_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec4_images(){

       


field3.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec4imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec4titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec4textl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec4_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addsec5_images(){

       


field4.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec5titlel[]">
            </div>
            
            <div class="col-3">
                <textarea class="form-control" name="sec5textl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec5_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec6_images(){

       


field5.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
     <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec6imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec6textl[]" cols="30" rows="5"></textarea>
                
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


// datatable part

var table1=$('#whatwedo_table').DataTable({
              ajax:"{{url('/hometable/section3')}}",
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
    "section3": table1,
    "section4": table2,
    "section5": table3,
    "section6": table4,
    "section7": table5,
    "section8": table6,
    "section9": table7,
    "section10": table8,
    "section12": table9,
    "section13": table10
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

  let fet=await fetch(`{{url('/')}}/get_resource/${type}/${id}`);
  
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

case "section3":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod">Update</button>
      </div>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.whatwe_doimg}`;
break;
case "section4":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec4_text">${res.sectionData.sec4_text}</textarea>
      
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
break;
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
case "section8":
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
case "section9":
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
      
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec9_simg}`;
break;
case "section10":
content=`<form id="dynForm">
  <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" name="sec10_stitle" value="${res.sectionData.sec10_stitle}">
      </div>
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec10_scontent">${res.sectionData.sec10_scontent}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.sec10_simg}`;

  
break;
case "section12":
content=`<form id="dynForm">
  
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec12_scontent">${res.sectionData.sec12_scontent??''}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      
      <button class="btn btn-success"  id="update_btnmod" >Update</button>
      </form>`;


break;
case "section13":
content=`<form id="dynForm">
  
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" name="id">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec13_scontent">${res.sectionData.sec13_scontent}</textarea>
      </div>

      <div class="mb-3">
      <label for="" class="form-label">Link</label>
      <input class="form-control" type="text" value="${res.sectionData.sec13_slink}" name="sec13_slink">
      </div>
      <input type="hidden" value="${id}" name="id">
      
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/')}}/homepage/${res.sectionData.image}`;
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