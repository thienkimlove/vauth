<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

    </head>
    <body>
     <h3>Test Authorization</h3>
       @can('index_post')
            <a href="{{url('index_post')}}">View List Post</a>
       @endcan
    </body>
</html>
