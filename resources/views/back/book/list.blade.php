@extends('back.layout.main')

@section('content')

    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست کتاب ها</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  id="example3" class="display" style="min-width: 845px;">
                            <thead>
                            <tr>
                                <th></th>
                                <th>عنوان</th>
                                <th>ناشر</th>
                                <th>محل نشر</th>
                                <th>سال</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($books))
                                @foreach($books as $book)
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                 src="{{asset('storage/images/books/'.$book->image)}}" alt=""></td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->publication}}</td>
                                        <td><a href="javascript:void(0);"><strong>{{$book->location}}</strong></a></td>
                                        <td><a href="javascript:void(0);"><strong>{{$book->year}}</strong></a></td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('dashboard.book.edit' , $book->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{route('dashboard.book.del' , $book->id)}}" class="btn btn-danger shadow btn-xs sharp"   data-toggle="modal" data-target="#delete{{$book->id}}" ><i
                                                        class="fa fa-trash"></i></a>


                                                <!-- Modal -->
                                                <div class="modal fade" id="delete{{$book->id}}">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">حذف کتاب</h5>
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    ایا از حذف
                                                                    {{$book->title.' از  '.$book->publication}}

                                                                    اطمینان دارید؟
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark light" data-dismiss="modal">بستن</button>
                                                                <a href="{{route('dashboard.contact.del' , $book->id)}}" class="btn btn-danger">حذف</a>
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
                            <a type="button" href="{{route('dashboard.book.add')}}" class="btn btn-rounded btn-block btn-primary"><span
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
