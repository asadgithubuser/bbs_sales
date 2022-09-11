
   <form action="{{ route('admin.trainee.uploadcourseMaterials', ['type' => 'material']) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input name="course_id" value="{{ $trainingCourse->id }}" type="hidden">

    <table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
        <tbody id="upload_material_table">  
            <tr class="mb-5">
                <td class="pt-5 font-weight-bold" width="15%">Upload Material</td>
                <td width="20%"><input class="form-control-custom-file" name="material_file" type="file" id="formFile"></td>
                <td width="10%">
                    <button type="submit" class="btn btn-success block">Upload <i class="ml-2 fa fa-upload" aria-hidden="true"></i></button>     
                </td>
            </tr>  
        </tbody>
    </table>
</form>

    <!--begin::Card-->
    <div class="card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title">Uploaded Course Materials</h3>
            
        </div>
        <div class="card-body">
        <table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
            <tbody id="upload_material_table">  
                <?php $i = 1; ?>
                @forelse($courseMaterials as $courseMaterial)
                    <tr class="mb-5">
                        <td width="2%">#{{ $i++}}</td>
                        <td class="text-left" width="95%">{{ $courseMaterial->form }}</td>
                    </tr>  
                @empty  
                    <tr>
                        <td colspan="9"><p class="text-center">Item NOT Found.</p></td>
                    </tr>   
                @endforelse

            </tbody>
        </table>
        </div>
    </div>
    <!--end::Card-->
