@extends('layouts.default')
@section('content')
<div class="qa-main">
	
	@if($data==NULL)
	<h1> No questions found  </h1>
	@else
	<h1> Recent questions and answers </h1>
	@endif

	<div class="qa-part-q-list">
		<form action="index.php" method="post">
			<div class="qa-q-list">
			@foreach($data as $record)
				<div id="q6" class="qa-q-list-item">
					<div class="qa-q-item-stats">
						<div id="voting_6" class="qa-voting qa-voting-net">
							<div class="qa-vote-buttons qa-vote-buttons-net">
								<input type="submit" disabled="disabled" class="qa-vote-first-button qa-vote-up-disabled" value="" title="You cannot vote on your own questions"> 
								<input type="submit" disabled="disabled" class="qa-vote-second-button qa-vote-down-disabled" value="" title="You cannot vote on your own questions"> 
							</div>
							<div class="qa-vote-count qa-vote-count-net">
								<span class="qa-netvote-count">
									<span class="qa-netvote-count-data">{{{$record['netvotes']}}}</span>
									<span class="qa-netvote-count-pad"> votes</span>
								</span>
							</div>
							<div class="qa-vote-clear">
							</div>
						</div>
					<span class="qa-a-count qa-a-count-zero">
						<span class="qa-a-count-data">{{{$record['acount']}}}</span>
						<span class="qa-a-count-pad"> answers</span>
					</span>
					</div>
				<div class="qa-q-item-main">
					<div class="qa-q-item-title">
						<a href="test/{{{ $record['postid'] }}}">{{{ $record['title'] }}}</a>
					</div>
					<span class="qa-q-item-avatar-meta">
						<span class="qa-q-item-meta">
							<span class="qa-q-item-what">asked</span>
							<span class="qa-q-item-when">
								<span class="qa-q-item-when-data">{{ Question::formattedCreatedDate($record['created']) }}</span><span class="qa-q-item-when-pad"> </span>
							</span>
							<span class="qa-q-item-who">
								<span class="qa-q-item-who-pad">by </span>
								<span class="qa-q-item-who-data">
									@if($record['handle']==NULL)
										me
									@else
										<a class="qa-user-link" href="./index.php?qa=user&amp;qa_1=akash">{{{ $record['handle'] }}}</a>
									@endif
								</span>
								<span class="qa-q-item-who-points">
									@if($record['points']!=NULL)
										<span class="qa-q-item-who-points-pad">(</span>
										<span class="qa-q-item-who-points-data">{{{ $record['points'] }}}</span>
										<span class="qa-q-item-who-points-pad"> points)</span>
									@endif
								</span>
							</span>
						</span>
					</span>
					@if($record['tags']!=NULL)
					<div class="qa-q-item-tags">
						<ul class="qa-q-item-tag-list">
							<li class="qa-q-item-tag-item"><a class="qa-tag-link" href="./index.php?qa=tag&amp;qa_1=first-second-third">{{{ $record['tags'] }}}</a></li>
						</ul>
					</div>
					@endif
				</div>
					<div class="qa-q-item-clear">
					</div>
				</div>
			@endforeach

				<div class="qa-suggest-next">
						Help get things started by <a href="./index.php?qa=ask">asking a question</a>.
				</div>
			</div>
		</form>
	</div>
</div>
@stop
