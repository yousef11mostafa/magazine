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
              <label for="inputEmail3" class="col-sm-2 col-form-label">title</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputEmail3" value="{{ old('title')}}">
              </div>
            </div>

            <div class="row mb-5"style="margin-bottom: 15px;">
              <label for="inputPassword3" class="col-sm-2 col-form-label">image</label>
              <div class="col-sm-10">
                <input type="file" name="file" class="form-control" id="inputPassword3" value="{{ old("file") }}" >
              </div>
            </div>

            <div class="row mb-5"style="margin-bottom: 15px;">
              <label for="inputselect " class="col-sm-2 col-form-label">category</label>
              <div class="col-sm-10">
                <select class="form-control" name="category" id="inputselect " aria-label="Default select example">
                     <option selected>Open this select menu</option>
                    @foreach ($categories as $cat )
                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                    @endforeach
                  </select>
              </div>
            </div>

            <div c>
                <label for="summernote" class="form-label mb-5">content</label>
                <textarea id="summernote" name="content" value="{{ old('content') }}" ></textarea>
            </div>

            <input type="submit" value="add" class="btn btn-primary" style="margin-top:10px;">

          </form>



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
