<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
{{--<script>--}}
{{--    window.onload=function() {--}}
{{--        window.frames["printf"].focus();--}}
{{--        window.frames["printf"].print();--}}
{{--    }--}}
{{--</script>--}}


      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Category</th>
                  <th>SubCategory</th>
                  <th>Name</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
          @foreach($kits as $kit)
              <tr>
                  <td>{{$kit->id}}</td>
                  <td>{{$kit->category->name}}</td>
                  <td>{{$kit->subCategory->name}}</td>
                  <td>{{$kit->name}}</td>
                  <td>
{{--                      <input type="button" onclick="var newWin = window.frames['printf'];--}}
{{--                        newWin.document.write('<body onload=window.print()>{{$kit->id}}</body>');--}}
{{--                        newWin.document.close();" value="print"/>--}}
                        <button name="btn" class="btn_press">press</button>

                  </td>
              </tr>
          @endforeach
          </tbody>
      </table>

<iframe id="printf" name="printf"   src="about:blank"></iframe>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src=" https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        let table = $('#example').DataTable();

        $('#example tbody').on('click', '.btn_press', function () {
            let data = table.row($(this).parents('tr')).data();
            let id = data[0];
            let url = "{{route('print',':id')}}"
            url = url.replace(':id',id);
            document.getElementById('printf').src = url;
        });
    });

</script>
</body>
</html>
