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
    <div class="modal-dialog modal-dialog-centered" id="dialogpart">
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
        <h1>A&M Agriventure</h1>



<form action="{{url('/admin/add_agriventurepage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1(Welcome to A&M Agriventures Pvt. Ltd.)</h3>

      

        <div class="mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" name="sec1title" class="form-control" value="{{$section->sec1title??''}}">
        </div>

        

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="sec1text" id="" cols="30" rows="5" class="form-control">{{$section->sec1text??''}}</textarea>
        </div>

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text</label>
                <input type="text" class="form-control" name="sec1btn_text" value="{{$section->sec1btn_text??''}}">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control" name="sec1btn_url" value="{{$section->sec1btn_url??''}}">
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
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset('agriventure/'.$section->sec1image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>


    </section>

<hr>


<section>

    <h3>Section 2(Welcome to A&M Agriventures Pvt. Ltd.)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec2title" class="form-control" value="{{$section->sec2title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">sub heading</label>
        <input type="text" name="sec2addtext" class="form-control" value="{{$section->sec2addtext??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec2text" id="" cols="30" rows="5" class="form-control">{{$section->sec2text??''}}</textarea>
    </div>

    {{-- <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control ">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control ">
        </div>

    </div> --}}

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec2image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('agriventure/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>


</section>


<hr>

<section>

    

    <h3>Section 3 (Who We Are)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec3title" value="{{$section->sec3title??''}}">
    </div>

    {{-- now i need to give an option for multiple services along with their names and stuff in here super quick the part has to be editable in it's entirety in here  --}}

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3text" id="" cols="30" rows="10" class="form-control">{{$section->sec3text??''}}</textarea>
    </div>

    

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(More about us)</label>
            <input type="text" class="form-control " name="sec3btn_text" value="{{$section->sec3btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control " name="sec3btn_url" value="{{$section->sec3btn_url??''}}">
        </div>

    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec3image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec3image ? asset('agriventure/'.$section->sec3image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>



    {{-- button in the last --}}
    


</section>

<hr>

<section>

    <h3>Section 4(Mission & Vision)</h3>

    {{-- heading --}}

    <div class="" id="sec4_images">
        <div class="mb-3 row">
            
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

            <h3>Section 5(Our projects)</h3>

            {{-- add in the cards here --}}

            {{-- leave the image part for now it could get changed for some reason --}}

            
    <div class="" id="sec5_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="image 1" class="form-control" name="sec5img1l[]">
            </div>
            <div class="col-3">
                <input type="file" placeholder="image 2" class="form-control" name="sec5img2l[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec5titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec5textl[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <textarea placeholder="achieve" class="form-control" name="sec5achieve[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <textarea placeholder="tech" class="form-control" name="sec5tech[]" cols="30" rows="5"></textarea>
                
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
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>

            {{-- need to add in cards for this --}}
            


            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Section 6(Our Impact)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control" name="sec6title" value="{{$section->sec6title??''}}">
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec6image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset('agriventure/'.$section->sec6image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    <div class="" id="sec6_images">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec6textl[]" cols="30" rows="5"></textarea>
                
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec6_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec6_table">
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


            {{-- add in the cards here --}}

            {{-- add in the card stuff for this  --}}

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 7(Future Goals)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec7title" value="{{$section->sec7title??''}}">
            
        </div>
        

        
    </div>

    
    <div class="" id="sec7_images">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="text" placeholder="year" class="form-control" name="sec7yearl[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec7titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec7textl[]" cols="30" rows="5"></textarea>
                
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

    <h3>Section 8(Our Core Values)</h3>

    <div id="sec8_images">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec8imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec8titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec8textl[]" cols="30" rows="5"></textarea>
                
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

    <h3>Section 9(Explore Our Initiatives)</h3>

  {{-- make a list for these  --}}

  <div class="mb-3">
    <label for="" class="form-label">title</label>
    <input type="text" class="form-control" name="sec9title" value="{{$section->sec9title??''}}">
  </div>
  

  <div class="row">
    <div class="mb-3 col-6">
        <label for="" class="form-label">banner image</label>
        <input type="file" class="form-control img_inpp" name="sec9image">
        
    </div>
    <div class="mb-3 col-2">
        
        <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
    </div>
    <div class="mb-3 col-4">
        <img class="Thumbnail" src="{{ optional($section)->sec9image ? asset('agriventure/'.$section->sec9image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
        
    </div>
</div>

<div id="sec9_images">
    <div class="mb-3 row">
        
        
        <div class="col-3">
            <input type="file" placeholder="image" class="form-control" name="sec9imagel[]">
        </div>
        <div class="col-3">
            <input type="text" placeholder="title" class="form-control" name="sec9titlel[]">
        </div>
        <div class="col-3">
            <textarea placeholder="text" class="form-control" name="sec9textl[]" cols="30" rows="5"></textarea>
            
        </div>
        
        
        <div class="col-3">
            <button class="btn btn-primary" type="button" onclick="addsec9_images()">+</button>
        </div>     
    </div>
</div>

<table class="table" id="sec9_table">
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

    {{-- inputs for fields logo and everything else --}}

    

    {{-- <div class="mb-3 d-flex">
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

    <h3>Section 10(Be a part of change)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec10title" value="{{$section->sec10title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec10text" id="" cols="30" rows="5" class="form-control">{{$section->sec10text??''}}</textarea>
            {{-- this one is an exception --}}
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control" name="sec10btn_text" value="{{$section->sec10btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec10btn_url" value="{{$section->sec10btn_url??''}}">
            
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

    console.log('line 1');
    FilePond.destroy(null);//this won't give an error and won't stop the script execution

    console.log('line 2');

    let x_token=document.querySelector("meta[name='csrf-token']").getAttribute('content');

    let field1=document.getElementById('sec4_images');

    let field2=document.getElementById('sec5_images');

    let field3=document.getElementById('sec6_images');

    let field4=document.getElementById('sec7_images');

    let field5=document.getElementById('sec8_images');

    let field6=document.getElementById('sec9_images');

  

    function addsec4_images(){

       


field1.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
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

       


field2.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
  <div class="col-3">
                <input type="file" placeholder="image 1" class="form-control" name="sec5img1l[]">
            </div>
            <div class="col-3">
                <input type="file" placeholder="image 2" class="form-control" name="sec5img2l[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec5titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec5textl[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <textarea placeholder="achieve" class="form-control" name="sec5achieve[]" cols="30" rows="5"></textarea>
                
            </div>
            <div class="col-3">
                <textarea placeholder="tech" class="form-control" name="sec5tech[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec5_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec6_images(){

       


field3.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
  <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec6titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec6textl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec6_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}

function addsec7_images(){

       


field4.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
  <div class="col-3">
                <input type="text" placeholder="year" class="form-control" name="sec7yearl[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec7titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec7textl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec7_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function addsec8_images(){

       


field5.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
  <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec8imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec8titlel[]">
            </div>
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec8textl[]" cols="30" rows="5"></textarea>
                
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addsec8_images()">+</button>
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
        <button class="btn btn-primary" type="button" onclick="addsec9_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}







function remove_input(el){

console.log(el.parentElement);

let parent=el.parentElement;
let superparent=parent.parentElement

superparent.remove();


}





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

var table1=$('#sec4_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section4')}}",
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

  var table2=$('#sec5_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section5')}}",
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

  var table3=$('#sec6_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section6')}}",
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

  var table4=$('#sec7_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section7')}}",
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
  })


  var table5=$('#sec8_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section8')}}",
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
  })


  var table6=$('#sec9_table').DataTable({
              ajax:"{{url('/admin/agriventuretable/section9')}}",
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
  })


  //mapping section tables

  const tableMap = {
    
    "section4": table1,
    "section5": table2,
    "section6": table3,
    "section7": table4,
    "section8": table5,
    "section9": table6,
    
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
  let dialogpart=document.getElementById('dialogpart');
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

  let fet=await fetch(`{{url('/admin/')}}/get_resource_agriventure/${type}/${id}`);
  
  let res=await fet.json();

  console.log(res);

  // console.log('this is the url'+`{{url('/admin/')}}/get_resource/${type}`);



    FilePond.destroy(document.querySelector('.filepond')); 
    FilePond.destroy(document.querySelector('.filepond2')); 

    let content=null;
    let img=false;
    let pond=null;
    let pond2=null;
    let imglink=null;
    let imglink2=null;

  //   let icon_url=document.getElementById('icon_url');
  // const pond2=FilePond.create(icon_url);

   if(button!='eradicator'){

    switch(type){

case "section4":
  content=`<form id="dynForm">
    
      <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec4titlel}" name="sec4titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec4textl">${res.sectionData.sec4textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod">Update</button>
      
      </form>`;
      img=true;
      imglink=`{{url('/admin/')}}/agriventure/${res.sectionData.sec4imagel}`;
      if(dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.remove('modal-xl');
      }
break;
case "section5":
  content=`<form id="dynForm">
    <div class="row">
    <div class="mb-3 col-6">
      <label for="" class="form-label">Image 1</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3 col-6">
      <label for="" class="form-label">Image 2</label>
      <input class="form-control filepond2" type="file" >
      </div>
      <div class="mb-3 col-6">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec5titlel}" name="sec5titlel">
      </div>
      <div class="mb-3 col-6">
      <label for="" class="form-label">Text</label>
      <textarea class="form-control" rows="3" name="sec5textl">${res.sectionData.sec5textl}</textarea>
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Achievements</label>
      <textarea class="form-control" rows="3" name="sec5achieve">${res.sectionData.sec5achieve}</textarea>
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Technology</label>
      <textarea class="form-control" rows="3" name="sec5tech">${res.sectionData.sec5tech}</textarea>
      </div>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/admin/')}}/agriventure/${res.sectionData.sec5img1l}`;
      imglink2=`{{url('/admin/')}}/agriventure/${res.sectionData.sec5img2l}`;
      if(!dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.add('modal-xl');
      }
break;
case "section6":
content=`<form id="dynForm">
    
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec6titlel}" name="sec6titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec5textl">${res.sectionData.sec6textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      if(dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.remove('modal-xl');
      }
      
break;
case "section7":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Year</label>
      <input class="form-control" type="text" value="${res.sectionData.sec7yearl}" name="sec7yearl">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec7titlel}" name="sec7titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec7textl">${res.sectionData.sec7textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      if(dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.remove('modal-xl');
      }
break;
case "section8":
content=`<form id="dynForm">
  <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec8titlel}" name="sec4titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec4textl">${res.sectionData.sec8textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/admin/')}}/agriventure/${res.sectionData.sec8imagel}`;
      if(dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.remove('modal-xl');
      }
break;
case "section9":
content=`<form id="dynForm">
  <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file" >
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec9titlel}" name="sec9titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec9textl">${res.sectionData.sec9textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{url('/admin/')}}/agriventure/${res.sectionData.sec9imagel}`;
      if(dialogpart.classList.contains('modal-xl')){
        dialogpart.classList.remove('modal-xl');
      }
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

      if(type=='section5'){

        let imz2=document.querySelector('.filepond2');
      pond2=FilePond.create(imz2);

      pond2.addFile(imglink2);

      }

      


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

if(type=='section5'){

  if(pond2.getFile(0)){

console.log('file is there 2 section 5');

data.append('image2',pond2.getFile().file);

}else{
console.log('file is not there 2section5');
}
}

      }
      

      let fetchf=await fetch(`{{url('/admin/update_agriventuresection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
      

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
      



        let fetchf=await fetch(`{{url('/admin/remove_agriventuresection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
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