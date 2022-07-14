@extends('common.layout')
@section('title', 'Dashboard')
@section('style')

@endsection
@section('script')
	{!! Html::script('public/assets/pages-js/Dashboard.js') !!}
	<script>
		DashboardJs.Dashboard();
	</script>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <h2>This is a Starter Page....{{ Session::get('username')}}</h2>
        </div>
    </div>
@endsection