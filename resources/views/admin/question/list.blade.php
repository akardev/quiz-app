<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} <i style="color: darkblue">~ quiz soruları ~</i> </x-slot>
    <div class="card"  style="background-color: #36074e;">
        <div class="card-body">
            <h4 class="card-title">
                <a style="background-color: #9772aa" href="{{ route('questions.create',$quiz->id) }}" class="btn  btn-sm text-white float-end"><i
                        class="fas fa-plus"></i> Soru oluştur!</a>

                <button class="btn btn-secondary  btn-sm" onclick="window.location.href='{{route('quizzes.index')}}'"><i
                        class="fa fa-arrow-left"></i> Quizlere
                    Dön</button>

            </h4>

            <div class="table-responsive">
                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th scope="col">Soru</th>
                            <th scope="col">Resim</th>
                            <th scope="col">1. Cevap</th>
                            <th scope="col">2. Cevap</th>
                            <th scope="col">3. Cevap</th>
                            <th scope="col">4. Cevap</th>
                            <th scope="col">Doğru Cevap</th>
                            <th scope="col">Düzenle</th>
                            <th scope="col">Sil</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($quiz->getQuestions as $question)
                        <tr>
                            <td>{{ $question->questions }}</td>
                            <td>
                                @if ($question->image)
                                <a target="_blank" href="{{asset($question->image)}}">
                                    <img class="img-fluid" style="width: 50px" src="{{asset( $question->image ) }}"
                                        alt="">
                                </a>
                                @endif
                            </td>
                            <td>{{ $question->answer1 }}</td>
                            <td>{{ $question->answer2 }}</td>
                            <td>{{ $question->answer3 }}</td>
                            <td>{{ $question->answer4 }}</td>
                            <td>{{ Illuminate\Support\Str::substr($question->correct_answer,-1)}}.
                                cevap</td>


                            <td align="center" style="width: 3%">
                                <a style="background-color: #9772aa" href="{{route('questions.edit',[$quiz->id,$question->id])}}"
                                    class="btn text-white btn-sm" title="Düzenle"><i class="fa fa-pencil"></i></a>
                            </td>



                            <td align="center" style="width: 3%">

                                <form method="POST" action="{{route('questions.destroy',[$quiz->id,$question->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button style="background-color: #9772aa" title="sil" type="submit" class="btn text-white btn-sm"><i
                                            class="fa fa-times"></i> </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            {{-- {{ $question->links() }} --}}
        </div>
    </div>

</x-app-layout>