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
            <a href="{{ url("admin/categories/add") }}"><button class="btn-primary">add categoy</button></a>

        </div>


        <table class="table  table-striped">
            <thead>
              <tr class="text-center">
                <th scope="col">category</th>
                <th scope="col">Date</th>
                <th scope="col">active</th>
              </tr>
            </thead>
            <tbody>




              @foreach ($categories as $category)
              <tr>
                <td>{{ $category->category }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ url("admin/categories/edit/" . $category->id)}}"><span class="btn btn-success btn-sm">edit</span></a>
                    <a href="{{ url("admin/categories/delete/" . $category->id)}}"> <span class="btn btn-danger btn-sm">delete</span></a>

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
