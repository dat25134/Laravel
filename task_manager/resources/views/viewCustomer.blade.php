<?php
    session_start();
    $customer = $_SESSION['customer'] ;

?>
<h2>Thông tin chi tiết nhân viên</h2>
    @foreach ($customer as  $key => $item)
        @if ($key == $index)
            <div class="content">
                <p> Tên : {{$item[0]}}</p>
                <p> SĐT : {{$item[1]}}</p>
                <p> email : {{$item[2]}}</p>
            </div>
            <?php break ?>
        @endif
    @endforeach
<a href="/">Quay lại trang chủ</a>
