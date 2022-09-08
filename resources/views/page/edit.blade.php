<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <div class="nk-block-head">
          <div class="nk-block-head-content">
               <h4 class="title nk-block-title float-left">Upload Image</h4>
          </div>
          <div class="nk-block-des text-right">
               <a href="{{route('page.index')}}"><button class="btn btn-secondary"><em class="icon ni ni-arrow-left"></em>Back</button></a>
          </div>
     </div>
     <div class="card card-bordered">
          <div class="card-inner">
          @php $pID= base64_encode($page->id); 

           @endphp
               <form action="{{ route('page.update', $pID) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                         <label for="name">Name<span class="text-danger">*</span></label>
                         <input required class="form-control" type="text" name="name" id="name" aria-describedby="title_help" value="{{$page->name}}" placeholder="Enter Name">
                    </div>
                    <label>Image</label>
                    <div class="form-group col-12">
                         <input type="file" class="custom-file-input" id="image" value="{{$page->image}}" name="image" aria-describedby="blog_featured_image_help">
                         <label class="custom-file-label" for="image" required>@if($page->image) {{$page->image}} @else Choose file @endif</label>
                    </div>
                    <div class="row">
                         <div class="form-group mb-4">
                              <label for="page_name">Page Name<span class="text-danger">*</span></label>
                              <input required class="form-control" type="text" name="page_name" id="page_name" aria-describedby="title_help" value="{{$page->page_name}}" placeholder="Eg. Laravel">
                         </div>
                         <div class="form-group mb-4">
                              <label for="link">Link<span class="text-danger">*</span></label>
                              <input required class="form-control" type="text" name="link" id="link" aria-describedby="title_help" value="{{$page->link}}" placeholder="">
                         </div>
                    </div>
                    <button type='submit' class='btn btn-primary mt-3'>Upload</button>
               </form>
          </div>
     </div>
</body>

</html>