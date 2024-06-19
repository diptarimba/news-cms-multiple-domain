@props(['label' => 'Submit', 'type' => 'button', 'onclick' => '', 'colour' => 'violet'])
<button type="{{$type}}" onclick="{{$onclick}}" class="btn text-white bg-{{$colour}}-500 border-{{$colour}}-500 hover:bg-{{$colour}}-600 hover:border-{{$colour}}-600 focus:bg-{{$colour}}-600 focus:border-{{$colour}}-600 focus:ring focus:ring-{{$colour}}-500/30 active:bg-{{$colour}}-600 active:border-{{$colour}}-600">{{$label}}</button>
