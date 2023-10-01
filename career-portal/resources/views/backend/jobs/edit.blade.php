@extends('backend.layouts.app')
@section('content')
    <div class="d-flex justify-content-end pt-3 pb-2 p-3">
        <a class="btn btn-info px-3  py-2" href="{{ route('admin.jobs.index') }}">List</a>

    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Edit Jobs</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">

            @error('record')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('admin.jobs.update', $job->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" value="{{ old('title',$job->title) }}" id="title" type="text"
                        placeholder="Default input" aria-label="default input example">
                    @error('title')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Job Category</label>
                    <select class="form-control" name="category_id" required id="category">
                        <option disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id',$job->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class=" my-2 alert alert-danger al">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input class="form-control" value="{{ old('company_name',$job->company_name) }}" name="company_name" id="company_name"
                        type="text" placeholder="Default input" aria-label="default input example">
                    @error('company_name')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Company Details</label>
                    <textarea class="form-control ckeditor " name="company_details" placeholder="Company Details">{{ old('company_details',$job->company_details) }}</textarea>
                    @error('company_details')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="vacancy">Vacancy</label>
                    <input class="form-control" name="vacancy" value="{{ old('vacancy',$job->vacancy) }}" id="vacancy" type="number"
                        placeholder="Default input" aria-label="default input example">
                    @error('vacancy')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control ckeditor" name="description" placeholder="Description">{{ old('description',$job->description) }}</textarea>
                    @error('description')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="description">Job Type Status</label>
                    @foreach ($jobtypes as $jobtype)
                        <div class="form-check">
                            <input class="form-check-input" name="jobtypes[]" type="checkbox" value="{{ $jobtype->id }}"
                                id="{{ 'jobtype_' . $jobtype->id }}"
                                {{ in_array($jobtype->id, old('jobtypes',$job->jobtypes->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ 'jobtype_' . $jobtype->id }}">
                                {{ $jobtype->title }}
                            </label>
                        </div>
                    @endforeach
                    @error('jobtypes')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="description">Experience Level</label>
                    @foreach ($experiencelevels as $experiencelevel)
                        <div class="form-check">
                            <input class="form-check-input" name="experience_level[]" type="checkbox"
                                value="{{ $experiencelevel->id }}" id="{{ 'experience_leve_' . $experiencelevel->id }}"
                                {{ in_array($experiencelevel->id, old('experience_level',$job->experticelevels->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ 'experience_leve_' . $experiencelevel->id }}">
                                {{ $experiencelevel->title }}
                            </label>
                        </div>
                    @endforeach
                    @error('experience_level')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="short_experience_requirements">Short Experience Requirement</label>
                        <textarea class="form-control " name="short_experience_requirements" placeholder="Short Experience requirements">{{ old('short_experience_requirements',$job->short_experience_requirements) }}</textarea>
                        @error('short_experience_requirements')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="experience_requirements">Experience Requirement</label>
                        <textarea class="form-control ckeditor" name="experience_requirements" placeholder="Experience requirements">{{ old('experience_requirements',$job->experience_requirements) }}</textarea>
                        @error('experience_requirements')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="educational_requirements">Educational Requirement</label>
                        <textarea class="form-control ckeditor" name="educational_requirements" placeholder="Educational requirements">{{ old('educational_requirements',$job->educational_requirements) }}</textarea>
                        @error('educational_requirements')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="additional_requirements">Additional Requirement</label>
                        <textarea class="form-control " name="additional_requirements" placeholder="Additional requirements">{{ old('additional_requirements',$job->additional_requirements) }}</textarea>
                        @error('additional_requirements')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="job_location">Job Location</label>
                        <textarea class="form-control " name="job_location" placeholder="Job Location">{{ old('job_location',$job->job_location) }}</textarea>
                        @error('job_location')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <textarea class="form-control" name="salary" placeholder="Job Salary">{{ old('salary',$job->salary) }}</textarea>
                        @error('salary')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="benefits">benefits</label>
                        <textarea class="form-control ckeditor" name="benefits" placeholder="Job benefits">{{ old('benefits',$job->benefits) }}</textarea>
                        @error('benefits')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <textarea class="form-control" name="age" placeholder="Job Age">{{ old('age',$job->age) }}</textarea>
                        @error('age')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" name="gender[]" type="checkbox" value="Male" id="male"
                            {{ in_array('Male', old('gender', json_decode($job->gender))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="gender[]" type="checkbox" value="Female" id="Female"
                            {{ in_array('Female', old('gender', json_decode($job->gender))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="Female">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="gender[]" type="checkbox" value="Others" id="Others"
                            {{ in_array('Others', old('gender', json_decode($job->gender))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="Others">
                            Others
                        </label>
                    </div>
                    @error('gender')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="apply_instruction">Apply Instruction</label>
                        <textarea class="form-control ckeditor" name="apply_instruction" placeholder="Apply Instruction">{{ old('apply_instruction',$job->apply_instruction) }}</textarea>
                        @error('apply_instruction')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label for="apply_procedure">Apply Procedure</label>
                    <textarea class="form-control ckeditor" name="apply_procedure" placeholder="Apply Procedure">{{ old('apply_procedure',$job->apply_procedure) }}</textarea>
                    @error('apply_procedure')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="deadline ">Dead Line</label>
                    <input class="form-control" type="date" name="deadline" id="deadline" name="deadline"
                        value="{{ old('deadline',$job->deadline) }}">
                    @error('deadline')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">

                    <div class="form-check mb-3">
                        <input name="has_online_apply" value="1" type="checkbox" class="form-check-input"
                            id="has_online_apply" {{ old('has_online_apply',$job->has_online_apply) == null ? '' : 'checked' }}>
                        <label class="form-check-label" for="has_online_apply">Has Online Apply ?</label>
                        @error('has_online_apply')
                            <div class=" my-2 alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="form-check mb-3">
                    <input name="is_active" value="1" type="checkbox" class="form-check-input" id="is_active"
                        {{ old('is_active',$job->is_active) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">is Active ?</label>
                    @error('is_active')
                        <div class=" my-2 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>


    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

    <script>
        let classList = document.getElementsByClassName('ckeditor');
        for (let i = 0; i < classList.length; i++) {
            CKEDITOR.ClassicEditor.create(classList[i], {
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF', 'exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                        'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                        'htmlEmbed',
                        '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                            '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                            '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                            '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://c...content-available-to-author-only...r.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            });
        };
    </script>
@endsection
