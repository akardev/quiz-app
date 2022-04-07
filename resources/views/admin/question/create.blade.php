<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} için yeni soru oluştur</x-slot>
    <div align="center">
        <div  style="background-color: #36074e; max-width: 80%;" align="left" class="card text-white">
            <div class="card-body">

                <form method="post" action="{{ route('questions.store',$quiz->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Soru</label>
                        <textarea name="questions" class="form-control" rows="4">{{ old('questions') }}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Resim</label>
                        <input type="file" name="image"  class="form-control">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>1. cevap</label>
                                <textarea name="answer1" class="form-control" rows="2">{{ old('answer1') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>2. cevap</label>
                                <textarea name="answer2" class="form-control" rows="2">{{ old('answer2') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>3. cevap</label>
                                <textarea name="answer3" class="form-control" rows="2">{{ old('answer3') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>4. cevap</label>
                                <textarea name="answer4" class="form-control" rows="2">{{ old('answer4') }}</textarea>
                            </div>
                        </div>
                    </div><br>
                    <div>
                        <label style="color: rgb(21, 160, 21)" >Doğru Cevap</label>
                        <select name="correct_answer" class="form-control">
                            <option value="">Doğru cevabı seç!</option>
                            <option @if(old('correct_answer')==='answer1') selected @endif value="answer1">1. cevap</option>
                            <option @if(old('correct_answer')==='answer2') selected @endif value="answer2">2. cevap</option>
                            <option @if(old('correct_answer')==='answer3') selected @endif value="answer3">3. cevap</option>
                            <option @if(old('correct_answer')==='answer4') selected @endif value="answer4">4. cevap</option>
                        </select>
                    </div>
                     
                    <br>
                    <div class="d-grid gap-2 form-group">
                        <button style="background-color: #9772aa" type="submit" class="btn text-white btn-sm">Soru oluştur!</button>
                    </div><br>
                </form>
                <div class="d-grid gap-2">
                <button style="background-color: #9772aa" class="btn text-white btn-sm" onclick="window.location.href='{{route('questions.index',$quiz->id)}}'">Geri Dön</button>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>