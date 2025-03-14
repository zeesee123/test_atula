@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>A&M Agriventure</h1>



<form action="{{url('/add_homepage')}}" method="POST" enctype="multipart/form-data">

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
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset('agriventurepage/'.$section->sec1image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
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
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('agriventurepage/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
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
            <img class="Thumbnail" src="{{ optional($section)->sec3image ? asset('agriventurepage/'.$section->sec3image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
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
            <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset('agriventurepage/'.$section->sec6image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
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
        <img class="Thumbnail" src="{{ optional($section)->sec9image ? asset('agriventurepage/'.$section->sec9image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
        
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