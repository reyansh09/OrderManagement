@extends('layouts.app')

@section('content')
    <!-- <div class="container">
        <h3 class="text-center">Search Products</h3>

        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Search product by name...">
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="product-table">
                <tr><td colspan="3" class="text-center">Start typing to search...</td></tr>
            </tbody>
        </table>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#search-button').on('click', function () {
        let query = $('#search-query').val();
        let searchBy = $("input[name='searchBy']:checked").val();

        if (query.length < 3) {
            alert("Please enter at least 3 characters to search.");
            return;
        }

        $.ajax({
            url: "{{ route('search.orders') }}",
            method: "GET",
            data: { query: query, searchBy: searchBy },
            beforeSend: function () {
                $('#search-results').html('<p>Searching...</p>');
            },
            success: function (response) {
                $('#search-results').html(response);
            },
            error: function () {
                $('#search-results').html('<p class="text-danger">Error fetching results.</p>');
            }
        });
    });
});
</script>

@endsection
