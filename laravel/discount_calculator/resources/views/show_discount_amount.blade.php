<html>
    <head>
        <title>Product Discount Calculator</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="content">
            <h1>Product Discount Calculator</h1>
            <label>Product Description: </label>
            <span>{{ $des }}</span><br/>
            <label>Price: </label>
            <span>${{ $price }}</span><br/>
            <label>Discount Percent: </label>
            <span>{{ $per }}%</span><br/>
            <label>Discount Amount: </label>
            <span>${{$amount}}</span><br/>
            <label>Discount Price: </label>
            <span>${{$disPrice}}</span><br/>
        </div>
    </body>
</html>