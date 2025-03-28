<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .navbar-custom {
            background-color: black;
            padding: 10px;
        }
        .navbar-custom a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .search-container {
            background: white;
            padding: 10px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 70%;
            margin: auto;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .search-container input {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .search-container button {
            background-color: green;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">VPLAK</a>
            <div class="d-flex">
                <a href="/products">Product</a>
                <a href="/brands">Brand</a>
                <a href="/categories">Category</a>
                <a href="/brand-categories">Brand Category</a>
                <a href="/orders">Order's Panel</a>
                <a href="/bar-chart">Bar Chart</a>
                <a href="/buying-guide">Buying Guide</a>
                <a href="/excel">Excel</a>
                <a href="/seo-text">SEO Text</a>
                <a href="/logout">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <h3 class="text-center">SEARCH ORDER</h3>
        <div class="search-container">
        <span>By</span>
        <input type="radio" name="searchBy" value="order_id"> Order ID
        <input type="radio" name="searchBy" value="mobile"> Mobile
        <input type="radio" name="searchBy" value="name"> Name
        <input type="radio" name="searchBy" value="email" checked> Email
        <input type="text" id="search-query" placeholder="Enter Order ID or Email">
        <button id="search-button">SEARCH ORDER</button>
    </div>
    <div id="search-results"></div> <!-- Results will be displayed here -->

        <hr>
        @yield('content')
    </div>

</body>
</html>
