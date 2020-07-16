<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Discount Calculator</title>l
</head>
<body>
    <form action="/disPrice" method="POST">
    @csrf
        <p><label for="">Product Description</label><input type="text" placeholder="Product Description" name="product" value="<?php if(isset($product)) echo $product ?>"></p>
        <p><label for="">List Price</label><input type="text" placeholder="List Price" name="price" value="<?php if(isset($price)) echo $price ?>" ></p>
        <p><label for="">Discount Percent</label><input type="text" placeholder="Discount Percent" name="percent" value="<?php if(isset($percent)) echo $percent ?>"></p>
        <p><label for="">Discount Amount</label><input type="text" name="disAmount" readonly value="<?php if(isset($disAmount)) echo $disAmount ?>"></p>
        <p><label for="">Discount Price</label><input type="text" name="disPrice" readonly value="<?php if(isset($disPrice)) echo $disPrice ?>" ></p>
        <p><input type="submit" name="submit" id="submit" value="Submit"></p>
    </form>
</body>
</html>