<x-app-layout>
    <x-slot name="header">{{$quiz->title}} <span style="color: #9772aa">Quiz Sonucu</span> </x-slot>

    <div class="card">
        <div class="card-body">

            <div class="alert alert-secondary">
                <small style="font-size: 15px; color: black"> <b> Puanınız: {{ $quiz->my_result->point }}</b></small>
                <span class="badge bg-light rounded-pill text-dark float-end">{{$quiz->my_result->correct }} doğru</span> 
                <span class="badge bg-light rounded-pill text-dark float-end">{{$quiz->my_result->wrong }} yanlış</span>
                <hr>
                {{-- <h4>PUAN : <strong>{{ $quiz->my_result->point }}</strong> --}}
                </h4>
                
                <i class="fa-solid fa-circle-check text-success"></i> : doğru cevap <br>
                <i class="fa-solid fa-circle-xmark text-danger"></i> : yanlış cevap
            </div>

            @foreach ($quiz->getQuestions as $question)


            @if ($question->correct_answer == $question->my_answer->answer)
            <i class="fa-solid fa-check text-success"></i>
            @else
            <i class="fa-solid fa-xmark text-danger"></i>
            @endif
            <strong> {{ $loop->iteration }}- </strong>
            {{$question->questions}}
            @if ($question->image)
            <img style="width: 400px; height: 200px;" src="{{asset($question->image)}}" class="mt-1" alt="">
            @endif
            <br>
            <small style="font-size: 12px; color: black; background-color: rgb(235, 235, 137);">Bu soruya
                <b>%{{$question->true_percent}}</b> oranında doğru cevap verildi.</small>


            <div class="form-check mt-2">
                @if ('answer1' == $question->correct_answer)
                <i class="fa-solid fa-circle-check text-success"></i>
                @elseif ('answer1' == $question->my_answer->answer)
                <i class="fa-solid fa-circle-xmark text-danger"></i>
                @endif
                <label class="form-check-label" for="quiz{{$question->id}}1">
                    {{$question->answer1}}
                </label>
            </div>
            <div class="form-check">
                @if ('answer2' == $question->correct_answer)
                <i class="fa-solid fa-circle-check text-success"></i>
                @elseif ('answer2' == $question->my_answer->answer)
                <i class="fa-solid fa-circle-xmark text-danger"></i>
                @endif
                <label class="form-check-label" for="quiz{{$question->id}}2">
                    {{$question->answer2}}
                </label>
            </div>
            <div class="form-check">
                @if ('answer3' == $question->correct_answer)
                <i class="fa-solid fa-circle-check text-success"></i>
                @elseif ('answer3' == $question->my_answer->answer)
                <i class="fa-solid fa-circle-xmark text-danger"></i>
                @endif
                <label class="form-check-label" for="quiz{{$question->id}}3">
                    {{$question->answer3}}
                </label>
            </div>
            <div class="form-check">
                @if ('answer4' == $question->correct_answer)
                <i class="fa-solid fa-circle-check text-success"></i>
                @elseif ('answer4' == $question->my_answer->answer)
                <i class="fa-solid fa-circle-xmark text-danger"></i>
                @endif
                <label class="form-check-label" for="quiz{{$question->id}}4">
                    {{$question->answer4}}
                </label>
            </div>
            <hr style="color: rgb(204, 196, 196)">
            @endforeach
            <a href="{{route('quiz.detail',$quiz->slug)}}" style="background-color:  #9772aa"
                class="btn d-grid gap-2 btn-sm text-white"><i class="fa-solid fa-rotate-left"></i></a>
        </div>
    </div>




</x-app-layout>