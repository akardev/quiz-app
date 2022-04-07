<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div style="background-color: #36074e" class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a style="background-color: #9772aa" href="{{route('quizzes.create')}}" class="btn text-white float-end"><i
                        class="fas fa-plus"></i> Quiz oluştur!</a>
            </h4>
            <form method="GET" action="">
                <div  class="row">
                    <div  class="col-md-2">
                        <input style="height: 40px; background-color: #c2b3c9" value="{{ request()->get('title') }}" type="text" name="title" placeholder="Quiz Adı..." class="form-control">
                    </div>
                    <div class="col-md-2">
                       <select  style="height: 40px; background-color: #c2b3c9" name="status" class="form-control" onchange="this.form.submit()">
                           <option value=" ">Durum Seçiniz</option>
                           <option @if (request()->get('status')=='publish') selected @endif value="publish">Aktif</option>
                           <option @if (request()->get('status')=='passive') selected @endif value="passive">Pasif</option>
                           <option @if (request()->get('status')=='draft') selected @endif value="draft">Taslak</option>
                       </select>
                    </div>
                    @if(request()->get('title') || request()->get('status') )
                        <div class="col-md-2">
                            <a href="{{ route('quizzes.index') }}" class="btn btn-light">Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form><br>
            <div class="table-responsive">
                <table class="table table-bordered text-white ">
                    <thead>
                        <tr>
                            <th scope="col">Info</th>
                            <th scope="col">Quiz Adı</th>
                            <th scope="col">Soru Sayısı</th>
                            <th scope="col">Durum</th>
                            <th scope="col">Bitiş Tarihi</th>
                            <th scope="col">Düzenle</th>
                            <th scope="col">Sorular</th>
                            <th scope="col">Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizzes as $quiz )
                        <tr>
                            
                            <td align="center" style="width: 3%">
                                <a style="background-color: #9772aa" href="{{route('quizzes.details',$quiz->id)}}" class="btn btn-sm text-white"
                                    title="Info"><i class="fa fa-info"></i></a>
                            </td>

                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->get_questions_count }}</td>
                            <td>
                                @switch($quiz->status)
                                @case('publish')


                                @if (!$quiz->finished_at)
                                <span style="background-color: #9772aa" class="badge ">Aktif</span>
                                @elseif ($quiz->finished_at>now() )
                                <span style="background-color: #9772aa" class="badge ">Aktif</span>
                                @else
                                <span class="badge alert-secondary">Süresi Dolmuş</span>
                                @endif
                                
                                @break

                                @case('passive')
                                <span class="badge alert-danger">Pasif</span>
                                @break

                                @case('draft')
                                <span class="badge alert-warning">Taslak</span>
                                @break
                                @endswitch
                            </td>
                            <td>
                                <span title="{{$quiz->finished_at}}">
                                {{ $quiz->finished_at ?
                                    $quiz->finished_at->diffForHumans() : ' ' }}
                              </span>
                            </td>


                            <td align="center" style="width: 3%">
                                <a style="background-color: #9772aa" href="{{route('quizzes.edit',$quiz->id)}}" class="btn text-white btn-sm"
                                    title="Düzenle"><i class="fa fa-pencil"></i></a>
                            </td>

                            <td align="center" style="width: 3%">
                                <a style="background-color: #9772aa" href="{{route('questions.index',$quiz->id)}}" class="btn text-white btn-sm"
                                    title="Sorular"><i class="fa fa-question"></i></a>
                            </td>
                            
                            <td align="center" style="width: 3%">

                                <form method="POST" action="{{route('quizzes.destroy',$quiz->id)}}">
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
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>