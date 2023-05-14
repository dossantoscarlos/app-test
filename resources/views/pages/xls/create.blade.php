<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <div class="bg-white w-2/4 px-4 py-4 rounded shadow-black mx-auto flex flex-col justify-center mt-5">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
           
        @endif
        <hr/>
       {!! Form::open()->multipart(true) !!}
       {!! Form::file('csv', 'Envie seu documento') !!}
       {!! Form::submit('Upload') !!}
       {!! Form::close() !!}
    </div>
</x-app-layout>