@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Flash Deal Category Information')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('campaign.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label" for="name">{{translate('Category Name')}}</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="{{translate('Category Name')}}" id="name" name="name" value="{{ $category->category_name }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>(1920x500)</small></label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner" value="{{ $category->banner }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0 inline-block float-right text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
