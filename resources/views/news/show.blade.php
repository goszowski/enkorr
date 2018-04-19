@extends('layouts.main')

@section('page')
<div class="container-fluid grey-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-8 xs-mt-20 ">
				<p class="comment-text_time text-uppercase small-text"><time>{{ $fields->pubdate->format('d.m.Y, H:i') }}</time></p>
				<h1 class="page-news_title">{{ $fields->name }}</h1>

				@if($fields->image)
					<div class="publication-img_wrapp">
						<img src="{{ asset('gallery/' . $fields->image) }}" alt="{{ $fields->name }}">
					</div>
				@endif

				<div class="publication-page_text">
					{!! $fields->content !!}
				</div>
				<a href="javascript:print()" class="publication-print xs-pb-25 xs-mt-40 sm-mt-70 text-right">
					<img src="{{ asset('/asset/img/printer.png') }}">
					<span class="text-uppercase xs-ml-5">{{ __('Печать') }}</span>
				</a>

				<div class="xs-mt-10">
					<div class="row">
						<div class="col-sm-6 sm-pt-10">
							<span class="tag-title">{{ __('Тэги') }}:</span>
							@if(count($fields->tags))
								<ul class="publication-page_tags">
									@foreach($fields->tags as $tag)
										<li><a href="{{ lPath($tag->node->absolute_path) }}">{{ $tag->name }}</a></li>
									@endforeach
								</ul>
							@endif
						</div>
						<div class="col-sm-6 text-sm-right">
							<div id="share"></div>
						</div>
					</div>
					<div class="row publication-page_nav xs-mt-40 xs-mb-40 sm-mt-80 sm-mb-80">
						<div class="col-xs-6 text-right border">
							<a href="{{ $prev ? lPath($prev->node->absolute_path) : '#' }}" class="publication-prev xs-pl-30 sm-pl-60 sm-pr-10 {{ ! $prev ? 'disabled' : null }}">{{ __('Предыдущая') }}</a>
						</div>
						<div class="col-xs-6 text-left border">
							<a href="{{ $next ? lPath($next->node->absolute_path) : '#' }}" class="publication-next xs-pr-30 sm-pr-60 sm-pl-10 {{ ! $next ? 'disabled' : null }}">{{ __('Следующая') }}</a>
						</div>
					</div>
				</div>

				@foreach($banners_under_text as $banner)
					<div class="baner-wrapp text-center xs-mt-10 xs-mb-20">
						<a href="{{ $banner->link }}" rel="nofollow" target="_blank">
							<img src="{{ iPath($banner->image, '600px') }}" alt="{{ $banner->name }}">
						</a>
					</div>
				@endforeach
				

				@if(count($materials))
					<div class="news-list_oneday xs-pb-5 xs-pt-30">
						<div class="block-title">
							<h2 class="block-title_text">{{ __('Материалы по теме') }}</h2>
						</div>
						@foreach($materials as $material)
							<a href="{{ lPath($material->node->absolute_path) }}" class="main-news_sidebar news-list-item xs-pb-10 xs-pt-25">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="main-news_sidebar__title news-list-title xs-mt-0">
											<b>{{ $material->name }}</b>
										</h3>
									</div>
								</div>
							</a>
						@endforeach
					</div>
				@endif


				<div class="comments-block xs-mt-40">
					<div class="block-title">
						<h2 class="block-title_text">{{ __('Коментарии') }}</h2>
					</div>

					@if(empty(Session::get('authUser')))
						<div class="xs-pt-15">
							<p>{{__('Авторизируйтесь, что бы оставить комментарий')}}</p>
							<a role="button" class="btn btn-warning" href="{{lPath('/auth/login')}}">{{ __('Авторизация') }}</a>
						</div>
					@else
						{!! Form::open(['url' => lPath('/comment/store'), 'method' => 'POST']) !!}
							<textarea class="form-control xs-mt-20" rows="3"></textarea>
							<button class="btn btn-warning xs-mt-15">{{ __('Коментировать') }}</button>
						{!! Form::close() !!}
					@endif
					
					<div class="comments xs-mt-20 xs-mb-50 sm-mb-70">

						@foreach($comments as $comment)
							<div class="comments-item xs-mt-15 xs-mb-10">
								@if($comment->has('user'))
									<p class="comment-author">{{ $comment->user->name }}</p>
								@endif
								
								<p class="comment-text"><span class="comment-text_time"><i class="fa fa-clock-o"></i><time class="xs-mr-10" datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('d.m.Y, H:i') }}</time></span>{{ $comment->content }}</p>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar-block xs-mt-20">
					<div class="block-title xs-mb-20 sm-mb-30">
						<h2 class="block-title_text">{{ __('Последние новости') }}</h2>
					</div>
					@foreach($last_news as $last_news_item)
						<a href="{{ lPath($last_news_item->node->absolute_path) }}" class="main-news_sidebar xs-pb-10 xs-mt-20">
							<div class="row">
								<div class="col-sm-1 col-md-2">
									<p class="comment-text_time text-uppercase small-text"><time>{{ $last_news_item->pubdate->format('H:i') }}</time></p>
								</div>
								<div class="col-sm-11 col-md-10">
									<h3 class="main-news_sidebar__title xs-mt-0">
										{{ $last_news_item->name }}
									</h3>
								</div>
							</div>
						</a>
					@endforeach
				</div>
				<div class="sidebar-block xs-mt-40">
					<div class="block-title xs-mb-20">
						<h2 class="block-title_text">{{ __('Главные новости') }}</h2>
					</div>
					@foreach($main_news as $k=>$main_news_item)
						<a href="{{ lPath($main_news_item->node->absolute_path) }}" class="main-news_sidebar xs-pb-10">

							@if(! $k and $main_news_item->image)
								<div class="sidebar_item__img">
									<img src="{{ asset('gallery/' . $main_news_item->image) }}" alt="{{ $main_news_item->name }}">
								</div>
							@endif
							
							<h3 class="main-news_sidebar__title ti-15">
								{{ $main_news_item->name }}
							</h3>
						</a>
					@endforeach
				</div>

				@foreach($banners_right_side as $banner)
					<div class="baner-wrapp text-center xs-mt-40 xs-mb-40">
						<a href="{{ $banner->link }}" rel="nofollow" target="_blank">
							<img src="{{ iPath($banner->image, '600px') }}" alt="{{ $banner->name }}">
						</a>
					</div>
				@endforeach
				
			</div>
		</div>

	</div>
</div>
@endsection
