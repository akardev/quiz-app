<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>
    <div class="row">
        <div class="col-md-6">
            <div class="list-group">

                @foreach ($quizzes as $quiz)

                <a style="border-color: #9772aa" href="{{ route('quiz.detail',$quiz->slug)}} "
                    class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 style="color: #9772aa" class="mb-1">{{$quiz->title}}</h5>
                        <small style="color: #36074e"><b><i>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' sonra
                            bitiyor' : null
                            }}</i></b></small>
                    </div>
                    <p style="color: #9772aa" class="mb-1">{{ Illuminate\Support\Str::limit($quiz->description,100)}}
                    </p>
                    <small style="color: #36074e"><i><b> {{$quiz->get_questions_count}} soru</b></i></small>
                </a>

                @endforeach
                <div class="mt-2">
                    {{$quizzes->links()}}
                    <br><br>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div align="center" style="color: #9772aa; background-color: #f1d9ed" class="card-header">
                    <b>Quiz Sonuçlarım</b> 
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($myresults as $result)
                    <li class="list-group-item">
                        <a style="color: #9772aa" href="{{ route('quiz.detail',$result->quiz->slug) }}">
                            {{ Illuminate\Support\Str::limit($result->quiz->title,37) }}
                        </a>
                        <span style="background-color: #f1d9ed" class="badge text-dark rounded-pill float-end">{{$result->point}}</span>
                    </li>
                    @endforeach


                </ul>
            </div>
            <img class="mt-4 img-responsive" src="{{asset('quizlogo.png')}}" alt="">
        </div>
    </div>
</x-app-layout>