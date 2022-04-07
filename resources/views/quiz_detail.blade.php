<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card" style="border-color: transparent;">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group list-group-flush">

                        @if ($quiz->finished_at)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item "><i
                                style="color: #270836" class="fas fa-calendar-alt"></i>
                            Son Katılım Tarihi
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge  rounded-pill float-end"
                                title="{{$quiz->finished_at}}">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif

                        @if ($quiz->details)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fas fa-user"></i> Katılımcı
                            Sayısı
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge  rounded-pill float-end">{{$quiz->details['join_count']}}</span>
                        </li>
                        @endif
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fas fa-question"></i> Soru
                            Sayısı
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge float-end rounded-pill">{{
                                $quiz->get_questions_count }}</span>
                        </li>
                        @if ($quiz->my_result)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fas fa-brain"></i>
                            Puanınız
                            <div class="float-end">
                                <span style="background-color: #ffffff; color: #8B008B"" class=" badge rounded-pill">{{
                                    $quiz->my_result->correct }} Doğru</span>
                                <span style="background-color: #ffffff; color: #8B008B" class="badge   rounded-pill">{{
                                    $quiz->my_result->wrong }} Yanlış</span>
                                <span style="background-color: #ffffff; color: #8B008B" class="badge  rounded-pill">{{
                                    $quiz->my_result->point }}</span>
                            </div>
                        </li>
                        @endif
                        @if ($quiz->details)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fa-solid fa-plus"></i> Ortalama Puan
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge float-end rounded-pill">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                        @if ($quiz->my_rank)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fa-solid fa-ranking-star"></i> Sıralamanız
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge float-end rounded-pill">#{{
                                $quiz->my_rank }}</span>
                        </li>
                        @endif
                    </ul>

                    @if (count($quiz->topTen)>0)
                    <div style="border-color: transparent" class="card mt-5">
                        <div class="card-body">
                            <h4 align="center" class="card-title">İlk 10</h4>
                            <ul class="list-group list-group-flush">

                                @foreach ($quiz->topTen as $result)

                                <li style="border-color: #270836"
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>{{$loop->iteration}}.</strong>
                                    <img class="w-8 h-8 rounded-full " src="{{$result->user->profile_photo_url}}"
                                        alt="">
                                    <span @if(auth()->user()->id==$result->user_id) style="color: #270836; font-weight:
                                        bold;"
                                        @endif>{{$result->user->name}}</span>
                                    <span style="background-color: #f1d9ed"
                                        class="badge text-dark rounded-pill float-end">{{$result->point}}</span>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="col-md-8">
                    <i>
                        <p style="color: #270836">{{$quiz->description}}</p>
                    </i></p>
                    @if ($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" style="background-color:  #9772aa"
                        class="btn d-grid gap-2 btn-sm text-white">Quiz'i Görüntüle</a>
                    @elseif (!$quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" style="background-color:  #9772aa"
                        class="btn d-grid gap-2 btn-sm text-white">Quiz'e Katıl!</a>
                    @endif
                    <br>
                    <div align="center">
                        <img class="mt-4 img-responsive" src="{{asset('quizlogo.png')}}" alt="">
                    </div>
                </div>
            </div>
</x-app-layout>