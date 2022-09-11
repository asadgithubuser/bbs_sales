<div class="card">
    <div class="card-header">
        Course Curriculam Details
    </div>
    <div class="card-body">
                                
        <form curriculam-save-url="{{route('admin.course.addCourseCurriculam', $course)}}" class="add-course-curriculam">
            
            <div class="row">
                
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Module No: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="number" placeholder="Module Number" class="form-control" name="module_no"
                                value="{{ old('module_no') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Subject Code: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" placeholder="Subject Code" class="form-control" name="subject_code"
                                value="{{ old('subject_code') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-4 col-sm-12">Subject Title: <span
                                class="text-danger">
                                *</span></label>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input type="text" placeholder="Subject Title" class="form-control" name="subject_title"
                                value="{{ old('subject_title') }}" required>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 offset-md-4">
                    <button class="btn btn-block btn-info" type="submit">Add</button>
                </div>
            </div>
        </form>


        @isset($courseCurriculam)
            @if ($courseCurriculam->count() > 0)
                <div class="table-responsive mt-10">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Module</th>
                            <th> Subject Title </th>
                            <th> Subject Code </th>
                            <th> Action </th>
                        </thead>
                        <tbody>
                            @foreach ($courseCurriculam as $courseCurriculam)
                                <tr>
                                    <td>Module-{{ $courseCurriculam->module_no }}</td>
                                    <td>{{ $courseCurriculam->subject_title }}</td>
                                    <td>{{ $courseCurriculam->subject_code }}</td>
                                    <td>
                                        <a href="{{ route('admin.course.editCourseCurriculam',$courseCurriculam) }}" class="btn btn-warning btn-sm"><i class="la la-pencil"></i></a>
                                    
                                        <button type="button" onclick="deleteCourseCurriculam({{ $courseCurriculam->id }})" class="btn btn-danger btn-sm delete-course-curriculam"><i class="la la-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endisset


    </div>
    <div class="card-footer float-right">
        <div class="col-2 offset-10">
            <a href="{{route('admin.course.submitCourse', $course)}}" class="btn btn-success" type="submit">Update Course</a>
            
        </div>
    </div>

</div>