<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
     <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=2.9.0')}}">
     <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=2.9.0')}}">
     <link rel="stylesheet" href="{{asset('add-to-homescreen-master/style/addtohomescreen.css')}}">
     <script src="{{asset('add-to-homescreen-master/src/addtohomescreen.js')}}"></script>
     <script>
addToHomescreen();
</script>
     <style>
          .card {
               width: 130%;
               padding-bottom: 2px;
          }

          .card-inner {
               padding-bottom: 0rem;
          }

          table {
               font-family: arial, sans-serif;
               border-collapse: collapse;
               width: 130%;
          }

          td,
          th {
               border: 1px solid black;
               text-align: left;
               padding: 12px;
          }

          tr:nth-child(even) {
               background-color: lightblue;
          }

          img {
               height: 10rem;
               width: 15rem;
          }
     </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
     <div class="nk-app-root">
          <!-- main @s -->
          <div class="nk-main ">
               <div class="nk-block nk-block-lg">
                    <div class="nk-wrap">
                         <div class="nk-content ">
                              <div class="container-fluid">
                                   <div class="nk-content-inner">
                                        <div class="nk-content-body">
                                             <div class="components-preview wide-md mx-auto">
                                                  <div class="nk-block-head nk-block-head-lg wide-sm">
                                                       @if ($message = Session::get('success'))
                                                       <div class="alert alert-success">
                                                            <p>{{ $message }}</p>
                                                       </div>
                                                       @endif

                                                       <div class="card card-bordered">
                                                            <div class="card-inner">
                                                                 <div class="card-head">
                                                                      <h5 class="card-title">Page Images</h5>
                                                                      <a class="btn btn-primary" href="create">Add New data </a>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <br>
                                                       <table id="table">
                                                            <tr>
                                                                 <th>Name</th>
                                                                 <th>Page_name</th>
                                                                 <th>Link</th>
                                                                 <th>Image</th>
                                                                 <th>Edit</th>
                                                                 <th>Delete</th>
                                                            </tr>
                                                            @forelse($pages as $page )
                                                            <tr>
                                                                 <td> {{$page->name;}}</td>
                                                                 <td> {{$page->page_name;}}</td>
                                                                 <td> {{$page->link;}}</td>
                                                                 <td>
                                                                      <div class="toggleshide">
                                                                           <img class="image d-none " src="{{ url('/images/'.$page->image) }}">
                                                                           <button class="hideimg btn btn-primary d-none">Hide</button>
                                                                           <button class="Showimage btn btn-primary" data-image_id="{{$page->id}}">View</button>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      @php $pID= base64_encode($page->id); 
                                                                      @endphp
                                                                      <a class="btn btn-primary" href="{{ route('page.edit',$pID) }}">Edit</a>
                                                                 </td>
                                                                 <td>
                                                                 <a class="btn btn-primary" href="{{ route('page.destroy',$page->id) }}">Delete</a>
                                                                 </td>
                                                                 </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                 <td colspan="7">No Record Found</td>
                                                            </tr>
                                                            @endforelse
                                                       </table>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>

<script>
     $(".hideimg").click(function() {
          $(this).closest('div').find('.image').addClass('d-none');
          $(this).closest('div').find('.Showimage').removeClass('d-none');
          $(this).closest('div').find('.hideimg').addClass('d-none');
     });
     $(".Showimage").click(function() {
          $(this).closest('div').find('.image').removeClass('d-none');
          $(this).closest('div').find('.hideimg').removeClass('d-none');
          $(this).closest('div').find('.Showimage').addClass('d-none');
     });
</script>
<script src="{{asset('assets/js/bundle.js?ver=2.9.0')}}"></script>
<script src="{{asset('assets/js/scripts.js?ver=2.9.0')}}"></script>

</html>