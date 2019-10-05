@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем статью</h3>
                        @include('admin.error')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                       value="{{$post->title}}" name="title">
                            </div>
                            <div class="form-group">
                                <img src="{{$post->getImage()}}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" id="exampleInputFile" name="image">

                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    @foreach($categories as $key => $category)
                                        <option value="{{$key}}"
                                                @if($key == $post->getCategoryID())selected="selected"@endif>{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="form-control select2" multiple="multiple"
                                        data-placeholder="Выберите теги"
                                        style="width: 100%;" name="tags[]">
                                    @foreach($tags as $key => $tag)
                                        @foreach($selectedTags as $sel)
                                            <option value="{{$key}}"
                                                    @if($key == $sel)selected="selected"@endif>{{$tag}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <!-- Date -->
                            <div class="form-group">
                                <label>Дата:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker"
                                           value="{{$post->date}}" name="date">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" @if($post->is_featured == 1) checked
                                           @endif name="is_featured">
                                </label>
                                <label>
                                    Рекомендовать
                                </label>
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" @if($post->status == 1) checked
                                           @endif name="status">
                                </label>
                                <label>
                                    Черновик
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="" cols="30" rows="10"
                                          class="form-control">{{$post->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полный текст</label>
                                <textarea name="content" id="" cols="30" rows="10"
                                          class="form-control">{{$post->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('posts.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>
                    <!-- /.box-footer-->
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection