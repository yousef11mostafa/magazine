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


        <div class="float-end" style="float:right;">
            <a href="{{ url("admin/users/add") }}"><button class="btn-primary">add User</button></a>

        </div>


        <table class="table  table-striped">
            <thead>
              <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Registerd at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>




              @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ url("admin/users/edit/" . $user->id)}}"><span class="btn btn-success btn-sm">edit</span></a>
                    <a href="{{ url("admin/users/delete/" . $user->id)}}"> <span class="btn btn-danger btn-sm">delete</span></a>

                </td>

              </tr>
              @endforeach

            </tbody>
          </table>




        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>


@include('admin.footer')
