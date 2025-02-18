@extends('app.layout')

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Aboutpage</h1>



<form action="{{url('/add_homepage')}}" method="POST">

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
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">content</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="mb-3 d-flex">
            <div class="mx-2">
                <label for="" class="form-label">button text(read more)</label>
                <input type="text" class="form-control ">
            </div>

            <div class="mx-2">
                <label for="" class="form-label">button url</label>
                <input type="text" class="form-control ">
            </div>

        </div>

        {{-- section for adding in the images --}}



    </section>

<hr>


<section>

    <h3>Section 1 (Cultivating Sustainable Future)</h3>

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
            <label for="" class="form-label">button text(read more)</label>
            <input type="text" class="form-control ">
        </div>

        <div class="mx-2">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control ">
        </div>

    </div>

    {{-- section for adding in the images --}}



</section>


<hr>

<section>

    

    <h3>Our Guiding Light</h3>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>


    {{-- images part --}}


</section>

<hr>

<section>

    <h3>Our Mission:Growing Sustainability, Together(section)</h3>

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
                <label class="form-label">sub text</label>
                <input type="text" class="form-control">
                
            </div>

            
            

        </div>

        {{-- use the multiple component
    read more --}}

    <div class="col-12">

        
        {{-- cards and stuff for the akv pillars --}}
        
    </div>

    

    </div>



    
    
    
</section>


<section>

            <h3>Journey from Barren Lands to Lush Forests</h3>

            {{-- add in the cards here --}}

            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">title</label>
                    <textarea name="" id="" class="form-control"></textarea>
                    
                </div>
                <div class="col-12">
                    <label for="">content</label>
                    <textarea name="" id="" class="form-control"></textarea>
                </div>

                <div class="col-12">
                    <label for="" class="form-label">our milestones(text)</label>
                    <input type="text" class="form-control">
                    
                </div>

                {{-- cards for milestones --}}

                {{-- card1 --}}
                <div class="col-6">
                    <label for="" class="form-label">card title</label>
                    <textarea name="" id=""></textarea>


                </div>

                <div class="col-6">
                    <label for="" class="form-label">content</label>\
                    <textarea name="" id=""></textarea>
                </div>

                {{-- card2 --}}
                <div class="col-6">
                    <h4>card 1</h4>
                    <label for="" class="form-label">card title</label>
                    <textarea name="" id=""></textarea>


                </div>

                <div class="col-6">
                    <h4>card 2</h4>
                    <label for="" class="form-label">content</label>\
                    <textarea name="" id=""></textarea>
                </div>

                {{-- card3 --}}
                <div class="col-6">
                    <h4>card 3</h4>
                    <label for="" class="form-label">card title</label>
                    <textarea name="" id=""></textarea>


                </div>

                <div class="col-6">
                    <label for="" class="form-label">content</label>\
                    <textarea name="" id=""></textarea>
                </div>
                
            </div>

            


            {{-- elements and stuff multiple ones --}}
</section>

<section>

    {{-- our journey card part --}}
</section>

<section>

    <h3>The Roots of Our Mission(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <h4>Sustainable Agroforestry Practices</h4>
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">

            <label for="" class="form-label">content</label>
                    <textarea name="" id="" class="form-control"></textarea>

            
        </div>
        <div class="col-12 mb-3">
            <h4>Community-Centric Development</h4>
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>

            <label for="" class="form-label">content</label>
                    <textarea name="" id="" class="form-control"></textarea>

            
        </div>
        <div class="col-6 mb-3">
            <h4>Cutting Edge Techonology Integration</h4>
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">

            <label for="" class="form-label">content</label>
                    <textarea name="" id="" class="form-control"></textarea>

            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>
    </div>


</section>

<section>

    <h3>Our Visionaries (section)</h3>

    <div class="col-12 mb-3">
        <label for="" class="form-label">title main</label>
        <input type="text" class="form-control">
        
    </div>
    {{-- show people from the team specific ones for this --}}

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
    </div>


</section>

<section>

    <h3>Let's Go Green Together(section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
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
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button text(read more text)</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-6 mb-3">
            <label for="" class="form-label">button url</label>
            <input type="text" class="form-control">
            
        </div>
    </div>


</section>

<section>

    <h3>Support Our Cause(section)</h3>

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
            <label for="" class="form-label">button text(read more text)</label>
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