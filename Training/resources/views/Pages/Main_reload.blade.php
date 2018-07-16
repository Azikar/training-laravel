
    @if(count($ads)>0)
    @foreach($ads as $ad)
<li class="list-group-item">
    <div class="row">
    <div class="col-md-8">
    <h4><a href="/home/{{$ad->id}}">{{$ad->Title}}</a>
</h4>
<strong>Description:</strong>
<p>{{$ad->Description}}</p>
</div>
<div class="col-md-3">
Posted on: {{$ad->created_at}}  By:{{$ad->name}}
</div>
</div>
</li>


@endforeach
@else
<p>No ads available</p>
@endif
