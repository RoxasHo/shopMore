<!-- JOEY -->
<div>
    <style>
        nav svg{
            height:20px;
        }
        nav .hidden{
            display:block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                   
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    All Products
                                </div>
                                <div class="col-md-6">
                                     <a href="{{route('admin.product.add')}}" class="btn btn-success float-end">Add New Product</a> 
                                     <a href="{{route('admin.products')}}" class="btn btn-success float-end" style="margin-right:10px">Modify Products</a> 
                                     <a href="{{route('admin.productsxml')}}" class="btn btn-success float-end" style="margin-right:10px">Export XML</a> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        {!! $html !!}
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>                            
</div>



