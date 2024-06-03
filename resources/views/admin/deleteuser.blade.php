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


      @if ($user->id==1)
             <p>Access Denied you can not delete the admin user</p>
             <br>
             <br>
             <p>sorry could not find that category</p>
             <a href="{{ url("admin/users") }}"style="float:right;" class="btn btn-success mt-5">
                Back
             </a>
      @else

        <form method="POST"  enctype="multipart/form-data">
            @csrf

            <div style="COLOR:RED;">
                @foreach ($errors->all() as $error )
                     {{ $error }} <br>
                @endforeach
            </div>


            <div class="row mb-5" style="margin-bottom: 15px;">
              <label for="inputname" class="col-sm-2 col-form-label" readnoly >name</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="inputname" value="{{ $user->name }}">
              </div>
            </div>


            <div class="row mb-5" style="margin-bottom: 15px;">
              <label for="inputEmail3" class="col-sm-2 col-form-label" disabled='disabled' >email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail3" value="{{ $user->email }}">
              </div>
            </div>







            <input type="submit" value="delete" class="btn btn-danger" style="margin-top:10px;">

          </form>


          <a href="{{ url("admin/users") }}"style="float:right;" class="btn btn-success mt-5">
            Back
         </a>

          @endif



        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


@include('admin.footer')







