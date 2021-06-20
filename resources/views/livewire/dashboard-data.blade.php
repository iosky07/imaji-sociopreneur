<div>
    <div class="row">
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>RAB menunggu</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($data['rabs'] as $rab)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50"
                                     src="{{ asset('storage/'.($rab->user->profile_photo_path!=null?$rab->user->profile_photo_path:'profile-photos/avatar.png')) }}"
                                     alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{$rab->created_at->diffForHumans()}}</div>
                                    <div class="media-title">{{$rab->user->name}}</div>
                                    <a href="{{route('admin.rab.edit',$rab->id)}}"
                                       class="text-small text-muted">{{$rab->title}}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="{{route('admin.rab.index')}}" class="btn btn-primary btn-round">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>SPJ menunggu</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($data['spjs'] as $spj)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50"
                                     src="{{ asset('storage/'.($spj->user->profile_photo_path!=null?$spj->user->profile_photo_path:'profile-photos/avatar.png')) }}"
                                     alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{$spj->created_at->diffForHumans()}}</div>
                                    <div class="media-title">{{$spj->user->name}}</div>
                                    <a href="{{route('admin.spj.edit',$spj->id)}}"
                                       class="text-small text-muted">{{$spj->title}}</a>
                                    {{--                            <a role="button" href="spj/edit/{{ $spj->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>--}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="{{route('admin.spj.index')}}" class="btn btn-primary btn-round">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Report masuk</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($data['reports'] as $report)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50"
                                     src="{{ asset('storage/'.($report->user->profile_photo_path!=null?$report->user->profile_photo_path:'profile-photos/avatar.png')) }}"
                                     alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{$report->created_at->diffForHumans()}}</div>
                                    <div class="media-title">{{$report->user->name}}</div>
                                    <a href="{{route('admin.report.edit',$report->id)}}"
                                       class="text-small text-muted">{{$report->title}}</a>
                                    {{--                            <a role="button" href="report/edit/{{ $report->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>--}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="{{route('admin.report.index')}}" class="btn btn-primary btn-round">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Activities Blog</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($data['blogs'] as $blog)

                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50"
                                     src="{{ asset('storage/'.($blog->user->profile_photo_path!=null?$blog->user->profile_photo_path:'profile-photos/avatar.png')) }}"
                                     alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{$blog->created_at->diffForHumans()}}</div>
                                    {{--                                    {{dd($blog->user)}}--}}
                                    <div class="media-title">{{$blog->user->name}}</div>
                                    <a href="{{route('admin.content.edit',$blog->id)}}"
                                       class="text-small text-muted">{{$blog->title}}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="{{route('admin.content.index')}}" class="btn btn-primary btn-round">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
