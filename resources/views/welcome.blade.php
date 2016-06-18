<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Producs</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
		<!--[if lt IE 9]>
    {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style> textarea { resize: none; } </style>
</head>
<body>
<div class="container">
    <div class="row">
        <form role="form" id="product-form">
            {!! csrf_field() !!}
            <div class="col-lg-6">
                <div class="well well-sm"><strong>Add new products <span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="productname">Enter Product Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="productname" id="productname" placeholder="Enter Product Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty">Enter Quantity in Stock</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity in Stock" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Enter Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Add Product" class="btn btn-info pull-right">
            </div>
        </form>
        <BR />
        <div id="message" class="col-md-12">


        </div>
    </div>
    <h2>Product Information</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity in Stock</th>
            <th>Price</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $("#product-form").submit(function(event){
            event.preventDefault();
            var data = {productname: $("#productname").val(), qty: $("#qty").val(), price: $("#price").val(), _token: $("._token").val()};
            $.post("/add", data, function(response){
                if(response != "success")
                {
                    $("#message").html('<div class="alert alert-success"><strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong></div>');
                    $("table tbody").append('<tr><td>'+response.product_name+'</td><td>'+response.qty+'</td><td>'+response.price+'</td><td>'+response.date+'</td></tr>');
                }else{
                    $("#message").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong></div>');
                }
                $('.alert').delay(2000).fadeOut(400);
            });
        });
    });
</script>

</body>
</html>