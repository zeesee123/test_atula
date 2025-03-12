@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Business page</h1>



<form action="{{url('/add_homepage')}}" method="POST" enctype="multipart/form-data">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1(Our Business: Transforming Agriculture & Sustainability)</h3>

      

        <div class="mb-3">
            <label for="" class="form-label">heading</label>
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
                <img class="Thumbnail" src="{{ optional($section)->sec1image ? asset('businesspage/'.$section->sec1image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>


    </section>

<hr>


<section>

    <h3>Who We Are(section)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec2title" class="form-control" value="{{$section->sec2title??''}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec2text" id="" cols="30" rows="5" class="form-control">{{$section->sec2text??''}}</textarea>
    </div>

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control" name="sec2btn_text" value="{{$section->sec2btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec2btn_url" value="{{$section->sec2btn_url??''}}">
        </div>

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
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('businesspage/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>



</section>


<hr>

<section>

    

    <h3>Section 3 (Our Services)</h3>

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec3title" class="form-control" value="{{$section->sec3title??''}}">
    </div>


    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control" name="sec3btn_text" value="{{$section->sec3btn_text??''}}">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec3btn_url" value="{{$section->sec3btn_url??''}}">
        </div>
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
            <div class="col-4">
                <input type="text" placeholder="url" class="form-control" name="sec3urll[]">
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


</section>

<hr>

<section>

    <h3>Section 4(Our Impact)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
            </div>
            
            

        </div>

        {{-- content 
    highlights --}}

    <div class="row">
        <div class="mb-3 col-6">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control img_inpp" name="sec4image">
            
        </div>
        <div class="mb-3 col-2">
            
            <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
        </div>
        <div class="mb-3 col-4">
            <img class="Thumbnail" src="{{ optional($section)->sec4image ? asset('businesspage/'.$section->sec4image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

        

        

    </div>

    <div class="" id="sec4_images">
        <div class="mb-3 row">
            
            <div class="col-6 mb-2">
                <input type="file" placeholder="logo" class="form-control" name="sec4imagel[]">
            </div>
            <div class="col-6 mb-2">
                <input type="text" placeholder="title" class="form-control" name="sec4titlel[]">
            </div>
            <div class="col-5">
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

    <h3>Section 5(Projects & Initiatives)</h3>

  {{-- make a list for these  --}}

  <div class="mb-3">
    <label for="" class="form-label">title</label>
    <input type="text" class="form-control" name="sec5title" value="{{$section->sec5title??''}}">
  </div>
  

  <div class="row">
    <div class="mb-3 col-6">
        <label for="" class="form-label">banner image</label>
        <input type="file" class="form-control img_inpp" name="sec5image">
        
    </div>
    <div class="mb-3 col-2">
        
        <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
    </div>
    <div class="mb-3 col-4">
        <img class="Thumbnail" src="{{ optional($section)->sec5image ? asset('businesspage/'.$section->sec5image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
        
    </div>
</div>

<div id="sec5_images">
    <div class="mb-3 row">
        
        
        <div class="col-3">
            <input type="file" placeholder="image" class="form-control" name="sec5imagel[]">
        </div>
        <div class="col-3">
            <input type="text" placeholder="title" class="form-control" name="sec5titlel[]">
        </div>
        <div class="col-3">
            <textarea placeholder="text" class="form-control" name="sec5textl[]" cols="30" rows="5"></textarea>
            
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

    <h3>Section 6(Making a difference on the ground)</h3>

            {{-- add in the cards here --}}

            

                <div class="mb-3">
                    <label class="form-label">heading</label>
                    <input type="text" class="form-control" name="sec6title" value="{{$section->sec6title??''}}">
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="" class="form-label">earth image</label>
                        <input type="file" class="form-control img_inpp" name="sec6image">
                        
                    </div>
                    <div class="mb-3 col-2">
                        
                        <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
                    </div>
                    <div class="mb-3 col-4">
                        <img class="Thumbnail" src="{{ optional($section)->sec6image ? asset('businesspage/'.$section->sec6image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                        
                    </div>
                </div>

                <h4>Texts(starting clockwise top left)</h4>

                <h5>text 1</h5>
                <div class="mb-3">
                    <label for="" class="form-label">heading</label>
                    <input type="text" name="sec6title1" class="form-control" value="{{$section->sec6title1??''}}">
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">content</label>
                    <textarea name="sec6content1" id="" cols="30" rows="5" class="form-control">{{$section->sec6content1??''}}</textarea>
                </div>

                <h5>text 2</h5>
                <div class="mb-3">
                    <label for="" class="form-label">heading</label>
                    <input type="text"  name="sec6title2" class="form-control" value="{{$section->sec6title2??''}}">
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">content</label>
                    <textarea name="sec6content2" id="" cols="30" rows="5" class="form-control">{{$section->sec6content2??''}}</textarea>
                </div>

                <h5>text 3</h5>
                <div class="mb-3">
                    <label for="" class="form-label">heading</label>
                    <input type="text" name="sec6title3" class="form-control" value="{{$section->sec6title3??''}}">
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">content</label>
                    <textarea name="sec6content3" id="" cols="30" rows="5" class="form-control">{{$section->sec6content3??''}}</textarea>
                </div>

                <h5>text 4</h5>
                <div class="mb-3">
                    <label for="" class="form-label">heading</label>
                    <input type="text" name="sec6title4" class="form-control" value="{{$section->sec6title4??''}}">
                </div>
            
                <div class="mb-3">
                    <label for="" class="form-label">content</label>
                    <textarea name="sec6content4" id="" cols="30" rows="5" class="form-control">{{$section->sec6content4??''}}</textarea>
                </div>
                
                
    
            

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 7(Real voices,real impact: Stories from farmers,employees, and partners)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">text 1</label>
            <input type="text" class="form-control" name="sec7title" value="{{$section->sec7}}">
            
        </div>
    </div>


    {{-- remember this one is using the testimonials table --}}
    <div class="" id="sec7_images">
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
                <button class="btn btn-primary" type="button" onclick="addsec3_images()">+</button>
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

    <h3>Section 8(Join us in making a difference)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec8title" value="{{$section->sec8title??''}}">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec8text" id="" cols="30" rows="5" class="form-control">{{$section->sec8text??''}}</textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(Learn about our technology text)</label>
            <input type="text" class="form-control" name="sec8btn_text" value="{{$section->sec8btn_text??''}}">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec8btn_url" value="{{$section->sec8btn_url??''}}">
            
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
                <img class="Thumbnail" src="{{ optional($section)->sec8image ? asset('businesspage/'.$section->sec8image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
                
            </div>
        </div>
        
    </div>


</section>





<button class="btn btn-primary">submit</button>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection