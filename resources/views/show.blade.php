<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
  <h2>List Product</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>stt</th>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $value) 
        <tr>
          <td><?php echo $key + 1; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php
              foreach($categories as $key1 => $value1)
                if($value['id_category'] == $value1['id'])
                  echo $value1['name'];
          ?></td>
          <td><?php
              foreach($images as $key2 => $value2)
                if($value['id'] == $value2['id_product'])
                  echo $value2['name'];
          ?></td>
          <td><a href="{{ url('/admin/product/'.$value['id']) }}"><i class="fas fa-edit"></i></a></td>
          <td><a href=""><i class="fas fa-trash-alt"></i></a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <button type="button" class="btn btn-outline-primary">Create</button>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>