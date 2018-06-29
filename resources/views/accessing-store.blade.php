@extends('layouts.main')

@section('content')
    @php $page = 'index'; @endphp

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths">
                        <progress class="progress is-danger" value="0" max="100" id="progress">0%</progress>

                    Your trip number is: {{ $trip_number }}
                    <br>
                    <script>
                        var progress = 0;
                        setInterval(function() {
                            progress += 10;
                            (progress < 101) ? ($('#progress').val(progress)) : (clearInterval());
                        },500);

                        var accessing = "{{ $tracking_link }}";
                        window.setTimeout(function(){
                            window.location.href = accessing;
                        }, 4500);
                    </script>
                </div>
            </div>
        </div>
    </section>
    
@endsection