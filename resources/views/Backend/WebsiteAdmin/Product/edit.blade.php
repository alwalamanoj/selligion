@extends('Backend.WebsiteAdmin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Update</h4>
                    <h6>Update Product</h6>
                </div>
                <div class="page-btn">
                    <a href="/admin/dashboard/product/all" class="btn btn-added">
                        <img src="{{ asset('assets/admin/assets/img/icons/eye1.svg') }}" alt="img" class="me-1">All
                        Product</a>
                </div>
            </div>
            <form action="/admin/dashboard/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" required value="{{ $product->product_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="select select-category" name="category_id" required>
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            @if ($product->category_id == $category->id)
                                                <option selected value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Price*</label>
                                    <input type="text" name="product_price" required
                                        value="{{ $product->product_price }}">
                                </div>
                            </div>
                            <div class="col-lg-6
                                        col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Tax</label>
                                    <select class="select" required name="tax_id">
                                        <option value="">Choose Tax</option>
                                        @foreach ($taxes as $tax)
                                            @if ($product->tax_id == $tax->id)
                                                <option selected value="{{ $tax->id }}">{{ $tax->tax_name }}
                                                </option>
                                            @else
                                                <option value="{{ $tax->id }}">{{ $tax->tax_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description (Optional)</label>
                                    <textarea class="form-control" name="product_description">{{ $product->product_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" name="sku" required value="{{ $product->sku }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>HSN/SAC Code</label>
                                    <input type="text" name="hsn_sac_code" value="{{$product->hsn_sac_code}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" required value="{{ $product->quantity }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>AddOn</label>
                                    <select class="select" name="addOn" required>
                                        <option value="">Is an AddOn ?</option>
                                        @if ($product->addOn == 'yes')
                                            <option selected value="yes">Yes</option>
                                            <option value="no">No</option>
                                        @else
                                            <option value="yes">Yes</option>
                                            <option selected value="no">No</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select" name="status" required>
                                        <option value="">Choose Status</option>
                                        @if ($product->status == 'publish')
                                            <option selected value="publish">Publish</option>
                                            <option value="hide">Hide</option>
                                        @else
                                            <option value="publish">Publish</option>
                                            <option selected value="hide">Hide</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Slug*</label>
                                    <input type="text" name="slug" required value="{{$product->slug}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-row flex-wrap gap-2">
                                @foreach($product->images as $image)
                                    <div class="img-box d-flex flex-column justify-content-center">
                                        <img src="{{asset( $image->product_img_path ) }}" alt="{{ $image->product_img_path }}" width="150px" class="m-2 img-fluid prod-img-main" style="height: 150px; object-fit: cover;">
                                        <a href="/admin/dashboard/product/image/delete/{{$image->id}}" class="m-2">
                                            <button type="button" class="btn btn-danger w-100">Delete</button>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <table id="imageTable" class="table mb-2">
                                    <thead>
                                        <tr>
                                            {{-- <th>Product Images</th> --}}
                                            <th>
                                                <a type="button" onclick="addRow()" class="btn btn-submit">
                                                    <img src="{{asset('assets/admin/assets/img/icons/plus.svg')}}" alt="img" class="me-1"></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <input type="file" name="product_images[]" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
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
        function addRow() {
            var table = document.getElementById("imageTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell = newRow.insertCell(0);
            cell.colSpan = 2;

            var fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.name = "product_images[]";
            fileInput.classList.add("mt-2");
            fileInput.classList.add("form-control");

            cell.appendChild(fileInput);
        }
    </script>
@endsection
