@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Eco-Initiative</h1>



<form action="{{url('/add_homepage')}}" method="POST">

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
            <input type="text" name="title" class="form-control">
        </div>

        {{-- <div class="mb-3">
            <label for="" class="form-label">content(green text)</label>
            <input type="text" name="title" class="form-control">
        </div> --}}

        {{-- <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div> --}}

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text(Join Our Mission)</label>
                <input type="text" class="form-control ">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control ">
            </div>

        </div>

        <div class="mb-3">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control">
            {{-- need to add in a preview for the image as well in here --}}
        </div>


    </section>

<hr>


<section>

    <h3>Section 2(Reviving Ecosystems,Empowering Communities)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        {{-- add in the points for this  --}}
    </div>

    <div class="mb-3 d-flex">
        
        <div class="mx-2">
            <label for="" class="form-label">button text</label>
            <input type="text" class="form-control ">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control ">
        </div>

    </div>

    <div class="mb-3">
        <label for="" class="form-label">image(family farm)</label>
        <input type="file" class="form-control">
        {{-- need to add in a preview for the image as well in here --}}
    </div>

    <div class="mb-3">
        <div class="d-flex">

        </div>

        <div>
            <label for="" class="form-label">image(badge logo)</label>
            <input type="file" class="form-control">
        </div>
       

        <div>
            <label for="" class="form-label">Number for badge</label>
            <input type="file" class="form-control">
        </div>
        

        <div>
            <label for="" class="form-label">Text for badge</label>
            <input type="file" class="form-control">
        </div>
        
        {{-- need to add in a preview for the image as well in here --}}
    </div>

</section>


<hr>

<section>

    

    <h3>Section 3 (Objectives)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control ">
    </div>

    {{-- now i need to give an option for multiple services along with their names and stuff in here super quick the part has to be editable in it's entirety in here  --}}

    <div class="mb-3">
        <label for="" class="form-label">subtitle</label>
        <input type="text" class="form-control ">
        {{-- <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea> --}}
    </div>

   

 {{-- need to add in image ,heading and content in here --}}



    {{-- button in the last --}}
    


</section>

<hr>

<section>

    <h3>Section 4(CSR Projects)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="d-flex">

                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">subtitle</label>
                    <input type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">content</label>
                    <input type="text" class="form-control">
                </div>

                {{-- images set 1 --}}

                <div class="mb-3">
                    <label class="form-label">title 2 (CSR PROJECTS)</label>
                    <input type="text" class="form-control">
                </div>

                {{-- next set of images --}}

                
                {{-- <div class="mb-3">
                    <label class="form-label">content</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">image</label>
                    <input type="file" class="form-control">
                </div> --}}

            </div>
            
            
            

        </div>

        {{-- content 
    highlights --}}

    <div class="col-6">

        <div class="d-flex">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">content</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">image</label>
                <input type="file" class="form-control">
            </div>

        </div>
        
        
        

    </div>

        

        {{-- use the multiple component
    read more add in the image , title,content --}}

    {{-- <div class="col-12">

        <div class="mb-3">

            <p>inputs for multiple stuff image , title, content (use text editor for all point stuff remember this dude)</p>

        </div>
        
    </div> --}}

    {{-- <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button text(join the mission)</label>
            <input type="text" class="form-control">
        </div>
    </div> --}}

    {{-- <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button url(join the mission)</label>
            <input type="text" class="form-control">
        </div>
    </div> --}}

    </div>



    
    
    
</section>

<hr>
<section>

            <h3>Section 5(Agroforestry & Sustainability)</h3>

            {{-- add in the cards here --}}

            {{-- leave the image part for now it could get changed for some reason --}}

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">heading</label>
                    <input type="text" class="form-control">
                </div>
                
                
    
            </div>

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">subtitle</label>
                    <input type="text" class="form-control">
                </div>
                
                
    
            </div>

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">content</label>
                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                
                
    
            </div>


            {{-- points will come in here --}}


            <div class="col-6 mb-3">
         
                <label for="" class="form-label">button text(join the mission text)</label>
                <input type="text" class="form-control">
            
            </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>

        <div class="col-12 mb-3">
            <label for="" class="form-label">image</label>
            <input type="file" class="form-control">
        </div>

            {{-- need to add in cards for this --}}
            


            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Section 6(Achievements)</h3>

    {{-- image content and other stuff --}}

            {{-- add in the cards here --}}

            {{-- add in the card stuff for this  --}}

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 7(Future Goals)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">years</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">points</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>

        {{-- add in the cards for the image ,name ,content --}}
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>


</section>

<hr>

<section>

    <h3>Section 8(Future Vision)</h3>

    {{-- add in the multiple input fields for this  --}}

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">subtitle</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">line before the points</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(Learn about our technology text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control">
            
        </div>
        
    </div>


</section>

<hr>

<section>

    <h3>Section 9(Explore Our Initiatives)</h3>

  {{-- make a list for these  --}}

  <div class="mb-3">
    <label for="" class="form-label">title</label>
    <input type="text" class="form-control">
  </div>
  

    <div class="mb-3">
        <label for="" class="form-label">image</label>
        <input type="file" name="title" class="form-control">
    </div>

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
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>
    </div>


</section>

<section>

    <h3>Badges part (section)</h3>

    {{-- cards for the other part as well --}}


    <div class="row">
        
        <div class="col-6 mb-3">
            <label for="" class="form-label">Support our social impact(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>
    </div>


</section>

<section>

    <h3>Be a part of the change(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>

    {{-- add in the cards for the rest --}}


</section>

<section>

    <h3>Get in touch(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        {{-- <div class="col-6 mb-3">
            <label for="" class="form-label">button text(join the mission text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div> --}}
    </div>

    <section>

        <h3>Map link google (section)</h3>
    
        <div class="row">
            <div class="col-12 mb-3">
                <label for="" class="form-label">map link</label>
                <input type="text" class="form-control">
                
            </div>
          
        </div>
    
    
    </section>


</section>

<button>submit</button>

</form>

    </div>
    {{-- above div is from container --}}

    
</div>



@endsection