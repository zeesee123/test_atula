<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>


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
      {{-- test --}}
    </div>
  </div>


    test page

    @if(session('success'))

    <div style="color:green">this worked</div>

    @endif

    <form action="/test_submit" method="POST" enctype="multipart/form-data">

        @csrf
        
        <div class="mb-3">
            <label for="" class="form-label">field1</label>
            <input type="text" name="field1" name="field1" value="{{$model->field1??''}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">field2</label>
            <input type="text" name="field2" name="field2" value="{{$model->field2??''}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">field3</label>
            <input type="text" name="field3" name="field3" value="{{$model->field3??''}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">field4</label>
            <input type="text" name="field4" name="field4" value="{{$model->field4??''}}">
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

    {{-- table for what we do images --}}

    <table class="table" id="whatwedo_table">
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



       <h4 class="mx-2">images 2</h4>
    
    <div class="" id="whatwedo_images2">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="add image" class="form-control" name="whatwe_doimg2[]">
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addwhatwedo_images2()">+</button>
            </div>     
        </div>
    </div>

    {{-- table for what we do images --}}

    <table class="table" id="whatwedo_table">
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

      <div class="mb-3">
        <button>submit</button>
      </div>

    </form>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    
    <script>

        let field1=document.getElementById('whatwedo_images');
        let field2=document.getElementById('whatwedo_images2');

        function addwhatwedo_images(){

       


field1.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
        {{-- <div class="col-3">
            <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
        </div> --}}
       
        <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="whatwe_doimg[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addwhatwedo_images()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


        function addwhatwedo_images2(){

       


field2.insertAdjacentHTML('beforeend',`<div class="mb-3 row">
    
        {{-- <div class="col-3">
            <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
        </div> --}}
       
        <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="whatwe_doimg2[]">
            </div>
    <div class="col-3">
        <button class="btn btn-primary" type="button" onclick="addwhatwedo_images2()">+</button>
        <button class="btn btn-danger" type="button" onclick="remove_input(this)">-</button>
    </div></div>`);
}


function remove_input(el){

console.log(el.parentElement);

let parent=el.parentElement;
let superparent=parent.parentElement

superparent.remove();


}



var table1=$('#whatwedo_table').DataTable({
              ajax:"{{url('/load_tables')}}",
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


    </script>
</body>
</html>