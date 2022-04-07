<x-app-layout>
    <x-slot name="header">Quizi Güncelle</x-slot>
    <div class="row">
            <div class="col-md-6">
                <div style="background-color: #36074e;" class="card text-white">
                    <div class="card-body">

                        <form method="post" action="{{ route('quizzes.update',$quiz->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label>Quiz Başlığı</label>
                                <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Quiz Açıklaması</label>
                                <textarea name="description" class="form-control"
                                    rows="4">{{ $quiz->description }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Quiz Durumu <span class="badge alert-danger">Not: Quiz durumunu aktif edebilmek
                                        için minimum 4 soru olmalıdır.</span></label>
                                <select name="status" class="form-control">
                                    <option @if($quiz->get_questions_count<4) disabled @endif @if( $quiz->
                                            status==='publish') selected @endif value="publish">Aktif</option>
                                    <option @if( $quiz->status==='passive') selected @endif value="passive">Pasif
                                    </option>
                                    <option @if( $quiz->status==='draft') selected @endif value="draft">Taslak</option>

                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Bitiş tarihi olacak mı?</label>
                                <input id="isFinished" @if ($quiz->finished_at) checked @endif type="checkbox">
                            </div>
                            <br>
                            <div id="finishedInput" @if(!$quiz->finished_at) style="display:none" @endif
                                class="form-group">
                                <label>Bitiş Tarihi:</label>
                                <input id="deletedate" type="datetime-local" name="finished_at" @if($quiz->finished_at)
                                value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif
                                class="form-control">
                            </div>
                            <br>
                            <div class="d-grid gap-2 form-group">
                                <button style="background-color: #9772aa" type="submit"
                                    class="btn text-white btn-sm text-white">Güncelle</button>
                            </div><br>
                        </form>
                        <div class="d-grid gap-2">
                            <button style="background-color: #9772aa" class="btn text-white btn-sm"
                                onclick="window.location.href='{{route('quizzes.index')}}'">Geri Dön</button>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-6">
            <img class="mt-4 img-responsive" src="{{asset('quizlogo.png')}}" alt="">
        </div>
    </div>


    <x-slot name="js">
        <script>
            $('#isFinished').change(function(){
                if($('#isFinished').is(':checked')){
                    $('#finishedInput').show()
                } else {
                    $('#finishedInput').hide()
                    $('#deletedate').val(null)
                }
            })
        </script>
    </x-slot>

</x-app-layout>