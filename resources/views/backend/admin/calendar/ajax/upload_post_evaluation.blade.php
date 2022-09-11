
   <form action="{{ route('admin.trainee.uploadcourseMaterials', ['type' => 'post-evaluation']) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input name="course_id" value="{{ $trainingCourse->id }}" type="hidden">

    <table class="table table-separate table-head-custom table-checkable table-striped 44" id="">   
        <tbody id="upload_material_table">  
            <tr class="mb-5">
                <td class="pt-5 font-weight-bold" width="15%">post evaluation form</td>
                <td width="20%"><input class="form-control-custom-file" name="material_file" type="file" id="formFile"></td>
                <td width="10%">
                    <button type="submit" class="btn btn-success block">Upload <i class="ml-2 fa fa-upload" aria-hidden="true"></i></button>     
                </td>
            </tr>  
        </tbody>
    </table>
</form>
