<x-app-layout>
    <x-slot name="header">{{ $question->questions }} adlı soruyu güncelle</x-slot>
    <div align="center">
        <div  style="background-color: #36074e; max-width: 80%;" align="left" class="card text-white">
            <div class="card-body">

                <form method="post" action="{{ route('questions.update',[$question->quiz_id,$question->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Soru</label>
                        <textarea name="questions" class="form-control" rows="4">{{ $question->questions }}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Resim</label>
                        @if ($question->image)
                        <a href="{{asset($question->image)}}" target="_blank">
                            <img src="{{asset($question->image)}}" style="width: 200px" class="img-fluid"
                                alt="{{ $question->questions }}">
                        </a><br>
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>1. cevap</label>
                                <textarea name="answer1" class="form-control"
                                    rows="2">{{ $question->answer1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>2. cevap</label>
                                <textarea name="answer2" class="form-control"
                                    rows="2">{{ $question->answer2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>3. cevap</label>
                                <textarea name="answer3" class="form-control"
                                    rows="2">{{ $question->answer3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>4. cevap</label>
                                <textarea name="answer4" class="form-control"
                                    rows="2">{{ $question->answer4 }}</textarea>
                            </div>
                        </div>
                    </div><br>
                    <div>
                        <label style="color: rgb(21, 160, 21)">Doğru Cevap</label>
                        <select name="correct_answer" class="form-control">
                            <option value="">Doğru cevabı seç!</option>
                            <option @if( $question->correct_answer==='answer1') selected @endif value="answer1">1. cevap
                            </option>
                            <option @if( $question->correct_answer==='answer2') selected @endif value="answer2">2. cevap
                            </option>
                            <option @if( $question->correct_answer==='answer3') selected @endif value="answer3">3. cevap
                            </option>
                            <option @if( $question->correct_answer ==='answer4') selected @endif value="answer4">4.
                                cevap</option>
                        </select>
                    </div>

                    <br>
                    <div class="d-grid gap-2 form-group">
                        <button style="background-color: #9772aa" type="submit" class="btn s btn-sm text-white">Soruyu güncelle!</button>
                    </div><br>
                </form>
                <div class="d-grid gap-2">
                    <button style="background-color: #9772aa" class="btn text-white btn-sm"
                        onclick="window.location.href='{{route('questions.index',$question->quiz_id)}}'">Geri Dön</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>