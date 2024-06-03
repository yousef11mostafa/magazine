@include('admin.header')

@include('admin.sidebar')

<div id="page-wrapper">
    <div id="page-inner">


        <div class="row">
            <div class="col-lg-12">
                <h2>{{ $page_title }}</h2>
            </div>
        </div>
        <hr />

        <form method="POST"  enctype="multipart/form-data">
            @csrf

            <div style="COLOR:RED;">
                @foreach ($errors->all() as $error )
                     {{ $error }} <br>
                @endforeach
            </div>


            <div class="row mb-5" style="margin-bottom: 15px;">
              <label for="inputEmail3" class="col-sm-2 col-form-label">cateogry</label>
              <div class="col-sm-10">
                <input type="text" name="category" class="form-control" id="inputEmail3" value="{{ $category->category}}">
              </div>
            </div>

            <input type="submit" value="edit" class="btn btn-primary" style="margin-top:10px;">
          </form>


           <a href="{{ url("admin/categories") }}" class='btn btn-success  ' style="float:right;">back</a>



        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


@include('admin.footer')


<script>
    $('#summernote').summernote({
      placeholder: 'Hello Bootstrap 5',
      tabsize: 2,
      height: 100
    });
  </script>
