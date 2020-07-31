// function newProduct(){
//     let name = document.getElementById('name').value
//     let description = document.getElementById('description').value
//     let price = document.getElementById('price').value
//     let image = document.getElementById('image').value
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//     type: "POST",
//     url: '/products/dashboard/create',
//     data: { name:name, description:description,price:price,image:image}
//     }).done(function(data) {
//         // $("#loadagain").load(" #loadagain");
//         // $("#cart").load(" #cart");
//         toastr.options = {
//             "positionClass": "toast-bottom-right",
//         };
//         toastr["success"]('Thêm sản phẩm mới thành công', "Success");

//         console.log(data);

//     });
// }

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

        // $("#content").load(" #content");
        toastr.options = {
            "positionClass": "toast-bottom-right",
        };
        toastr["success"](mess, "Success");
    });
}
