@extends('backend.layouts.master')

@section('title')
About Us
@endsection

@section('extra-css')

<!-- Bootstrap Tagsinput Css -->
{{ Html::style('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}

@endsection

@section('content')

<div class="block-header">
    <ol class="breadcrumb breadcrumb-col-teal">
        <li><i class="material-icons">language</i> Web Contents</li>
        <li class="active"><i class="material-icons">edit</i> About Us</li>
    </ol>
</div>

<!-- About Us -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    About Us
                    <small>Information displayed in <strong>about us</strong> page</small>
                </h2>
            </div>
            <div class="body">
                @php
                $about = json_decode($content->web_contents);
                @endphp

                {!! Form::open(['method' => 'put', 'route' => ['back.contents.update', $content->id], 'name'=>'check_edit', 'class' => 'demo-masked-input', 'id' => 'form_validation']) !!}

                <div class="form-group form-float">
                    <div class="form-line">
                        {!! Form::text("keywords", empty($about->keywords) ? null : $about->keywords, ['class'=>'form-control', 'data-role' => 'tagsinput', 'placeholder' => 'SEO Keywords']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('details', "Details") !!}
                    <div class="form-line">
                        {!! Form::textarea("details", empty($about->details) ? null : $about->details, ['class'=>'tinymce']) !!}
                    </div>
                </div>

                {!! Form::submit("Update", ['class'=>'btn btn-primary waves-effect']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- #END# About Us -->
@endsection

@section('extra-script')

<!-- Bootstrap Tags Input Plugin Js -->
{{Html::script('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}

<!-- TinyMCE -->
{{Html::script('plugins/tinymce/tinymce.min.js')}}

@endsection

@section('custom-script')

<!-- Backend Script -->
{{Html::script('js/backend/script.js')}}

<script type="text/javascript">

        // Declare Tinymce
        tinymce.init({

            selector: "textarea.tinymce",
            height: 800,
            plugins: [
                'advlist autolink lists image code charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table directionality',
                'emoticons template paste textpattern imagetools',
            ],
            toolbar1: 'undo redo | image code| insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media | forecolor backcolor emoticons',
            image_advtab: true,

            images_upload_url: '/add_content_image',

            images_upload_handler: function (blobInfo, success, failure) {

                var xhr, formData;
              
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;

                xhr.open('POST', '/add_content_image');
              
                xhr.onload = function() {
                    var response;
                
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                
                    response = JSON.parse(xhr.responseText);
                
                    if (!response || typeof response.data.path != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                
                    success(window.location.origin+'/'+response.data.path);
                };
              
                formData = new FormData();
                formData.append('upload_image', blobInfo.blob(), blobInfo.filename());
                formData.append('folder','editors');
                formData.append('size','500');
                formData.append('_token', $('meta[name=csrf-token]').attr('content'));
              
                xhr.send(formData);
            }

        });

        tinymce.suffix = ".min";
        tinyMCE.baseURL = '../../plugins/tinymce';

        // Prevent Leave
        window.addEventListener('beforeunload', function(e) {
          var myPageIsDirty = tinymce.activeEditor.isDirty()
          if(myPageIsDirty) {
            e.preventDefault(); //per the standard
            e.returnValue = ''; //required for Chrome
          }
        });

</script>

@endsection