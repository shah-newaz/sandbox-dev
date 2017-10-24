<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<body>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Name</th>
            <th>Category</th>
            <th>Size</th>
        </thead>

        @foreach($products as $product)
         <tr>
             <td>{{ $product->name }}</td>
             <td>{{ $product->category->name }}</td>
             <td>{{ $product->size }}</td>
         </tr>
        @endforeach    
    </table>
</body>
</html>