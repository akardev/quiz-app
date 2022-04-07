<x-app-layout>
    <x-slot  name="header">{{$quiz->title}}</x-slot>

    <div class="card text-white" style="background-color: #9772aa;" >
        <div  class="card-body">
            <button class="btn btn-secondary  btn-sm" onclick="window.location.href='{{route('quizzes.index')}}'"><i
                class="fa fa-arrow-left"></i> Quizlere
            Dön</button>
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

                        @if ($quiz->details)
                        <li style="border-color: #270836; color: #270836;" class="list-group-item"><i
                                style="color: #270836" class="fa-solid fa-plus"></i> Ortalama Puan
                            <span style="background-color: #ffffff; color: #8B008B"
                                class="badge float-end rounded-pill">{{$quiz->details['average']}}</span>
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
                                    <span @if(auth()->user()->id==$result->user_id) style="color: #8B008B"
                                        @endif>{{$result->user->name}}</span>
                                    <span style="background-color: #8B008B"
                                        class="badge  rounded-pill float-end">{{$result->point}}</span>
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="col-md-8">
                    {{$quiz->description}}

                    <table class="table table-bordered text-white mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)

                        <tr>
                             <td>{{ $result->user->name }}</td>
                             <td align="center" style="width: 3%"><span class="btn btn-primary btn-sm rounded-pill"> {{ $result->point }} </span></td>
                             <td align="center" style="width: 3%"><span class="btn btn-success btn-sm rounded-pill"> {{ $result->correct }} </span></td>
                             <td align="center" style="width: 3%"><span class="btn btn-danger btn-sm rounded-pill"> {{ $result->wrong }} </span></td>
                        </tr>

                            @endforeach

                        </tbody>
                    </table>


                    </p>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>