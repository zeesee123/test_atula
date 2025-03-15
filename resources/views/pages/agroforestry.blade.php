@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Agroforestry</h1>



<form action="{{url('/add_homepage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1(Revolutionizing Agriculture through Sustainable Forestry.)</h3>

      

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
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset('homepage/'.$section->sec1image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>


    </section>

<hr>


<section>

    <h3>Section 2(About Agroforestry)</h3>

  

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

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec2image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('agroforestrypage/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    


</section>


<hr>

<section>

    

    <h3>Section 3 (Our milestones)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" name="sec3title" class="form-control" value="{{$section->sec3title??''}}">
    </div>


    <div id="sec3_images">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec3imagel[]">
            </div>
            
            <div class="col-3">
                <textarea placeholder="text" class="form-control" name="sec3textl[]" cols="30" rows="5"></textarea>
                
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

            <th scope="col">text</th>
            
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

    <h3>Section 4(Tree quote section)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="d-flex">

                

                <div class="mb-3">
                    <label class="form-label">content</label>
                    <textarea name="sec4quote" id="" cols="30" rows="10" class="form-control">{{$section->sec4quote??''}}</textarea>
                </div>

                

            </div>
            
            
            

        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">banner image</label>
                <input type="file" class="form-control img_inpp" name="sec4image">
                
            </div>
            <div class="mb-3 col-2">
                
                <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="mb-3 col-4">
                <img class="Thumbnail" src="{{ optional($section)->sec4image ? asset('homepage/'.$section->sec4image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>

    </div>

    



    
    
    
</section>

<hr>
<section>

    <h3>Section 5(Our Approach to Agroforestry)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control" name="sec5title" value="{{$section->sec5title??''}}">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">content(sub text)</label>
                <textarea name="sec5_addtext" id="" cols="30" rows="5" class="form-control">{{$section->sec5_addtext??''}}</textarea>
            </div>  

        </div>

        {{-- content 
    highlights cards thing --}}

    <div class="" id="sec5_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec5imagel[]">
            </div>
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

<hr>

<section>

    <h3>Section 6(Banner image from barren lands to thriving ecosystems...)</h3>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec6image" >
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset('homepage/'.$section->sec6image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>
            {{-- add in the cards here --}}

            {{-- add in the card stuff for this  --}}

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 7(Badges)</h3>

    <div class="" id="sec7_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec7imagel[]" >
            </div>
            
            <div class="col-3">
                <textarea class="form-control" name="sec7textl[]" cols="30" rows="5"></textarea>
                
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
            <th scope="col">text</th>
            
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

    <h3>Section 8(Testimonials)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">text 1</label>
            <input type="text" class="form-control" name="sec8title" value="{{$section->sec8title??''}}">
            
        </div>
    </div>


    {{-- remember this one is using the testimonials table --}}
    <div class="" id="sec8_images">
        {{-- testimonials --}}
        <div class="mb-3 row">
            
            <div class="col-6 mb-2">
                <input type="file" placeholder="image" class="form-control" name="testimage[]">
            </div>
            <div class="col-6 mb-2">
                <input type="text" placeholder="title" class="form-control" name="testname[]">
            </div>
            <div class="col-5">
                <textarea class="form-control" name="testtext[]" cols="30" rows="5"></textarea>
                
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


</section>

<hr>

<section>

    <h3>Section 9(Key Crops & Plantations)</h3>


    <div class="mb-3">
        <label class="form-label">heading</label>
        <input type="text" class="form-control" name="sec9title" value="{{$section->sec9title??''}}">
    </div>

</section>

<hr>

<section>

    <h3>Section 10(Ornamental Plants)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" name="sec10title" class="form-control" value="{{$section->sec10title??''}}">
    </div>

    

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec10_text" id="" cols="30" rows="5" class="form-control">{{$section->sec10_text??''}}</textarea>
    </div>

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control " name="sec10btn_text" value="{{$section->sec10btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control " name="sec10btn_url" value="{{$section->sec10btn_url??''}}">
        </div>

    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">Image 1 (left side)</label>
            <input type="file" class="form-control img_inpp" name="sec10_image1">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec10_image1 ? asset('homepage/'.$section->sec10_image1) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    
    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">Image 2 (right side)</label>
            <input type="file" class="form-control img_inpp" name="sec10_image2">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec10_image2 ? asset('agroforestrypage/'.$section->sec10_image2) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

</section>

<hr>

<section>

    <h3>Section 11(3 plants neem,muleithi)</h3>

    <div class="" id="sec11_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec11titlel[]">
            </div>

            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec11imagel[]">
            </div>

            <div class="col-3">
                <input type="text" placeholder="link" class="form-control" name="sec11linkl[]">
            </div>
            
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec11_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec11_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">text</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>



</section>

<section>

    <h3>Section 12(HYV)</h3>

    {{-- cards for the other part as well --}}


    <div class="row">
        
        <div class="col-6 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec12title" value="{{$section->sec12title??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control" name="sec12btn_text" value="{{$section->sec12btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec12btn_url" value="{{$section->sec12btn_url??''}}">
            
        </div>
    </div>

    <div class="" id="sec12_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec12titlel[]">
            </div>

            <div class="col-3">
                <input type="file" placeholder="image" class="form-control" name="sec12imagel[]">
            </div>

            <div class="col-3">
                <input type="text" placeholder="link" class="form-control" name="sec12linkl[]">
            </div>
            
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec12_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec12_table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">text</th>
            
            {{-- <th scope="col">Url</th> --}}
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>


</section>

<section>

    <h3>Section 13(Community and Environment Impact)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec13title" value="{{$section->sec13title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text(Empowering communities)</label>
            <textarea name="sec13addtext" id="" cols="30" rows="5" class="form-control">{{$section->sec13addtext??''}}</textarea>
            
        </div>
        
    </div>

    <div class="" id="sec13_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <textarea name="sec13textl[]" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addsec13_images()">+</button>
            </div>     
        </div>
    </div>

    <table class="table" id="sec13_table">
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

    {{-- add in the cards for the rest --}}


</section>

<section>

    <h3>Section 14(By 2050,Atulya Krishi Vana.....)</h3>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec14image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec14image ? asset('agroforestrypage/'.$section->sec14image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>
</section>
    

    
<section>

    <h3>Section 15(Partner with us to transform...)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" name="sec15title" class="form-control" value="{{$section->sec15title??''}}">
    </div>

    

    

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control " name="sec15btn_text" value="{{$section->sec15btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control " name="sec15btn_url" value="{{$section->sec15btn_url??''}}">
        </div>

    </div>

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec15image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec15image ? asset('agroforestrypage/'.$section->sec15image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

</section>

<button class="btn btn-primary">submit</button>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection