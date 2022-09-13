@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="brand-text">Data insert to Database from CSV</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('import-data-csv') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="rtt">
                            <label><strong>সিলেক্ট ফাইলঃ </strong></label><br>
                            <input type="file" name="csv_file" required class="form-group" >
                          
                        </div><br>
                            <button type="submit" class="btn btn-primary" style="margin-left: 300px;">ইম্পোর্ট</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection