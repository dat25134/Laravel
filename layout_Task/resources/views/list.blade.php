<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<div class="catacogries">
    <table class="table table-border table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @if (!isset($customer))
                <td colspan="4"> Không có dữ liệu </td>
            @else
                @if (count($customer)==0)
                    <td colspan="4"> Không có khách hàng nào </td>
                @else
                @foreach ($customer as $item)
                <tr>
                <td>{{$item[0]}}</td>
                <td>{{$item[1]}}</td>
                <td>{{$item[2]}}</td>
                <td>{{$item[3]}}</td>
                </tr>
            @endforeach
                @endif
            @endif
        </tbody>
    </table>
</div>
