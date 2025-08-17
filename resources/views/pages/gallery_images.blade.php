@extends('app.layout')


@push('styles')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.css
" rel="stylesheet"/>

<link href="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css
" rel="stylesheet">

@endpush

@section('content')

<div class="page-header d-print-none">

     <div class="container-xl">
        <h3>Add Image Category</h3>

        <div class="card">
  <div class="card-body">
    <form action="{{ url('/admin/add/gallery_images') }}" enctype="multipart/form-data" method="POST" id="main_form">
        @csrf
    
        <div class="card pt-3 p-4">
            <div class="row">
    
                {{-- Category Select --}}
                <div class="mb-3 col-6">
                    <label class="form-label">Category Name</label>
                    <select class="form-control" name="category" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->category }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                {{-- Images & Category Text --}}
                <div class="mb-3 col-6">
                    <label class="form-label">Add Images (You can add multiple)</label>
                    <input type="file" name="images[]" class="filepond" multiple required>
    
                </div>
    
            </div>
        </div>
    
        <div class="text-end p-3" style="bottom:0;position:sticky;z-index: 1030;">
            <button class="btn btn-lg btn-primary p-3" id="spin_submit">
                <i class="bi bi-floppy2-fill mx-2"></i> Save
            </button>
        </div>
    </form>
    
  </div>
</div>


     </div>
    
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    @endif
});
</script>


<script>
    let main_form=document.getElementById('main_form');

    let spin_submit=document.getElementById('spin_submit');

    main_form.addEventListener('submit',(e)=>{

        e.preventDefault();

        spin_submit.innerHTML=`<div class="spinner-border mx-2" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>`;
        
        console.log('submit event');

        main_form.submit();
    });

</script>


<script src="
https://cdn.jsdelivr.net/npm/filepond@4.32.7/dist/filepond.min.js
"></script>

{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
<script src="
https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js
"></script>


{{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}

<script src="{{ asset_env('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>


{{-- Initialize CKEditor --}}
{{-- <script>
      tinymce.init({
        selector: '#blog_content'
      });
    </script> --}}
<script>
tinymce.init({
  selector: '#blog_content',
  license_key: 'gpl',
  height: 400,
  menubar: true,
  plugins: 'link image code lists',
  toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image code',
  block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4',
  valid_elements: '*[*]',
  valid_children: '+body[h1,h2,h3,h4]'
});

</script>

<script> 

    FilePond.registerPlugin(FilePondPluginImagePreview);

    let inputElement=document.querySelector('.filepond');

    FilePond.create(inputElement, {
        allowMultiple: true, // or true if you want multiple files
        allowImagePreview: true,
        instantUpload: false, // THIS is important for normal form POST
        server:null,
        storeAsFile: true    
    });

    let x_token=document.querySelector("meta[name='csrf-token']").getAttribute('content');

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

var table1=$('#whatwedo_table').DataTable({
              ajax:"{{url('admin/hometable/section3')}}",
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
              ajax:"{{url('admin/hometable/section4')}}",
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
              ajax:"{{url('admin/hometable/section5')}}",
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
              ajax:"{{url('admin/hometable/section6')}}",
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
              ajax:"{{url('admin/hometable/section7')}}",
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
              ajax:"{{url('admin/hometable/section8')}}",
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
              ajax:"{{url('admin/hometable/section9')}}",
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
              ajax:"{{url('admin/hometable/section10')}}",
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
              ajax:"{{url('admin/hometable/section12')}}",
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
              ajax:"{{url('admin/hometable/section13')}}",
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

  let fet=await fetch(`{{url('admin/')}}/get_resource/${type}/${id}`);
  
  let res=await fet.json();

  console.log(res);

  // console.log('this is the url'+`{{url('admin/')}}/get_resource/${type}`);



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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.whatwe_doimg}`;
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.sec5_img}`;
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.sec7_simg}`;
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.sec8_slogo}`;
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.sec9_simg}`;
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.sec10_simg}`;

  
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
      imglink=`{{asset_env('/')}}homepage/${res.sectionData.image}`;
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
      

      let fetchf=await fetch(`{{url('admin/update_homesection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
      

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
      



        let fetchf=await fetch(`{{url('admin/remove_homesection')}}/${type}`,{method:'POST',headers:{'X-CSRF-TOKEN':x_token},body:data})
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