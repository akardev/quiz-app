<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>
<div class="row">
    <div class="col-md-6">
        <div align="center">
            <div style="background-color: #36074e" align="left" class="card text-white" style="max-width: 80%;">
                <div class="card-body">
    
                   
    
    
    
                    <form method="post" action="{{ route('quizzes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Quiz Başlığı</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Quiz Açıklaması</label>
                            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Bitiş tarihi olacak mı?</label>
                            <input id="isFinished" @if (old('finished_at')) checked @endif type="checkbox">
                        </div>
                        <br>
                        <div id="finishedInput" @if(!old('finished_at')) style="display:none" @endif class="form-group">
                            <label>Bitiş Tarihi:</label>
                            <input id="deletedate" type="datetime-local" name="finished_at" value="{{ old('finished_at') }}"
                                class="form-control">
                        </div>
                        <br>
                        <div class="d-grid gap-2 form-group">
                            <button style="background-color: #9772aa" type="submit" class="btn btn-sm text-white">Oluştur!</button>
                        </div><br>
                    </form>
                    <div class="d-grid gap-2">
                    <button style="background-color: #9772aa" class="btn text-white btn-sm" onclick="window.location.href='{{route('quizzes.index')}}'">Geri Dön</button>
                </div>
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