@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات نوع مخاطب</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="la la-user mr-2"></i> اطلاعات اصلی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact"><i
                                        class="la la-clipboard-list mr-2"></i> افراد این نوع </a>
                            </li>

                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="profile">
                                <div class="pt-4">
                                    <div class="col-lg-12">
                                        <div class="card">

                                            <div class="card-body">
                                                <div class="form-validation">
                                                    <form class="form-valide"
                                                          action="{{route('dashboard.contact.addSaveTypes' , isset($type)? $type->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="firstname">نام
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="name" name="name"
                                                                               value="{{(isset($type)?$type->name : (old('name') ? old('name') : ''))}}"
                                                                               placeholder="نام  ">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn  btn-block btn-success">ثبت
                                                        </button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                @if(isset($type))
                                    <div class="pt-4">
                                        <h4>افراد </h4>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll"
                                                             style="height:370px;">
                                                            @if(isset($type) && count($type->contacts()->get())>0)
                                                                @foreach($type->contacts()->get() as $contact)
                                                                    <ul class="timeline">
                                                                        <li>
                                                                            <div class="timeline-badge primary col-6"></div>
                                                                            <a class="timeline-panel text-muted"
                                                                               href="{{route('dashboard.contact.showProfile' , $contact->id)}}">
                                                                                <div
                                                                                    class="card text-white bg-dark-alt">
                                                                                    <ul class="list-group list-group-flush">
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                        <span
                                                                                            class="mb-0">نام:</span><strong>{{$contact->name}}</strong>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex justify-content-between">
                                                                                        <span
                                                                                            class="mb-0">تلفن :</span><strong> {{$contact->phone}} </strong>
                                                                                        </li>

                                                                                </div>
                                                                            </a>
                                                                        </li>

                                                                    </ul>

                                                                @endforeach
                                                            @endif


                                                        </div>
                                                        <br>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @else

                                    <div class="pt-4">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card">
                                                    <div class="card-header border-0 pb-0">
                                                        <h4 class="card-title"></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div
                                                            class="alert  solid alert-dismissible fade show col-xl-12 text-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1"
                                                                 class="svg-main-icon">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 Z M19.0710678,4.92893219 L19.0710678,4.92893219 C19.4615921,5.31945648 19.4615921,5.95262146 19.0710678,6.34314575 L6.34314575,19.0710678 C5.95262146,19.4615921 5.31945648,19.4615921 4.92893219,19.0710678 L4.92893219,19.0710678 C4.5384079,18.6805435 4.5384079,18.0473785 4.92893219,17.6568542 L17.6568542,4.92893219 C18.0473785,4.5384079 18.6805435,4.5384079 19.0710678,4.92893219 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"/>
                                                                </g>
                                                            </svg>

                                                            ابتدا کاربر را ایجاد کنید

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
