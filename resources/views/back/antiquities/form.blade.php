@extends('back.layout.main')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات اثر باستانی</h4>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="la la-book-dead mr-2"></i> اطلاعات اصلی</a>
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
                                                          action="{{route('dashboard.antiquities.addSave' , isset($antiquitie)? $antiquitie->id :-1)}}"
                                                          enctype="multipart/form-data" method="post">
                                                        <div class="row ">

                                                            @include('error')
                                                            {{csrf_field()}}
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="name">نام
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="name" name="name"
                                                                               value="{{(isset($antiquitie)?$antiquitie->name : (old('name') ? old('name') : ''))}}"
                                                                               placeholder=" نام ">
                                                                    </div>
                                                                </div>

                                                            </div>
  <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="type_id">نوع
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <select name="type_id" id="single-select"
                                                                                class="col-12">
                                                                            @if(isset($types) && count($types)>0)
                                                                                @foreach($types as $type)
                                                                                    <option
                                                                                        {{((isset($antiquitie) && $antiquitie->type_id==$type->id )?'selected' : '')}} value="{{$type->id}}">
                                                                                        {{$type->name}}
                                                                                    </option>

                                                                                @endforeach
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="nationalRegistrationNumber">شماره ثبت ملی
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="nationalRegistrationNumber" name="nationalRegistrationNumber"
                                                                               value="{{(isset($antiquitie)?$antiquitie->nationalRegistrationNumber : (old('nationalRegistrationNumber') ? old('nationalRegistrationNumber') : ''))}}"
                                                                               placeholder="شماره ثبت ملی">
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="nationalRegistrationDate">تاریخ ثبت ملی
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="nationalRegistrationDate" name="nationalRegistrationDate"
                                                                               value="{{(isset($antiquitie)?$antiquitie->nationalRegistrationDate : (old('nationalRegistrationDate') ? old('nationalRegistrationDate') : ''))}}"
                                                                               placeholder="تاریخ ثبت ملی">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="address">نشانی
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <input type="text" class="form-control"
                                                                               id="address" name="address"
                                                                               value="{{(isset($antiquitie)?$antiquitie->address : (old('address') ? old('address') : ''))}}"
                                                                               placeholder="نشانی">
                                                                    </div>
                                                                </div>

                                                            </div>




                                                            <div class="col-xl-6">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label text-center"
                                                                           for="password">عکس
                                                                     </label>
                                                                    <div class="col-lg-6">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                   name="image">
                                                                            <label class="custom-file-label">انتخاب
                                                                                فایل</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12">
                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label"
                                                                           for="text"> توضیخات
                                                                    </label>
                                                                    <div class="col-lg-6">
                                                                        <textarea class="form-control" id="text"
                                                                                  name="text" rows="5">

                                                                {{(isset($antiquitie))?$antiquitie->text: (old('text') ? old('text'): '') }}

                                                                        </textarea>
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

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-2 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">عکس </h4>
                </div>
                <div class="card-body text-center">
                    @if(isset($antiquitie))
                        <img class="img-fluid rounded-circle"
                             src="{{asset('storage/images/antiquities/'.$antiquitie->image)}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('images/profile/profile.png')}}">
                    @endif

                </div>
            </div>
        </div>


    </div>

@endsection
