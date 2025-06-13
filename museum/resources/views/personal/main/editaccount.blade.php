@extends('personal.layouts.main')

@section('content')
<div>
    @include('layouts.header')
</div>
<div class="app-wrapper" style="margin-top: 110px; margin-left: auto; align-items: center; ">
    <main class="app-main">

       <div class="row justify-content-center" >
            <div class="col-lg-8">
                <div class="card card-fluid">
                    <div class="card-body">
                        <form action="{{ route('personal.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="text-center mb-4">
                                <div class="avatar avatar-xl mb-3">
                                    <img id="avatar-preview" 
                                        src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('storage/images/default-avatar.png') }}" 
                                        class="rounded-circle" 
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <div class="custom-file w-auto">
                                    <input type="file" class="custom-file-input" id="user_image" name="user_image" accept="image/*" onchange="previewImage(this)">
                                    <label class="custom-file-label" for="user_image" id="file-label">Изменить фото</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Имя пользователя</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="profile_description">О себе</label>
                                <textarea class="form-control" id="profile_description" name="profile_description" rows="4" 
                                        placeholder="Расскажите немного о себе">{{ old('profile_description', Auth::user()->profile_description) }}</textarea>
                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">Смена пароля</h5>

                            <div class="form-group">
                                <label for="current_password">Текущий пароль</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                <small class="text-muted">Введите текущий пароль для подтверждения изменений</small>
                            </div>

                            <div class="form-group">
                                <label for="password">Новый пароль</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-muted">Оставьте пустым, если не хотите менять пароль</small>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Подтверждение нового пароля</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="form-actions d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>
<script>
function previewImage(input) {
    const preview = document.getElementById('avatar-preview');
    const fileLabel = document.getElementById('file-label');
    const file = input.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            fileLabel.textContent = file.name;
        }
        
        reader.readAsDataURL(file);
    } else {
        preview.src = "{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('storage/images/default-avatar.png') }}";
        fileLabel.textContent = 'Изменить фото';
    }
}

</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('profile_description');
    const charCount = document.getElementById('char-count');
    charCount.textContent = textarea.value.length;
    
    function countChars(el) {
        charCount.textContent = el.value.length;
    }
    
    textarea.addEventListener('input', function() {
        countChars(this);
    });
});
</script>
@endsection
