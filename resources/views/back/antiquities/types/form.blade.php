@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات نوع آثار باستانی</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="la la-book-dead mr-2"></i> اطلاعات اصلی</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#message"><i class="la la-user mr-2"></i>
                                    آثار مرتبط</a>
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
                                                          action="{{route('dashboard.antiquities.types.addSave' , isset($type)? $type->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="name">نام
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="name" name="name"
                                                                               value="{{(isset($type)?$type->name : (old('name') ? old('name') : ''))}}"
                                                                               placeholder=" نام ">
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
                            <div class="tab-pane fade" id="message">

                                <div class="pt-4 ">
                                    <h4>آثار مرتبط </h4>
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="card border-0 pb-0">
                                                <div class="card-header border-0 pb-0">
                                                </div>
                                                <div class="card-body">
                                                    <div id="DZ_W_Todo3" class="widget-media dz-scroll"
                                                         style="height:370px;">
                                                        <ul class="timeline">

                                                            @if(isset($type)&& count($type->Antiquities()->get())>0)
                                                                @foreach($type->Antiquities()->get() as $antiquities)
                                                                    <li>
                                                                        <div class="timeline-panel">

                                                                            <div class="media-body">
                                                                                <h5 class="mb-1">{{$antiquities->name   }}
                                                                                    -
                                                                                    <small
                                                                                        class="text-muted">{{$antiquities->nationalRegistrationNumber}}</small>
                                                                                </h5>

                                                                            </div>

                                                                        </div>
                                                                    </li>
                                                                @endforeach





                                                            @endif


                                                        </ul>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
