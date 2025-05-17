@extends('app.layout')


@push('styles')

<style>
h1{color:'red'}
</style>

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
        <h1>Aboutpage</h1>



<form action="{{url('/admin/admin/add_aboutpage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1 (Our Essence ,who we are)</h3>

        <div class="mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" name="sec1title" class="form-control" value="{{$section->sec1title??''}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="sec1text" id="" cols="30" rows="5" class="form-control" >{{$section->sec1text??''}}</textarea>
        </div>

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text(read more)</label>
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
              
            <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset_env('aboutpage/'.$section->sec1image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
              
          </div>
      </div>

        {{-- section for adding in the images --}}

        <h4 class="mx-2">images</h4>
    
    <div class="" id="sec1_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="sec1imagel[]">
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec1_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec1_table">
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



    </section>

<hr>


<section>

    <h3>Section 2(Cultivating Sustainable Future)</h3>

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec2title" class="form-control" value="{{$section->sec2title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec2text" id="" cols="30" rows="5" class="form-control">{{$section->sec2text??''}}</textarea>
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec2image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset_env('aboutpage/'.$section->sec2image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(read more)</label>
            <input type="text" class="form-control" name="sec2btn_text" value="{{$section->sec2btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec2btn_url" value="{{$section->sec2btn_url??''}}">
        </div>

    </div>

    {{-- section for adding in the images --}}



</section>


<hr>

<section>

    

    <h3>Section 3(Our Guiding Light)</h3>

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec3title" class="form-control" value="{{$section->sec3title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3text" id="" cols="30" rows="5" class="form-control">{{$section->sec3text??''}}</textarea>
    </div>


    {{-- images part --}}

    
    <h4 class="mx-2">images</h4>
    
    <div class="" id="sec3_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="sec3imagel[]">
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

    <h3>Section 4(Our Mission:Growing Sustainability,Together)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">content(sub text)</label>
                <textarea name="sec4text" id="" cols="30" rows="5" class="form-control" >{{$section->sec4text??''}}</textarea>
            </div>  

        </div>

        {{-- content 
    highlights cards thing --}}

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


            
            

        </div>


    
    
</section>


<section>

            <h3>Section 5 Journey from Barren Lands to Lush Forests</h3>

            {{-- add in the cards here --}}

            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">title</label>
                    <textarea name="sec5title" id="" class="form-control">{{$section->sec5title??''}}</textarea>
                    
                </div>
                <div class="col-12">
                    <label for="">content</label>
                    <textarea name="sec5text" id="" class="form-control">{{$section->sec5text??''}}</textarea>
                </div>

                <div class="col-12">
                    <label for="" class="form-label">our milestones(text)</label>
                    <input type="text" name="sec5addtext" class="form-control" value="{{$section->sec5addtext??''}}">
                    
                </div>

                {{-- cards for milestones --}}

                <h4>our milestones cards</h4>

    <div class="" id="sec5_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec5titlel[]">
            </div>
            
            <div class="col-3">
                <textarea class="form-control" name="sec5textl[]" cols="30" rows="5"></textarea>
                
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
            
            <th scope="col">title</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>

                
                
            </div>

            


            {{-- elements and stuff multiple ones --}}
</section>

<section>

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 6(The Roots of Our Mission)</h3>
    
    <label for="" class="form-label">title</label>
    <input type="text" class="form-control" name="sec6title" value="{{$section->sec1title??''}}">

    <div id="sec6_images">
        <div class="mb-3 row">
            
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
            </div>     
        </div>
    </div>

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

<section>

    <h3>Section 7(Our Visionaries)</h3>

    <div class="row">
        <div class="col-6 mb-3">
            <label for="" class="form-label">title main(our visionaries)</label>
            <input type="text" class="form-control" name="sec7title" value="{{$section->sec7title??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">title(green force)</label>
            <input type="text" class="form-control" name="sec7addtext" value="{{$section->sec7addtext??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text(green force box)</label>
            <textarea name="sec7text" id="" cols="30" rows="5" class="form-control">{{$section->sec7text??''}}</textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(our team)</label>
            <input type="text" class="form-control" name="sec7btn_text" value="{{$section->sec7btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec7btn_url" value="{{$section->sec7btn_url??''}}">
            
        </div>
    </div>
    
    {{-- show people from the team specific ones for this --}}

    


</section>

<section>

    <h3>Section 8(Let's Go Green Together)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec8title" value="{{$section->sec8title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec8text" id="" cols="30" rows="5" class="form-control">{{$section->sec8text??''}}</textarea>
            
        </div>
       
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec8image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec8image ? asset_env('aboutpage/'.$section->sec8image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>


</section>

<section>

    {{-- for team i will make a separate page --}}
</section>

<section>

    <h3>Section 9(Collaborate with us)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec91title" value="{{$section->sec91title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec91text" id="" cols="30" rows="5" class="form-control">{{$section->sec91text??''}}</textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(read more text)</label>
            <input type="text" class="form-control" name="sec91btn_text" value="{{$section->sec91btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec91btn_url" value="{{$section->sec91btn_url??''}}">
            
        </div>
    </div>


</section>

<section>

    <h3>Section 9 p2(Support Our Cause)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec92title" value="{{$section->sec92title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec92text" id="" cols="30" rows="5" class="form-control">{{$section->sec92text??''}}</textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(read more text)</label>
            <input type="text" class="form-control" name="sec92btn_text" value="{{$section->sec92btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec92btn_url" value="{{$section->sec92btn_url??''}}">
            
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec92image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec92image ? asset_env('aboutpage/'.$section->sec92image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
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

var table1=$('#sec1_table').DataTable({
              ajax:"{{url('/admin/abouttable/section1')}}",
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

  var table2=$('#sec3_table').DataTable({
              ajax:"{{url('/admin/abouttable/section3')}}",
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

  var table3=$('#sec4_table').DataTable({
              ajax:"{{url('/admin/abouttable/section4')}}",
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

  var table4=$('#sec5_table').DataTable({
              ajax:"{{url('/admin/abouttable/section5')}}",
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


  var table5=$('#sec6_table').DataTable({
              ajax:"{{url('/admin/abouttable/section6')}}",
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


  
  //mapping section tables

  const tableMap = {
    "section1": table1,
    "section3": table2,
    "section4": table3,
    "section5": table4,
    "section6": table5,
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

  let fet=await fetch(`{{url('/admin/')}}/get_resource_about/${type}/${id}`);
  
  let res=await fet.json();

  console.log(res);

  // console.log('this is the url'+`{{url('/admin/')}}/get_resource/${type}`);



    FilePond.destroy(document.querySelector('.filepond')); 

    let content=null;
    let img=false;
    let pond=null;
    let imglink=null;

  //   let icon_url=document.getElementById('icon_url');
  // const pond2=FilePond.create(icon_url);

   if(button!='eradicator'){

    switch(type){

case "section1":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod">Update</button>
      
      </form>`;
      img=true;
      console.log('image link',imglink);
      console.log('hehe');
      console.log('this is the data',res.sectionData);
      imglink=`{{asset_env('/')}}aboutpage/${res.sectionData.sec1imagel}`;
      console.log('the link',imglink);
break;
case "section3":
  content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{asset_env('/')}}aboutpage/${res.sectionData.sec3imagel}`;
break;
case "section4":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" name="sec4titlel" value="${res.sectionData.sec4titlel}">
      </div>
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec4textl">${res.sectionData.sec4textl}</textarea>
      </div>
  
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
      img=true;
      imglink=`{{asset_env('/')}}aboutpage/${res.sectionData.sec4imagel}`;
break;
case "section5":
content=`<form id="dynForm">
    
      <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" value="${res.sectionData.sec5titlel}" name="sec5titlel">
      </div>
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec5textl">${res.sectionData.sec5textl}</textarea>
      </div>
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success" id="update_btnmod" >Update</button>
      </form>`;
break;
case "section6":
content=`<form id="dynForm">
    <div class="mb-3">
      <label for="" class="form-label">Title</label>
      <input class="form-control" type="text" name="sec6titlel" value="${res.sectionData.sec6titlel}">
      </div>
    <div class="mb-3">
      <label for="" class="form-label">Image</label>
      <input class="form-control filepond" type="file">
      </div>
    
      <div class="mb-3">
      <label for="" class="form-label">Content</label>
      <textarea class="form-control" rows="5" name="sec6textl">${res.sectionData.sec6textl}</textarea>
      </div>
  
      <input type="hidden" value="${id}" name="id">
      <button class="btn btn-success"  id="update_btnmod">Update</button>
      </form>`;
      img=true;
      imglink=`{{asset_env('/')}}aboutpage/${res.sectionData.sec6imagel}`;
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
      

      let fetchf=await fetch(`{{url('/admin/update_aboutsection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
      

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
      



        let fetchf=await fetch(`{{url('/admin/remove_aboutsection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
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