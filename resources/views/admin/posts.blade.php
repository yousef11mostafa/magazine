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
            <a href="{{ url("admin/posts/add") }}"><button class="btn-primary">add post</button></a>

        </div>


        <table class="table  table-striped">
            <thead>
              <tr class="text-center">
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th scope="col">category</th>
                <th scope="col">feature image</th>
                <th scope="col">Date</th>
                <th scope="col">active</th>
              </tr>
            </thead>
            <tbody>




              @foreach ($posts as $post)
              <tr>
                <td>{{ $post->title }}</td>
                <td><?=$post->content?></td>
                <td>{{ $post->category->category }}</td>
                <td>
                    <img src="{{url("$post->image")}}" alt="" style="width:100px;">

                </td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{ url("admin/posts/edit/" . $post->id)}}"><span class="btn btn-success btn-sm">edit</span></a>
                    <a href="{{ url("admin/posts/delete/" . $post->id)}}"> <span class="btn btn-danger btn-sm">delete</span></a>

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
