@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Business page</h1>



<form action="{{url('/add_homepage')}}" method="POST">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Our Business: Transforming Agriculture & Sustainability(section)</h3>

      

        <div class="mb-3">
            <label for="" class="form-label">heading</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
            <label for="" class="form-label">banner image</label>
            <input type="file" class="form-control">
            {{-- need to add in a preview for the image as well in here --}}
        </div>


    </section>

<hr>


<section>

    <h3>Who We Are(section)</h3>

  

    <div class="mb-3">
        <label for="" class="form-label">heading</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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
        <label for="" class="form-label">image(butterfly one)</label>
        <input type="file" class="form-control">
        {{-- need to add in a preview for the image as well in here --}}
    </div>


</section>


<hr>

<section>

    

    <h3>Section 3 (Our Services)</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control ">
    </div>

    {{-- now i need to give an option for multiple services along with their names and stuff in here super quick the part has to be editable in it's entirety in here  --}}

    {{-- <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
    </div> --}}


    {{-- button in the last --}}
    <div class="mb-3 d-flex">
        <div class="mx-2">
            <label for="" class="form-label">button text(See all Services)</label>
            <input type="text" class="form-control ">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control ">
        </div>

    </div>


</section>

<hr>

<section>

    <h3>Section 5(Our Impact)</h3>

    {{-- heading --}}

    <div class="row">
        
        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">heading</label>
                <input type="text" class="form-control">
            </div>
            
            

        </div>

        {{-- content 
    highlights --}}

        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">content</label>
                <textarea name="" id="" class="form-control"></textarea>
                
            </div>
            

        </div>

        <div class="col-12">

            <div class="mb-3">
                <label for="" class="form-label">image(join the mission)</label>
                <input type="file" class="form-control">
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

            <h3>Section 6(Making a difference on the ground)</h3>

            {{-- add in the cards here --}}

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">heading</label>
                    <input type="text" class="form-control">
                </div>
                
                
    
            </div>
            


            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Section 7(Making a difference on the ground)</h3>

            {{-- add in the cards here --}}

            <div class="col-12">

                <div class="mb-3">
                    <label class="form-label">heading</label>
                    <input type="text" class="form-control">
                </div>
                
                
    
            </div>

            {{-- add in the image for this  --}}

    {{-- our journey card part --}}
</section>

<section>

    <h3>Section 8(Real voices,real impact: Stories from farmers,employees, and partners)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">text 1</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text 2</label>
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

    <h3>Section 9(Join us in making a difference)</h3>

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

<section>

    {{-- for team i will make a separate page --}}
</section>

<section>
    {{-- our purpose and values same card part --}}
</section>

<section>

    <h3>Empowering Communities & the Planet(section)</h3>

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