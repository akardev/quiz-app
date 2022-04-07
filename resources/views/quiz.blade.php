<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('quiz.result',$quiz->slug) }}">
                @csrf
                @foreach ($quiz->getQuestions as $question)

                <strong> {{ $loop->iteration }}- </strong>{{$question->questions}}
                @if ($question->image)
                <img style="width: 400px;"   src="{{asset($question->image)}}" class="img-responsive mt-1" alt="">
                @endif

                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}1"
                        value="answer1" required>
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                        {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}2"
                        value="answer2" required>
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                        {{$question->answer2}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}3"
                        value="answer3" required>
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                        {{$question->answer3}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}4"
                        value="answer4" required>
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                        {{$question->answer4}}
                    </label>
                </div>
                <hr style="color: rgb(204, 196, 196)">
                @endforeach
                <div style="background-color: #9772aa" class="btn d-grid gap-2 btn-sm text-white mt-4">
                    <button>Quizi bitir!</button>
                </div>
            </form>
        </div>
    </div>




</x-app-layout>