@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Add Combination</h4>
                    <h6>Create new product Combination</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/product/combination/all" class="btn btn-added">
                        <img src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Combination</a>
                </div>
            </div>
            <form action="/admin/dashboard/product/combination/save" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Combination Title*</label>
                                    <input type="text" name="combination_name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description (Optional)</label>
                                    <textarea class="form-control" name="combination_description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Discount (Optional)</label>
                                    <input type="text" class="form-control" name="combination_discount_price">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Combination Image*</label>
                                    <div class="image-">
                                        <input class="form-control" type="file" name="combination_img"
                                            accept=".jpg, .jpeg, .png" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="status" required>
                                        <option value="">Choose Status</option>
                                        <option value="publish">Publish</option>
                                        <option value="hide">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Select Products</label>
                                    <select class="select" id="selectedProduct" required>
                                        <option value="">Choose Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12 mt-4">
                                <button type="button" class="btn btn-submit" onclick="addProductRow()">Add Product</button>
                            </div>
                            <div class="col-lg-12 selected-products-container">
                            </div>
                            <div class="col-lg-12 my-2">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <button type="reset" class="btn btn-cancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (session('warning'))
        <div id="toast-container" class="toast-container toast-top-right">
            <div class="toast toast-warning" aria-live="polite" style="display: block;">
                <button type="button"class="toast-close-button" role="button">
                    ×
                </button>
                <div class="toast-title">Warning</div>
                <div class="toast-message">{{ session('warning') }}</div>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div id="toast-container" class="toast-container toast-top-right">
            <div class="toast toast-success" aria-live="polite" style="display: block;">
                <button type="button"class="toast-close-button" role="button">
                    ×
                </button>
                <div class="toast-title">Success</div>
                <div class="toast-message">{{ session('success') }}</div>
            </div>
        </div>
    @endif
    <script>
        function addProductRow() {
            // Get the selected product from the dropdown
            var selectedProduct = document.getElementById('selectedProduct');
            var selectedProductId = selectedProduct.value;
            var selectedProductName = selectedProduct.options[selectedProduct.selectedIndex].text;

            // Check if a product is selected
            if (selectedProductId !== '') {
                // Create a container div for the input and delete button
                var containerDiv = document.createElement('div');
                containerDiv.className = 'd-flex align-items-center mb-2';

                // Create a new input field for selected text
                var textInput = document.createElement('input');
                textInput.type = 'text';
                textInput.value = selectedProductName;
                textInput.className = 'form-control mr-2';
                textInput.setAttribute('readonly', 'readonly');

                // Create a new input field for selected value (hidden)
                var valueInput = document.createElement('input');
                valueInput.type = 'text';
                valueInput.name = 'products[]';
                valueInput.value = selectedProductId;
                valueInput.setAttribute('readonly', 'readonly');
                valueInput.className = 'form-control mr-2 d-none';

                // Create a delete button
                var deleteButton = document.createElement('button');
                deleteButton.type = 'button';
                deleteButton.className = 'btn btn-danger';
                deleteButton.innerHTML = 'X';
                deleteButton.addEventListener('click', function() {
                    // Remove the entire container div when the delete button is clicked
                    containerDiv.remove();
                });

                // Append the text, value, and delete button to the container
                containerDiv.appendChild(textInput);
                containerDiv.appendChild(valueInput);
                containerDiv.appendChild(deleteButton);

                // Append the container div to the main container
                document.querySelector('.selected-products-container').appendChild(containerDiv);
            }
        }
    </script>
@endsection
