<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1>Full Form</h1>
        {{-- Global Errors --}}
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
        <form action="{{ Route('form3_data') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" placeholder="Name" name="name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror" autocomplete="no"
                    value="{{ old('email') }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Date Of Birth</label>
                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                    value="{{ old('dob') }}">
                @error('dob')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>

                <input @checked(old('gender') == 'Male') type="radio" name="gender" id="male" value="Male">
                <label for="male">Male</label>

                <br>

                <input {{ old('gender') == 'Female' ? 'checked' : '' }} type="radio" name="gender" id="female"
                    value="Female">
                <label for="female">Female</label>
                {{-- <label><input type="radio" name="gender" id="female">Female</label> --}}
                <br>
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Education Level</label>
                <select class="form-select  @error('education_level') is-invalid @enderror" name="education_level">
                    <option value="School" @selected(old('education_level') == 'School')>School</option>
                    <option value="Deploma" @selected(old('education_level') == 'Deploma')>Deploma</option>
                    <option value="Bachelor" @selected(old('education_level') == 'Bachelor')>Bachelor</option>
                    <option value="Master" @selected(old('education_level') == 'Master')>Master</option>
                    <option value="PhD" @selected(old('education_level') == 'PhD')>PhD</option>
                </select>
                <br>
                @error('education_level')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="mb-3">
                <label>Hobbies</label>
                <br>
                <label><input class="nv-check-box" @checked(in_array('ReadingBooks', old('hobbies') ?? [])) type="checkbox" name="hobbies[]"
                        value="ReadingBooks">Reading Books</label>
                <br>
                <label><input class="nv-check-box" @checked(in_array('PlayingCricket', old('hobbies') ?? [])) type="checkbox" name="hobbies[]"
                        value="PlayingCricket">Playing Cricket</label>
                <br>
                <label><input class="nv-check-box" @checked(in_array('WatchingMovies', old('hobbies') ?? [])) type="checkbox" name="hobbies[]"
                        value="WatchingMovies">Watching Movies</label>
                <br>
                <label><input class="nv-check-box" @checked(in_array('ListeningMusic', old('hobbies') ?? [])) type="checkbox" name="hobbies[]"
                        value="ListeningMusic">Listening Music</label>
                <br>
                @error('hobbies')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" rows="4" placeholder="Bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                @error('bio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-4">Send</button>


    </div>

    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
