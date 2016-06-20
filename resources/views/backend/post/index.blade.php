@extends('backend.layout')

@section('title')
    <title>{{ config('blog.title') }} | Posts</title>
@stop

@section('content')
    <section id="main">
        @include('backend.partials.sidebar-navigation')
        <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <ol class="breadcrumb">
                            <li><a href="/admin">Home</a></li>
                            <li class="active">Posts</li>
                        </ol>
                        <ul class="actions">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh Posts</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        @include('shared.errors')
                        @include('shared.success')

                        <h2>Manage Posts&nbsp;
                            <a href="/admin/post/create" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Create a new post"><i class="zmdi zmdi-plus-circle"></i></a>
                            <small>This page provides a comprehensive overview of all current blog posts. Click the edit or preview links next to each post to modify specific details, publish a post or view any changes from the browser.</small>
                        </h2>
                    </div>

                    <div class="table-responsive">
                        <table id="data-table-posts" class="table table-condensed table-vmiddle">
                            <thead>
                                <tr>
                                    <th data-column-id="published" data-type="date" data-order="desc">Published</th>
                                    <th data-column-id="title">Title</th>
                                    <th data-column-id="subtitle">Subtitle</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) >= 1)
                                    @foreach ($data as $post)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at)->format('M d, Y') }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->subtitle }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No posts yet.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop

@section('unique-js')
    @if(Session::get('_login'))
        @include('backend.post.partials.login-notification')
        {{ \Session::forget('_login') }}
    @endif

    @if(Session::get('_new-post'))
        @include('backend.post.partials.new-post-notification')
        {{ \Session::forget('_new-post') }}
    @endif

    @if(Session::get('_delete-post'))
        @include('backend.post.partials.delete-post-notification')
        {{ \Session::forget('_delete-post') }}
    @endif

    @if(count($data) >= 1)
        @include('backend.post.partials.datatable')
    @endif
@stop