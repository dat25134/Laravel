function updateSL(id,ele){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let sl =$(ele).val();
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

function delCartItem(id){
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
        $("#loadagain").load(" #loadagain");
    });
}
function delCart(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    type: "POST",
    url: 'http://localhost:8000/products/deleteCart/all',
    }).done(function(message) {
        $("#listProdut").load(" #listProdut");
        toastr["success"](message, "Success");
        $("#loadagain").load(" #loadagain");
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

// function updateViewList(){
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//     type: "POST",
//     url: "/products/dashboard/list",
//     }).done(function(data) {
//         // $("#total").text(Number(data[0]).toLocaleString('en') + " VNĐ");
//          document.getElementById('content').innerHTML = data;
//         // $("#p"+id).text(Number(data[1]).toLocaleString('en') + " VNĐ");
//         // $("#loadagain").load(" #loadagain");
//     });
// }
