@extends('app.layout')


@push('styles')
@endpush

@section('content')

<div class="page-header d-print-none">

     <div class="container-xl">
        <h3>Create Blog</h3>

        <div class="card">
  <div class="card-body">

    <form action="/admin/blog/create" enctype="multipart/form-data" method="POST"  id="main_form">

    <div class="card pt-3 p-4">

      <div class="row">

        <div class="row">
  <div class="mb-3 col-6">
      <label for="" class="form-label">Featured image</label>
      <input type="file" class="form-control img_inpp" name="blog_image">
      
  </div>
  <div class="mb-3 col-2 pt-4">
      
      <button type="button" class="btn btn-danger clear-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reset image"><i class="bi bi-arrow-clockwise"></i></button>
  </div>
  <div class="mb-3 col-4">
      {{-- <img class="Thumbnail" src="{{ optional($section)->sec2image ? asset_env('aboutpage/'.$section->sec2image) : asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail"> --}}
      <img class="Thumbnail" src="{{ asset_env('images/default.jpg') }}"  width="400" alt="Default picture Thumbnail">
      
      
  </div>
</div>

        <div class="mb-3 col-6">
          <label for="" class="form-label">blog title</label>
          <input type="text" class="form-control" name="title">
        </div>

        {{-- <div class="mb-3 col-6">
  <label for="blog_category" class="form-label">Blog Category</label>
  <select name="category" id="blog_category" class="form-control">
    <% categories.forEach(cat => { %>
      <option value="<%= cat._id %>"><%= ucfirst(cat.name) %></option>
    <% }); %>
  </select>
</div> --}}

{{-- <div class="mb-3 col-6">
  <label for="blog_author" class="form-label">Author Name</label>
  <select name="author" id="blog_author" class="form-control">
    <% authors.forEach(auth => { %>
      <option value="<%= auth._id %>"><%= ucfirst(auth.name) %></option>
    <% }); %>
  </select>
</div> --}}

{{-- 
<div class="mb-3 col-6">
  <label for="blog_author" class="form-label">Tags</label>
  <select name="tag" id="blog_author" class="form-control" multiple>
    <% tags.forEach(tag => { %>
      <option value="<%= tag._id %>"><%= ucfirst(tag.name) %></option>
    <% }); %>
  </select>
</div> --}}

        <div class="mb-3 col-6">
          <label for="" class="form-label">Date</label>
          <input type="date" class="form-control">
          
          
        </div>

        <div class="mb-3 col-6 mt-5">
          <div class="form-check form-switch">
  <input class="form-check-input" name="publish" type="checkbox" role="switch" id="switchCheckDefault">
  <label class="form-check-label" for="switchCheckDefault">Publish</label>
</div>
        </div>
        

        <div class="mb-3 col-12">
          <label for="" class="form-label">blog content</label>
          <textarea name="content" id="blog_content" class="form-control"></textarea>
          
        </div>
        
      </div>

    </div>


    <div class="accordion" id="accordionExample">

      <div class="accordion-item mb-3 mt-3">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSEO" aria-expanded="false" aria-controls="collapseCaseStudies">
      <i class="bi bi-globe mx-2"></i>SEO
    </button>
  </h2>
  <div id="collapseSEO" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <div class="card pt-3 p-4">

        <h3>SEO
        </h3>
        

        <div class="mb-3">
          <label for="" class="form-label">SEO Title (Meta Title)</label>
          <input type="text" name="meta_title" class="form-control">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Slug (URL)</label>
          <input type="text" name="slug" class="form-control">
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Meta Description</label>
          <textarea name="meta_description" rows="3" class="form-control"></textarea>
        </div>


        <div class="mb-3">
          <label for="" class="form-label">Structured Data (Schema Markup)</label>
          <textarea name="schema_markup" rows="5" class="form-control" placeholder='Paste JSON-LD here'></textarea>
        </div>


    
        

        
    </div>
    </div>
  </div>
</div>

    </div>
    

<div class="text-end p-3" style="bottom:0;position:sticky;z-index: 1030;">
    <button class="btn btn-lg btn-primary p-3" id="spin_submit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Save"><i class="bi bi-floppy2-fill mx-2" ></i></button> 
     
</div>

</form>
   
  </div>
</div>


     </div>
    
</div>

@endsection

@push('scripts')
@endpush