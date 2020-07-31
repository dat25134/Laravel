function newProduct(){
    let name = document.getElementById('name').value
    let description = document.getElementById('description').value
    let price = document.getElementById('price').value
    let image = document.getElementById('image').value
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/dashboard/create',
    data: { name:name, description:description,price:price,image:image}
    }).done(function(product) {
        toastr.options = {
            "positionClass": "toast-bottom-right",
        };
        toastr["success"]("Thêm sản phẩm mới thành công", "Success");
        newtr = '<tr id="p'+product.id+'"><td>'+product.id+'</td><td id="productName'+product.id+'">'+product.name+'</td><td id="productDes'+product.id+'">'+product.description+'</td><td id="productPrice'+product.id+'">'+product.price+'</td><td id="productImg'+product.id+'"><img src="'+product.image+'" alt="" style="width:50px;height:50px"></td><td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product" onclick="getProduct('+product.id+')">Edit</button><button class="btn btn-danger ml-3" onclick="delProduct('+product.id+')">Delete</button></td></tr>';
        $("#body").append(newtr);
    });
}

function delProduct(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/dashboard/'+id+'/delete',
    }).done(function(mess) {
        // $("#loadagain").load(" #loadagain");
        document.getElementById('p'+id).remove();
        // $("#content").load(" #content");
        toastr.options = {
            "positionClass": "toast-bottom-right",
        };
        toastr["success"](mess, "Success");
    });
}

function getProduct(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/dashboard/'+id+'/get',
    }).done(function(product) {
    document.getElementById('idProduct').value= product.id;
    document.getElementById('nameProduct').value = product.name ;
    document.getElementById('desProduct').value = product.description ;
    document.getElementById('priceProduct').value= product.price;
    document.getElementById('imageProduct').value= product.image;
    });
}

function editProduct(){
    let id = document.getElementById('idProduct').value;
    let name = document.getElementById('nameProduct').value;
    let description = document.getElementById('desProduct').value;
    let price = document.getElementById('priceProduct').value;
    let image = document.getElementById('imageProduct').value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/dashboard/'+id+'/edit',
    data: { name:name, description:description,price:price,image:image}
    }).done(function(product) {
        // $("#loadagain").load(" #loadagain");
        // document.getElementById('p'+id).remove();
        // $("#content").load(" #content");
        // document.getElementById('productName'+id).value = product.name;
        // document.getElementById('productDes'+id).value = product.description
        // document.getElementById('productPrice'+id).value = product.price
        // document.getElementById('productImg'+id).value = product.image
        $("#productName"+id).text(product.name);
        $("#productDes"+id).text(product.description);
        $("#productPrice"+id).text(product.price);
        document.getElementById("productImg"+id).innerHTML = '<img src="'+product.image+'" alt="" style="width:50px;height:50px">';
        toastr.options = {
            "positionClass": "toast-bottom-right",
        };
        toastr["success"]('Cập nhật thành công', "Success");
    });
}
