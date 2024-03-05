@extends('back.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست نوع مخاطبین</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px;">
                            <thead>
                            <tr>
                                <th></th>
                                <th> نام</th>
                                <th> تعداد افراد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($types))
                                @foreach($types as $type)
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                 src="{{asset('storage/images/contacts/'.$type->image)}}" alt=""></td>
                                        <td>{{$type->name}}</td>
                                        <td>{{count($type->contacts()->get())}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"
                                                   class="btn btn-dark shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-user-circle"></i></a>
                                                <a href="{{route('dashboard.contact.editTypes' , $type->id)}}"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('dashboard.contact.delTypes' , $type->id)}}"
                                                   class="btn btn-danger shadow btn-xs sharp" data-toggle="modal"
                                                   data-target="#delete{{$type->id}}"><i
                                                        class="fa fa-trash"></i></a>


                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">عنوان مودال</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="card-header pb-0 border-0">
                                                                            <h4 class="card-title">افراد دارای این
                                                                                نقش</h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="widget-media">
                                                                                <ul class="timeline">

                                                                                    @if(isset($type) && count($type->contacts()->get())>0)
                                                                                        @foreach($type->contacts()->get() as $contact)
                                                                                            <li>
                                                                                                <div
                                                                                                    class="timeline-panel">
                                                                                                    <div
                                                                                                        class="media mr-2">
                                                                                                        <img alt="image"
                                                                                                             width="50"
                                                                                                             src="{{isset($contact->image) ? asset('storage/images/contacts/'.$contact->image) : asset('storage/images/profile/profile.png')}}">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="media-body">
                                                                                                        <h5 class="mb-1">

                                                                                                            <a href="{{route('dashboard.contact.showProfile' , $contact->id)}}">
                                                                                                                {{$contact->Name}}
                                                                                                            </a>
                                                                                                        </h5>
                                                                                                        <small
                                                                                                            class="d-block">{{$contact->phone}}</small>
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
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                        data-dismiss="modal">بستن
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$type->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف نوع</h5>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف
                                                                    {{$type->name}}

                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light"
                                                                        data-dismiss="modal">بستن
                                                                </button>
                                                                <a href="{{route('dashboard.contact.delTypes' , $type->id)}}"
                                                                   class="btn btn-danger">حذف</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>

                        <div class="card-body col-4 pull-left">
                            <a type="button" href="{{route('dashboard.contact.addTypes')}}"
                               class="btn btn-rounded btn-block btn-primary"><span
                                    class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>افزودن
                            </a>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
