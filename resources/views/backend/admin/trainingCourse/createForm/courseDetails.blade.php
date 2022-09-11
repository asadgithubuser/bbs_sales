<div class="card">
    <div class="card-header">
        Course Details
    </div>
    <div class="card-body">
    <form action="{{ route('admin.course.store') }}" method="post">
        @csrf
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Course Title<span class="text-danger">
                        *</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <input type="text"
                        data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'title']) }}"
                        placeholder="Course Title" class="form-control ajax-course-details-data-insert" name="title"
                         required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Fiscal Year<span class="text-danger">
                        *</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <select data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'fiscal_year']) }}"
                        name="fiscal_year" id="fiscal_year" class="form-control ajax-course-details-data-insert">
                        
                        <option value="">-- Select Fiscal Year --</option>
                     
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Trainer<span class="text-danger">
                        *</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <select data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'trainer']) }}"
                        name="trainer" id="trainer" class="form-control ajax-course-details-data-insert">
                        @if ($course->trainer_id)
                            <option value="{{ $course->trainer_id }}">{{ $course->trainer->name }}</option>
                        @else
                            <option value="">-- Select Trainer --</option>

                        @endif
                        @foreach ($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            

            
        </div>
        <div class="col-lg-6">
        <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Course Director</label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    {{-- <select data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'director']) }}"
                        name="director" id="director" class="form-control ajax-course-details-data-insert">
                        
                            <option value="">-- Select Course Director --</option>
                      
                        @foreach ($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>

                        @endforeach
                    </select> --}}
                    <input type="hidden"  name="director" value="{{ $coursedirector->id }}">
                    <input type="text" class="form-control" value="{{ $coursedirector->first_name.' '.$coursedirector->middle_name.' '.$coursedirector->last_name }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Course Coordinator<span class="text-danger">
                        *</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <select data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'coordinator']) }}"
                        name="coordinator" id="coordinator" class="form-control ajax-course-details-data-insert">
                        
                            <option value="">-- Select Course Coordinator --</option>
                        
                        @foreach ($courseCoordinator as $cc)
                            <option value="{{ $cc->id }}">{{ $cc->first_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-form-label col-lg-12 col-sm-12">Course Purpose<span class="text-danger">
                        *</span></label>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <textarea type="text"
                        data-url="{{ route('admin.course.courseUpdate', ['course' => $course, 'type' => 'purpose']) }}"
                        name="purpose" id="purpose" class="form-control ajax-course-details-data-insert"
                        placeholder="Course Purpose"></textarea>
                </div>
            </div>

        </div>
        </div>
        </form>
    </div>
</div>
