@extends('template.template')
@section('content')
    <div class="container">

        <div class="card" style="background-color: rgb(241, 239, 236)">
            <div class="card-body">
                <p> Profil Saya <br>
                    <small>kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</small>
                    {{-- <table class="m-4">
                <tr>
                    <td>Usename</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="username"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="name"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="email"></td>
                </tr>
                <tr>
                    <td>Nomor Telpon</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="Nomor Telpon"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>

                        <td><input type='radio' name='jenis_kelamin' value='pria' value='perempuan'>Perempuan</p></td>
                        <td><input type='radio' name='jenis_kelamin' value='pria' value='perempuan'>Perempuan</p></td>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="username"></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </td>
                </tr>
            </table> --}}
                    {{-- <section style="background-color: #eee;">
  <div class="container py-5"> --}}

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <div align="center">

                                    <main>
                                        <input type="file" name="image" id="image" accept="image/*" />
                                        <div id="preview">
                                            <div id="avatar"></div>
                                            <button id="upload-button" aria-labelledby="image"
                                                aria-describedby="image">+</button>
                                        </div>
                                    </main>
                                </div>
                                <style>
                                    #avatar {
                                        background-color: rgb(241, 239, 236);
                                        height: 200px;
                                        width: 200px;
                                        border: 3px solid rgb(56, 52, 47);
                                        border-radius: 50%;
                                        transition: background ease-out 200ms;
                                    }

                                    #preview {
                                        position: relative;
                                    }

                                    input[type="file"] {
                                        display: none;
                                    }

                                    button {
                                        padding: 25px;
                                        border-radius: 50%;
                                        border: none;
                                        cursor: pointer;
                                        background-color: rgb(241, 239, 236);
                                        box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2),
                                            0px 6px 10px 0px rgba(0, 0, 0, 0.14), 0px 1px 18px 0px rgba(0, 0, 0, 0.12);
                                        transition: background-color ease-out 120ms;
                                        position: absolute;
                                        right: -5%;
                                        bottom: 0%;
                                    }

                                    button:hover {
                                        background-color: #45a;
                                    }
                                </style>
                                <script>
                                    const UPLOAD_BUTTON = document.getElementById("upload-button");
                                    const FILE_INPUT = document.querySelector("input[type=file]");
                                    const AVATAR = document.getElementById("avatar");

                                    UPLOAD_BUTTON.addEventListener("click", () => FILE_INPUT.click());

                                    FILE_INPUT.addEventListener("change", event => {
                                        const file = event.target.files[0];

                                        const reader = new FileReader();
                                        reader.readAsDataURL(file);

                                        reader.onloadend = () => {
                                            AVATAR.setAttribute("aria-label", file.name);
                                            AVATAR.style.background = `url(${reader.result}) center center/cover`;
                                        };
                                    });
                                </script>
                                {{-- <input type="file" name="image"> --}}
                                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"> --}}
                                {{-- <img class="rounded-circle shadow-4-strong" alt="avatar2" src="https://mdbcdn.b-cdn.net/img/new/avatars/1.webp" /> --}}

                                {{-- <h5 class="my-3">{{ Auth::user()->name }}</h5> --}}
                                <p class="text-muted mb-1">Full Stack Developer</p><br><br>
                                <div style="line-left">
                                    <p class="text-muted mb-2 "><a href="{{ url('/profile') }}">Akun Saya</a></p>
                                    <p class="text-muted mb-2 "><a href="{{ url('/purchase') }}">Pesanan Saya</a></p>
                                    <p class="text-muted mb-2 "><a href="{{ url('/Voucher') }}">Voucher Saya</a></p>
                                    <p class="text-muted mb-2 "><a href="{{ url('/notifications/order') }}">Notifikasi</a>
                                    </p>
                                </div>
                                {{-- <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div> --}}
                            </div>
                        </div>
                        {{-- <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div> --}}
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mr-6">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Jenis Kelamin</p>
                                    </div>
                                    <div class="col">
                                        <p><input type="radio" name="jenis_kelamin" id="" value="laki_laki">
                                            Laki-Laki</p>
                                    </div>
                                    <div class="col">
                                        <p><input type="radio" name="jenis_kelamin" id="" value="perempuan">
                                            Perempuan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span>
                                            Project Status
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 89%"
                                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                        <div class="progress rounded" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 55%"
                                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                        <div class="progress rounded mb-2" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div>
</section> --}}
                </p>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br>
    <hr>
@endsection
