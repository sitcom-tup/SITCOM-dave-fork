<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!--Material Icons-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background:black;
            }
            .material-icons {
                vertical-align: middle;
                line-height: 0 !important;
                position: relative;
                top: -1px;
            }
        </style>
    <title>API Testing Page</title>
</head>
<body>
    <div class="container" style="width:100%">
        <div class="row">
            <div class="col-sm-3 m-2 p-2" style="border:1px solid green;color:white" id="api_list">
                <h5>Available API Endpoints</h5>
            </div>  
            <div class="col-sm-8 m-2 p-2" style="border:1px solid green">
                <h1 class="text-white">Welcome to API Testing Page</h1>
                <div class="input-group p-2">
                    <select class="input-group-prepend bg-success" aria-label="" style="width:auto;color:white" id="api_method">
                        <option selected value="GET">GET</option>
                        <option value="POST">POST</option>
                        <option value="PUT">PUT</option>
                        <option value="PATCH">PATCH</option>
                        <option value="DELETE">DELETE</option>
                    </select>
                    <input type="text" id="api_endpoint" class="form-control bg-dark" placeholder="API Endpoint" style="color:white;">
                    <button type="button" id="send_request" class="btn btn-primary">SEND <span class="material-icons">send</span></button>
                </div>
                <div class="params p-2">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="JSON content" id="api_json_body" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Body</label>
                    </div>
                </div>
                <div class="input-group p-2">
                    <span class="input-group-text" id="">Auth</span>
                    <input type="text" name="api_token" id="api_token" class="form-control bg-light">
                </div>
                <div class="p-2">
                    <div style="width:100%">
                        <pre id="api_content" style="background-color:white;"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {

            $.ajax({
                type:'GET',
                url:'routes',
                dataType:'json',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                },
                success:function(data) {
                    $.each(data,function(key,value) {
                        if(value.uri.match(/api/g)){
                            var route_methods = '';
                            $.each(value.methods, function(key,method){
                                if(method === "GET"){
                                    route_methods += '<span class="badge bg-success">GET</span>';
                                }
                                if(method === "DELETE"){
                                    route_methods += '<span class="badge bg-danger">DELETE</span>';
                                }
                                if(method === "POST" || method === "PUT" || method === "PATCH"){
                                    route_methods += '<span class="badge bg-primary">POST</span>';
                                }
                            });
                            $('#api_list').append('<p>'+route_methods+' '+value.uri+'</p>');
                        }
                    });

                    // Set origin || hostname automatically on load
                    $('#api_endpoint').val(window.location.origin + '/');
                }
            });

            $('#send_request').click(function() {
                console.log($('#api_endpoint').val());
                console.log($('#api_method').val());
                
                var body = $('#api_json_body').val() ? JSON.parse($('#api_json_body').val()) : '';
                console.log(body);

                var token = $('#api_token').val() ? $('#api_token').val() : ''; 
                console.log(token);

                $.ajax({
                    type: $('#api_method').val(),
                    url: $('#api_endpoint').val(),
                    data: JSON.stringify(body),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': token,
                        'Accept' : 'application/json',
                        'Content-type' : 'application/json',
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#api_content').html('');
                        $('#api_content').html(JSON.stringify(data,null,'  '));
                    },
                    error: function(data) {
                        console.log(data);
                        $('#api_content').html('');
                        $('#api_content').html(JSON.stringify(data.responseJSON,null,'  '));
                    }
                });

            });
        })
    </script>
</body>
</html>