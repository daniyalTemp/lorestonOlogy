@extends('back.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست مستندات </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="example3" class="display" style="min-width: 845px;">
                            <thead>
                            <tr>
                                <th></th>
                                <th>نام</th>
                                <th>نام خانودگی</th>
                                <th>تلفن</th>
                                <th>ایمیل</th>
                                <th>محل سکونت</th>
                                <th>تاریخ تولد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($documents))
                                @foreach($documents as $document)
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                 src="{{asset('storage/images/profile/'.$document->image)}}" alt=""></td>
                                        <td>{{$document->firstName}}</td>
                                        <td>{{$document->lastName}}</td>
                                        <td><a href="javascript:void(0);"><strong>{{$document->phone}}</strong></a></td>
                                        <td><a href="javascript:void(0);"><strong>{{$document->email}}</strong></a></td>
                                        <td><a href="javascript:void(0);"><strong>{{$document->address}}</strong></a></td>
                                        <td><a href="javascript:void(0);"><strong>{{$document->birthday}}</strong></a></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.document.edit' , $document->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('dashboard.document.del' , $document->id)}}" class="btn btn-danger shadow btn-xs sharp"   data-toggle="modal" data-target="#delete{{$document->id}}" ><i
                                                        class="fa fa-trash"></i></a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$document->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف کاربر</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف
                                                                    {{$document->firstName.' '.$document->lastName}}

                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">بستن</button>
                                                                <a href="{{route('dashboard.document.del' , $document->id)}}" class="btn btn-danger">حذف</a>
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
                            <a type="button" href="{{route('dashboard.document.add')}}" class="btn btn-rounded btn-block btn-primary"><span
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
