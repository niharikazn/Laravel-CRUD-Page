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
 <form method='post' action='{{route("page.store")}}' enctype="multipart/form-data">
 @csrf
 <div class="form-group mb-4">
 <label for="name">Name<span class="text-danger">*</span></label>
 <input required class="form-control" type="text" name="name" id="name" aria-describedby="title_help" placeholder="Enter Name">
 </div>
 <label>Image</label>
 <div class="form-group col-12">
 <input type="file" class="custom-file-input" id="blog_featured_image" name="image" aria-describedby="blog_featured_image_help">
 <label class="custom-file-label" for="blog_featured_image" required>Choose file</label>
 </div>
 <div class="row">
 <div class="col-md-6 mt-2">
 <div class="custom-control custom-checkbox">
 <input type="checkbox" class="custom-control-input" id="fullsize" name="fullsize" value="fullsize" checked>
 <label class="custom-control-label" for="fullsize">Full size (no resizing)</label>
 </div>
 </div>
 <div class="form-group mb-4">
 <label for="page_name">Page Name<span class="text-danger">*</span></label>
 <input required class="form-control" type="text" name="page_name" id="page_name" aria-describedby="title_help" placeholder="Eg. Laravel">
 </div>
 <div class="form-group mb-4">
 <label for="link">Link<span class="text-danger">*</span></label>
 <input required class="form-control" type="text" name="link" id="link" aria-describedby="title_help" placeholder="">
 </div>
 </div>
 <button type='submit' class='btn btn-primary mt-3'>Upload</button>
 </form>
 </div>
</div>
</body>
</html>