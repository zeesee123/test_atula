@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Aboutpage</h1>



<form action="{{url('/add_aboutpage')}}" method="POST">

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
            <input type="text" name="sec1title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="sec1text" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text(read more)</label>
                <input type="text" class="form-control " name="sec1btn_text">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control " name="sec1btn_url">
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
        <input type="text" name="sec2title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec2text" id="" cols="30" rows="5" class="form-control"></textarea>
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
            <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset('homepage/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>

    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(read more)</label>
            <input type="text" class="form-control" name="sec2btn_text">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec2btn_url">
        </div>

    </div>

    {{-- section for adding in the images --}}



</section>


<hr>

<section>

    

    <h3>Section 3(Our Guiding Light)</h3>

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="sec3title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="sec3text" id="" cols="30" rows="5" class="form-control"></textarea>
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
                <input type="text" class="form-control" name="sec4title">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">content(sub text)</label>
                <textarea name="sec4text" id="" cols="30" rows="5" class="form-control"></textarea>
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
                    <textarea name="sec5title" id="" class="form-control"></textarea>
                    
                </div>
                <div class="col-12">
                    <label for="">content</label>
                    <textarea name="sec5text" id="" class="form-control"></textarea>
                </div>

                <div class="col-12">
                    <label for="" class="form-label">our milestones(text)</label>
                    <input type="text" name="sec5addtext" class="form-control">
                    
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

    <h3>The Roots of Our Mission(section)</h3>
    
    <label for="" class="form-label">title</label>
    <input type="text" class="form-control" name="sec6title">

    <div class="" id="sec4_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="logo" class="form-control" name="sec4_imagel[]">
            </div>
            <div class="col-3">
                <input type="text" placeholder="title" class="form-control" name="sec4_titlel[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="sec4_textl[]" cols="30" rows="5"></textarea>
                
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

<section>

    <h3>Our Visionaries (section)</h3>

    <div class="row">
        <div class="col-6 mb-3">
            <label for="" class="form-label">title main(our visionaries)</label>
            <input type="text" class="form-control" name="sec7title">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">title(green force)</label>
            <input type="text" class="form-control" name="sec7addtext">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text(green force box)</label>
            <textarea name="sec7text" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(our team)</label>
            <input type="text" class="form-control" name="sec7btn_text">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec7btn_url">
            
        </div>
    </div>
    
    {{-- show people from the team specific ones for this --}}

    


</section>

<section>

    <h3>Let's Go Green Together(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec8title">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec8text" id="" cols="30" rows="5" class="form-control"></textarea>
            
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
            <img class="Thumbnail" src="{{ optional($section)->sec8image ? asset('homepage/'.$section->sec2image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>


</section>

<section>

    {{-- for team i will make a separate page --}}
</section>

<section>

    <h3>Collaborate with us(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec91title">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec91text" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(read more text)</label>
            <input type="text" class="form-control" name="sec91btn_text">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec91btn_url">
            
        </div>
    </div>


</section>

<section>

    <h3>Support Our Cause(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="sec92title">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="sec92text" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(read more text)</label>
            <input type="text" class="form-control" name="sec92btn_text">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control" name="sec92btn_url">
            
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
            <img class="Thumbnail" src="{{ optional($section)->sec92image ? asset('homepage/'.$section->sec92image) : asset('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
            
        </div>
    </div>


</section>



<button>submit</button>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection