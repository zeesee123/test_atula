@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Eco-Initiative</h1>



<form action="{{url('/add_homepage')}}" method="POST" enctype="multipart/form-data">

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
<<<<<<< HEAD
            <input type="text" name="sec2btn_text" class="form-control" value="{{$section->sec2btn_text??''}}">
=======
            <input type="text" class="form-control " name="sec2btn_text" value="{{$section->sec2btn_text??''}}">
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
<<<<<<< HEAD
            <input type="text" name="sec2btn_url" class="form-control" value="{{$section->sec2btn_url??''}}">
=======
            <input type="text" class="form-control " name="sec2btn_url" value="{{$section->sec2btn_url??''}}">
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
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
<<<<<<< HEAD
                    <input type="text" name="sec4title" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
=======
                    <input type="text" class="form-control" name="sec4title" value="{{$section->sec4title??''}}">
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
                </div>

                <div class="mb-3">
                    <label class="form-label">subtitle</label>
                    <input type="text" class="form-control" name="sec4addtext" value="{{$section->sec4addtext??''}}">
                </div>

                <div class="mb-3">
                    <label class="form-label">content</label>
<<<<<<< HEAD
                    <textarea name="sec4text"  cols="30" rows="5" class="form-control">{{$section->sec4text??''}}</textarea>
=======
                    <textarea name="sec4text" cols="30" rows="10" class="form-control">{{$section->sec4text??''}}</textarea>
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
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

    <h5>points</h5>
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

    


    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(explore our agroforestry projects)</label>
<<<<<<< HEAD
            <input type="text" class="form-control " name="sec6btn_text" value="{{$section->sec6btn_text??''}}"">
=======
            <input type="text" class="form-control " name="sec6btn_text" value="{{$section->sec6btn_text??''}}">
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
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
<<<<<<< HEAD
            <textarea name="sec8addtext" id="" cols="30" rows="5" class="form-control">{{$section->sec8addtext??''}}</textarea>
=======
            <textarea name="sec8addtext" id="" cols="30" rows="5" class="form-control" value="{{$section->sec8addtext??''}}"></textarea>
>>>>>>> ae5f1d73fff9082d5337d20a3cc086e3336ab5f4
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