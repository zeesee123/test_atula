@extends('app.layout')

@push('styles')

<style>
h1{color:'red'}
</style>
@endpush



@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <h1>Homepage</h1>



<form action="{{url('/add_homepage')}}" method="POST">

    @if(session('success'))

    <div style="color:green;">
        {{session('success')}}
    </div>

    @endif

    @csrf

    <section>

        <h3>Section 1 (Forests of tomorrow,prosperity for generations)</h3>

        <div class="mb-3">
            <label for="">Upload video</label>
            <input type="file" name="sec1_vid">
        </div>

        {{-- <div class="mb-3">
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

        </div> --}}



    </section>

<hr>


<section>

    <h3>Hindi/english text with quill</h3>

    <label for="" class="form-label">add in gif</label>
    <input type="file" class="form-control" name="sec2_gif">

</section>


<hr>

<section>

    

    <h3>What we do</h3>

    <div class="mb-3">
        
    </div>

    <div class="mb-3">
        <label for="" class="form-label">content</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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

    <h4 class="mx-2">images</h4>
    
    <div class="" id="whatwedo_images">
        <div class="mb-3 row">
            
            <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="whatwe_doimg[]">
            </div>
            
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addwhatwedo_images()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Making a difference, one tree at a time (section)</h3>

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

        <div class="col-6">

            <div class="mb-3">
                <label class="form-label">impact hightlights text</label>
                <textarea name="" id="" class="form-control"></textarea>
                
            </div>
            

        </div>


        <div class="" id="impact_highlights">
            <div class="mb-3 row">
                
                {{-- <div class="col-3">
                    <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                </div> --}}
                <div class="col-3">
                    <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                    
                </div>
                
                <div class="col-3">
                    <button class="btn btn-primary" type="button" onclick="addimpact_highlights()">+</button>
                </div>     
            </div>
        </div>

    

    <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button text(join the mission)</label>
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="col-6">

        <div class="mb-3">
            <label for="" class="form-label">button url(join the mission)</label>
            <input type="text" class="form-control">
        </div>
    </div>

    </div>



    
    
    
</section>

<hr>

<section>

            <h3>Section (Our Business)</h3>

            {{-- add in the cards here --}}

            
            <div class="" id="ourbusiness_cards">
                <div class="mb-3 row">
                    
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
                    </div>     
                </div>
            </div>

            {{-- elements and stuff multiple ones --}}
</section>

<hr>

<section>

    <h3>Our Journey</h3>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">title</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">image</label>
                <input type="file" class="form-control">
        
            </div>
        </div>
    </div>

    <h4>our journey timestamps</h4>

    <div class="" id="ourjourney_leaves">
        <div class="mb-3 row">
            
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
            </div>     
        </div>
    </div>
    

    
</section>



<section>

    <h3>Our Purpose & Vision (section)</h3>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control">
            
        </div>
        <div class="col-12 mb-3">
            <label for="" class="form-label">text</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
            
        </div>

        <div class="" id="ourpurpose_tabs">
            <div class="mb-3 row">
                
                
                <div class="col-3">
                    <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
                </div>
                <div class="col-3">
                    <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                    
                </div>
                
                <div class="col-3">
                    <button class="btn btn-primary" type="button" onclick="addourpurpose_tabs()">+</button>
                </div>     
            </div>
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

    <h3>What we are working on (section)</h3>

    <div class="row">
      {{-- cards part --}}
      <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control">

      </div>
    </div>

    <div class="" id="whatwork_tabs">
        <div class="mb-3 row">
            
            
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
                <button class="btn btn-primary" type="button" onclick="addwhatwork_tabs()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Technology-Driven Agriculture (section)</h3>

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
            <label for="" class="form-label">features text</label>
            <input type="text" class="form-control">
            
        </div>
    </div>

    <div class="" id="techimg_tabs">
        <div class="mb-3 row">
            
            
            <div class="col-3">
                <input type="file" placeholder="icon" class="form-control" name="icon_service[]">
            </div>
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addtechimg_tabs()">+</button>
            </div>     
        </div>
    </div>


</section>

<hr>

<section>

    <h3>Our Purpose & Values</h3>

    <div class="mb-3">
        <label for="" class="form-label">title</label>
        <input type="text" class="form-control">
    </div>

    <div class="" id="pvalue_tabs">
        <div class="mb-3 row">
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
            </div>     
        </div>
    </div>

</section>

<hr>

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


    <div class="" id="badge_tabs">
        <div class="mb-3 row">
            
            
            
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addbadge_tabs()">+</button>
            </div>     
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

    <hr>

    <div class="" id="partchange_tabs">
        <div class="mb-3 row">
            
            
            
            <div class="col-3">
                <textarea class="form-control" name="desc[]" cols="30" rows="5"></textarea>
                
            </div>

            <div class="col-3">
                <input type="text" class="form-control">
            </div>
         
            
            <div class="col-3">
                <button class="btn btn-primary" type="button" onclick="addpartchange_tabs()">+</button>
            </div>     
        </div>
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


@push('scripts')

<script>
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

</script>
@endpush