function updateSL(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let sl = document.getElementById(id).value;
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/sesion/page/' + id,
    data: { sl:sl}
    }).done(function(data) {
        $("#total").text(Number(data[0]).toLocaleString('en') + " VNĐ");
        $("#p"+id).text(Number(data[1]).toLocaleString('en') + " VNĐ");
        $("#loadagain").load(" #loadagain");
    });
}

function delCart(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/'+ id +'/delete',
    }).done(function(message) {
        $("#listProdut").load(" #listProdut");
        toastr["success"](message, "Success");
    });
}

function addcart(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/'+id+'/addcart',
    }).done(function(message) {
        $("#loadagain").load(" #loadagain");
        $("#cart").load(" #cart");
        toastr.options = {
            "positionClass": "toast-bottom-right",
        };
        toastr["success"](message, "Success");


    });
}
